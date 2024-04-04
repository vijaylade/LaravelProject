<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class ForgetController extends Controller
{
    public function forgetpage(){

        return view('ForgetPassword.forget');
    }

    public function forget(Request $request){

       $request->validate([
        'email' => "required|email|exists:users",
       ]);

       $token = Str::random(length:64);

       DB::table('password_reset_tokens')->insert([
        'email' => $request->email, 
        'token' => $token, 
        'created_at' => Carbon::now()
    ]);

       Mail::send("ForgetPassword.reset", ['token' => $token],  function ($message) use ($request) {

           $message->to($request->email);
           $message->subject("Reset Password");
       });

       return redirect('forget');
    }

    public function reset($token) {

        return view('ForgetPassword.newpassword', compact('token'));
    }

    public function resetpassword(Request $request) {

        $request->validate([
            'email' => "required|email|exists:users",
            'password' => "required|string|min:6|confirmed",
        ]);

        $tokenData = DB::table('password_reset_tokens')->where(["email" => $request->email, "token" => $request->token,])->first();
        if (!$tokenData) {
            return redirect()->back()->with(['token' => 'Invalid token!']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('status', 'Your password has been reset!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\LoginModel;

class AuthController extends Controller
{
    public function index() {
        return view('Admin.login');  
    }

    public function headerdash() {
        return view('layout.headerdash');  
    }

    public function admindash() {
        return view('Admin.admindash');  
    }
    
    public function empdash() {
        return view('Employee.empdash');  
    }

    public function employee() {
        return view('Admin.employee');  
    }

    public function dashboard() {
        
        $user = Auth::user();
            if ($user->role == 'admin') 
            {
                return redirect('all');
            } 
            else 
            {
                return redirect('empdash');
            }
    }

    public function postlogin(Request $request) {
        // echo "hello";
        // print_r($request->all());

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $validated = auth()->attempt([
            'email' =>$request->email,
            'password' =>$request->password,
        ]);

        if($validated)    
        {
            return redirect('/dashboard');
        } 
        else 
        {
            return redirect()->back()->with('error', 'invalid user');
        }

    }

    public function logout(Request $request) {
        
        Auth::logout();
        return redirect('login')->with('error', 'logout successfully');
    }

   

}

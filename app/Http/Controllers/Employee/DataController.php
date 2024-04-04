<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\EmpModel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class DataController extends Controller
{
    public function store(Request $request) {
        // echo "hello";
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";

        $users = new User;
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->password = Hash::make($request->password);
        $users->role = $request['role'];
        $users->save();

        $employee = new EmpModel;
        $employee->eid = $users->id;
        $employee->address = $request['address'];
        $employee->gender = $request['gender'];
        $employee->dob = $request['dob'];
        $employee->save();

        return redirect()->back();
    }

    public function show(Request $request) {

        // if($request->ajax()) {
        //     $data = User::get();
        //     return Datatables::of($data)->addIndexColumn()->make(true);
        // }

        $data = User::join('employee', 'users.id', '=', 'employee.eid')->get();
        return DataTables::of($data)->addIndexColumn()->addColumn('Action', function($row) {
                                        $actionBtn = 
                                        '<a href="/edit/' . $row->eid . '"  class="edit btn btn-success btn-sm"><i class="far fa-edit"></i></a> 
                                        <a href="/delete/' . $row->eid . '" class="delete btn btn-danger btn-sm" id="delete"><i class="fa-solid fa-trash"></i><a>';
                                        return $actionBtn;
                                    })
                                    ->rawColumns(['Action'])->make(true);
    }

    public function all() {

        // return $data;
        $users = User::join('employee', 'users.id', '=', 'employee.eid')->where('role','user')->count();
        $users1 = User::join('employee', 'users.id', '=', 'employee.eid')->where('status','present')->count();
        $users2 = User::join('employee', 'users.id', '=', 'employee.eid')->where('status','absent')->count();
        return view('Admin.admindash', compact('users','users1','users2'));
    }

    public function edit($id) {

        $users = User::with('details')->find($id);
        return view('Admin.edit', compact('users'));
    }

    public function update(Request $request) {

        $users = User::find($request->update);
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->password = Hash::make($request->password);
        $users->role = $request['role'];
        $users->save();

        $users = EmpModel::find($request->update);
        $users->address = $request['address'];
        $users->gender = $request['gender'];
        $users->dob = $request['dob'];
        $users->save();

        return redirect('employee');
    }

    public function delete($id) {

        $users = DB::table('users')->where('id', $id)->delete();
        $employee = DB::table('employee')->where('eid', $id)->delete();
        return redirect()->back();
    }

    public function empupdate(Request $request) {
        
        $users = User::find($request->empupdate);
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->password = $request['password'];
        $users->role = $request['role'];
        $users->save();

        $users = EmpModel::find($request->empupdate);
        $users->address = $request['address'];
        $users->gender = $request['gender'];
        $users->dob = $request['dob'];
        $users->save();

        return redirect('empdash');
    }

}

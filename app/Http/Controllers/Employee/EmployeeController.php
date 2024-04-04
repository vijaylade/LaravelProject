<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LeaveModel;
use App\Models\User;

class EmployeeController extends Controller
{
    public function empleave() {

        $user = Auth::user();

        $data = LeaveModel::find($user->id);

        return view('Employee.empdash');
    }
}

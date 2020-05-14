<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {

//        $employee = Employee::where('user_id', \Auth::user()->id)->first();
        $pending = Employee::where('full_final', null)->get();

        $employee = Employee::where('id', \Auth::user()->id)->first();

        return view('profile', compact('employee',$employee,'pending',$pending));
    }

    public function editBank(Request $request)
    {
        $bank = Employee::findorFail($request->id);
        $bank->account_number= $request->input('account_number');
        $bank->bank_name = $request->input('bank_name');
        $bank->save();

        return redirect('/profile')->with('success', 'Bank Information Updated');
    }

    public function editPersonal(Request $request)
    {

        $personal = Employee::findorFail($request->id);
        $personal->date_of_birth = $request->input('date_of_birth');
        $personal->phone_number = $request->input('phone');
        $personal->emergency_number = $request->input('emergency');
        $personal->father_name = $request->input('father_name');
        $personal->qualification = $request->input('qualification');
        $personal->current_address = $request->input('current_address');
        $personal->permanent_address = $request->input('permanent_address');
        $personal->save();

        $process = Employee::where('id', $request->id)->first();

        \DB::table('users')->where('id', $process->id)->update(['email' => $request->email]);

       /* $user = User::findorFail($request->id);
        $user->email = $request->input('email');
        $user->save();*/



        return redirect('/profile')->with('success', 'Personal Information Updated');
    }

    public function editEmployment(Request $request)
    {

//        dd($request);
        $bank = Employee::findorFail($request->id);
        $bank->account_number= $request->input('account_number');
        $bank->bank_name = $request->input('bank_name');
        $bank->save();

        return redirect('/profile')->with('success', 'Bank Information Updated');
    }
}

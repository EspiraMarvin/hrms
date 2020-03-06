<?php

namespace App\Http\Controllers;

use App\ApplyLeave;
use App\Department;
use App\Employee;
use App\Role;
use Illuminate\Http\Request;
use App\Leave;
use Illuminate\Support\Facades\DB;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }


    public function applyLeave()
    {
        $leave = Leave::all();
        $apply = ApplyLeave::all();
        $employee = Employee::all();

        return view('hrms.leave.leave_apply',compact(['leave', 'apply','employee']));
    }

    public function myLeaveList()
    {
        $leave = Leave::all();
        $apply = ApplyLeave::all();

        return view('hrms.leave.my_leave_list',compact(['leave', 'apply']));
    }

    public function addLeaveType()
    {
        return view('hrms.leave.leave_type_add');
    }

    public function leaveTypeList()
    {
        $leave = Leave::orderBy('id','asc')->paginate(10);

        return view('hrms.leave.leave_type_list')->with('leave',$leave);
    }

    public function totalLeaveRequest()
    {
        $leave = Leave::all();
        $apply = ApplyLeave::all();

        return view('hrms.leave.total_leave_request',compact(['leave', 'apply']));
    }
    public function mytotalLeaveRequest()
    {

        $apply = DB::table('apply_leaves')->where('employee_id', '=', auth()->user('id'))->orderBy('id', 'desc')->get();

//        dd($apply);
       /* $leave = Leave::all();
        $apply = ApplyLeave::all();*/


        return view('hrms.leave.total_leave_request',compact( 'apply'));
//        return view('hrms.leave.total_leave_request',compact(['leave', 'apply']));
    }

    public function LeaveTypeAdd(){

        $leaveType = Leave::all();

        return view('hrms.leave.leave_apply',compact(['leaveType']));

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function apply(Request $request)
    {
        $this->validate($request,
            [
                'leave_type' =>'required',
                'date_from' =>'required',
                'date_to' =>'required',
                'time_from' =>'required',
                'time_to' =>'required',
//                'number_of_days' => 'required',
                'reason'=>'required',
            ]);

        $apply = new ApplyLeave;
//        $apply->user_id = $request->user_id;
//        $apply->user_id = $request->employee_name;
        $apply->leave_type = $request->input('leave_type');
        $apply->date_from = $request->input('date_from');
        $apply->date_to = $request->input('date_to');
        $apply->time_from = $request->input('time_from');
        $apply->time_to = $request->input('time_to');
        $apply->number_of_days = $request->input('number_of_days');
        $apply->reason = $request->input('reason');
        $apply->employee_id = auth()->user()->id;
        $apply->employee_name = auth()->user()->name;
        $apply->save();

        return redirect('/leave_apply')->with('success','Leave Application Successful');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'leave_type' =>'required',
                'description'=>'required',
            ]);

        $leave = new Leave;
        $leave->leave_type = $request->input('leave_type');
        $leave->description = $request->input('description');
        $leave->save();

        return redirect('/leave_type_add')->with('success','Leave Type Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

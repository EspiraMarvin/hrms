<?php

namespace App\Http\Controllers;

use App\ApplyLeave;
use App\Department;
use App\Employee;
use App\Role;
use http\Env\Url;
use Illuminate\Http\Request;
use App\Leave;
//use DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


//use mysql_xdevapi\RowResult;



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
        $employee = Employee::all();

        return view('hrms.leave.leave_apply', compact(['leave', $leave, 'employee', $employee]));
    }

    public function approveLeaveList()
    {
        $pending = ApplyLeave::where('status', 0)->get();
        $approve = ApplyLeave::orderBy('id', 'desc')->paginate(10);

        return view('hrms.leave.approve_leave',compact('approve', $approve,'pending',$pending));
    }

    public function statusPending()
    {
        $status = ApplyLeave::where('status', 0)->orderBy('id','desc')->paginate(15);

        return view('hrms.leave.leave_pending')->with('status',$status);
    }

    public function statusApprove()
    {
        $status = ApplyLeave::where('status', 1)->orderBy('id','desc')->paginate(15);

        return view('hrms.leave.leave_approved')->with('status',$status);
    }

    public function statusDeny()
    {
        $status = ApplyLeave::where('status', 2)->orderBy('id','desc')->paginate(15);

        return view('hrms.leave.leave_deny')->with('status',$status);
    }

    public function myLeaveList()
    {

        $apply = ApplyLeave::where('employee_id', \Auth::user()->id)->orderBy('id', 'desc')->paginate(15);

        return view('hrms.leave.my_leave_list')->with('apply', $apply);
    }

    public function addLeaveType()
    {
        return view('hrms.leave.leave_type_add');
    }

    public function leaveTypeList()
    {
        $leave = Leave::orderBy('id', 'desc')->paginate(10);

        return view('hrms.leave.leave_type_list')->with('leave', $leave);
    }

    public function totalLeaveList()
    {

        $totalLeave = ApplyLeave::count();
        $apply = ApplyLeave::orderBy('id', 'desc')->paginate(10);

        return view('hrms.leave.total_leave_list', compact(['apply', $apply,'totalLeave',$totalLeave]));
    }

    public function LeaveTypeAdd()
    {

        $leaveType = Leave::all();

        return view('hrms.leave.leave_apply', compact(['leaveType', $leaveType]));
    }

    public function index()
    {
        $apply = ApplyLeave::orderBy('id', 'desc')->paginate(10);

        return view('hrms.leave.total_leave_list')->with('employee', $apply);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function apply(Request $request)
    {
        $this->validate($request,
            [
                'leave_type_id' => 'required',
                'date_from' => 'required',
                'date_to' => 'required',
                'time_from' => 'required',
                'time_to' => 'required',
                'number_of_days' => 'required|max:90',
                'reason' => 'required',
            ]);

        $number_of_days = explode('days leave', $request->number_of_days);
        $leave_type = explode('annual leave', $request->leave_type);
        if (sizeof($number_of_days) < 2) {
            return redirect('/leave_apply')->with('error', 'Days Should be more than one');
        }
        /*   elseif ('Annual Leave'> '30'){
              return redirect('/leave_apply')->with('error','Annual leaves Should NOT exceed 30 days');
           }
           elseif ('Paternity Leave' > '10'){
               return redirect('/leave_apply')->with('error','Paternity leaves Should NOT exceed 10 days');
           }
           elseif ('Maternity Leave' > '90') {
               return redirect('/leave_apply')->with('error', 'Maternity leaves Should NOT exceed 90 days');
           }*/

//      dd($request);
        $apply = new ApplyLeave;
        $apply->employee_id = auth()->user()->id;
        $apply->employee_name = auth()->user()->name;
        $apply->leave_type_id = $request->input('leave_type_id');
        $apply->date_from = $request->input('date_from');
        $apply->date_to = $request->input('date_to');
        $apply->time_from = $request->input('time_from');
        $apply->time_to = $request->input('time_to');
        $apply->number_of_days = $request->input('number_of_days');
        $apply->reason = $request->input('reason');
        $apply->status = '0';
        $apply->save();

        return redirect('/leave_apply')->with('success', 'Leave Application Successful');
    }


    public function approveLeave(Request $request)
    {

        $this->validate($request,
            [
                'status' => 'required|integer|gt:0',
            ]);

//        dd($request);
        $approve = ApplyLeave::findorFail($request->id);
        $approve->remarks = $request->input('remarks');
        $approve->status = $request->input('status');
        $approve->save();

        return redirect('/approve_leave')->with('success', 'Leave Approved Successfully');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'leave_type' => 'required',
                'description' => 'required',
            ]);

        $leave = new Leave;
        $leave->leave_type = $request->input('leave_type');
        $leave->description = $request->input('description');
        $leave->save();

        return redirect('/leave_type_add')->with('success', 'Leave Type Added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$leaveType = Leave::find($id);

        return view('hrms.leave.leave_type_edit')->with('leaveType', $leaveType);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $leaveType = Leave::find($id);
        $leaveType->leave_type = $request->input('leave_type');
        $leaveType->description = $request->input('description');
        $leaveType->save();

        return redirect('/leave_type_list')->with('success', 'Leave Type  Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function doDelete($id)
    {
        $leave = Leave::find($id);
        $leave->delete();

        return redirect('/leave_type_list')->with('success', 'Leave Type Deleted Successfully');
    }


//  function to search database

    public function search()
    {
        $apply = ApplyLeave::all();
        $p = request()->input('p');

        if ($p != '') {
            $data = ApplyLeave::where('employee_name', 'LIKE', '%' . $p . '%')
                ->orWhere('date_from', 'LIKE', '%' . $p . '%')
                ->orWhere('date_to', 'LIKE', '%' . $p . '%')
                ->orWhere('time_from', 'LIKE', '%' . $p . '%')
                ->orWhere('time_to', 'LIKE', '%' . $p . '%')
                ->orWhere('number_of_days', 'LIKE', '%' . $p . '%')
                ->orderBy('id', 'desc')
                ->paginate(10)
                ->setpath('');

            $data->appends(array(
                'p' => request()->input('p'),
            ));

            return view('hrms.leave.leave_search', compact('data', $data, 'apply', $apply));

        } else {
            return redirect('/total_leave_list')->with('error', 'Search Input Empty!');
        }
    }

}

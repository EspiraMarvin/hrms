<?php

namespace App\Http\Controllers;

use App\ApplyLeave;
use App\Employee;
use App\User;
use Illuminate\Http\Request;
use App\Leave;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Carbon\Carbon;
use App\Mail\LeaveApproval;
use Illuminate\Support\Facades\Mail;

//use mysql_xdevapi\RowResult;



class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function applyLeave()
    {

        $employee = Employee::findorFail(Auth::user()->id);
        $getSupervisor_id = $employee->user->supervisedBy[0]->id;
        $getGender = $employee->gender;



        if ($getGender === "Female" || $getGender === "female") {

            $leave = Leave::all()->except(5);
            return view('hrms.leave.leave_apply', compact('leave', $leave,'getSupervisor_id',$getSupervisor_id));
        }
        if($getGender == "Male" || $getGender == "male") {

            $leave = Leave::all()->except(4);
            return view('hrms.leave.leave_apply', compact('leave', $leave));
        }

    }

    public function approveLeaveList()
    {
        //display leaves applied by the supervisees to the supervisor
        $approv = ApplyLeave::whereHas('user', function ($q) {
            $q->whereHas('supervisedBy', function ($qq){
                $qq->where('supervisor_id',Auth::user()->id
                );
            });
        })->with('user')->get();

        //get loggedIn user ID /which is the supervisor_id
        $supervisorLoggedInId = $user = Auth::user()->id;

        foreach ($approv as $app) {

            $sup1 = $app->user->supervisor[0]->id;
            $sup2 = $app->user->supervisor[1]->id;
            if ($sup1 === $supervisorLoggedInId) {

                $totalLeaves =  ApplyLeave::whereHas('user', function ($q) {
                    $q->whereHas('supervisedBy', function ($qq){
                        $qq->where('supervisor_id',Auth::user()->id);
                    });
                })->with('user')
                    ->where('status1', 0)
                    ->count();

            }elseif($sup2 === $supervisorLoggedInId){
                $totalLeaves =  ApplyLeave::whereHas('user', function ($q) {
                    $q->whereHas('supervisedBy', function ($qq){
                        $qq->where('supervisor_id',Auth::user()->id);
                    });
                })->with('user')
                    ->where('status2', 0)
                    ->count();
            }
        }

        //display leaves applied by the supervisees to the supervisor
        $approve = ApplyLeave::whereHas('user', function ($q) {
            $q->whereHas('supervisedBy', function ($qq){
                $qq->where('supervisor_id',Auth::user()->id);
            });
        })->with('user')->orderBy('id','desc')->paginate(10);


        return view('hrms.leave.approve_leave',compact('approve', $approve,'totalLeaves',$totalLeaves));
    }

    public function myLeaveList()
    {

        $apply = ApplyLeave::where('user_id', \Auth::user()->id)->orderBy('id', 'desc')->get();

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
        $apply = ApplyLeave::orderBy('id', 'desc')->get();

        return view('hrms.leave.total_leave_list', compact(['apply', $apply,'totalLeave',$totalLeave]));
    }

    public function LeaveTypeAdd()
    {
        $leaveType = Leave::all();

        return view('hrms.leave.leave_apply', compact(['leaveType', $leaveType]));
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
  /*  public function sendLeaveFeedback()
    {
        $applied = ApplyLeave::whereHas('user', function ($q) {
            $q->where('user_id', Auth::user()->id);
        })->latest('created_at')->first();

       dd($applied);
//        $userMail = $employee->user->email;

        Mail::to($userMail)->send(new LeaveApproval());

    }*/

    public function apply(Request $request)
    {

//        dd($request);
        $employee = Employee::findorFail(Auth::user()->id);
        $getSupervisorOne = $employee->user->supervisedBy[0]->id;
        $getSupervisorTwo = $employee->user->supervisedBy[1]->id;

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

        $date1 = Carbon::createMidnightDate($request->date_from);
        $date2 = Carbon::createMidnightDate($request->date_to);

        $diffInDays = $date1->diffInDays($date2); //diff in days
        $noOfWeekendDays = $date1->diffInWeekendDays($date2); //no of weekends in the between the dates

        $dayss = $diffInDays - $noOfWeekendDays;

        //check if user applies a past date
        $today = Carbon::today();
        $date = Carbon::parse($today, 'UTC');

        if ($date > $request->date_from){

            return redirect('/leave_apply')->with('error', 'You selected a past date !');
        }
        if ($date < $request->date_to){

            $year = date_format(new DateTime($request->date_to), 'Y');
            if ($year !=  date('Y')){

                return redirect('/leave_apply')->with('error', 'Annual Leave is Applied Only to this Year !');
            }

        }

        if($dayss === 0){

            return redirect('/leave_apply')->with('error', 'Leave days cannot be zero !');
        }

        //check if user has already applied any type of leave that is still pending
        $applied = ApplyLeave::whereHas('user', function ($q) {
            $q->where('user_id', Auth::user()->id);
        })->latest('created_at')->first();

            if(($applied != null ) && ($applied->status1 === 0) && ($applied->status2 === 0)
                || $applied != null && ($applied->status1 === 1) && ($applied->status2 === 0)
                || $applied != null && ($applied->status1 === 0) && ($applied->status2 === 1)){

                return redirect('/leave_apply')->with('error', 'Leave already applied Wait Approval !');

            }elseif ($request->leave_type_id === '1') {

                // number of approved annual leaves in the database
                $check = ApplyLeave::where([
                    'user_id' => auth()->user()->id,
                    'leave_type_id' => $request->leave_type_id,
                    'status1' => '1',
                    'status2' => '1'
                ])->get();


//          empty object because there will be no pending leave as the as user cannot
//           apply leave if he's  not yet approved/disapprove by his supervisor

                // sum of the number of approved annual leaves the user went in the then current year
                $sumDaysWent = ApplyLeave::where([
                    'user_id' => auth()->user()->id,
                    'leave_type_id' => $request->leave_type_id,
                    'status1' => '1',
                    'status2' => '1',
                ])->sum('number_of_days');

                foreach ($check as $c)
                {
                    // check job group
                    $jobGroup1 = $c->user->roles[0]->job_group;
                    $jobGroup2 = $c->user->roles[1]->job_group;

                    if ($jobGroup1 != 'System'){
                        $jobGroup = $jobGroup1;
                    }elseif($jobGroup1 === 'System' || $jobGroup1 === ''){
                        $jobGroup = $jobGroup2;
                    }

                    //get format of the year in years(eg 2020) when the user applied for the leave
                    $year = date_format(new DateTime($c->created_at), 'Y');

//                    dd($year);
                    //check if user applied leave the same year as the then current year.
                    if ($year === date('Y')){

                        // user job group to determine user no of days for annual leave
                        if ( $jobGroup === "ICTA 1") {

                            if ($year === date('Y')) {
                                if ($sumDaysWent <=  45){

                                    $defaultAnnualDays = 45;

                                    $remDays = $defaultAnnualDays - $sumDaysWent;

                                    if ($remDays < $dayss){

                                        return redirect('/leave_apply')->with('error', 'You are exceeding your Annual Leave for the Year !');
                                    }
                                }else {

                                    return redirect('/leave_apply')->with('error', 'Apply annual leave using current Year Dates Or your annual leave may have expired !');
                                }

                            }
                        }elseif ($jobGroup != "ICTA 1") {

                            if ($sumDaysWent <= 30) {

                                $defaultAnnualDays = 30;

                                $remDays = $defaultAnnualDays - $sumDaysWent;

                                if ($remDays < $dayss) {

                                    return redirect('/leave_apply')->with('error', 'You are exceeding your Annual Leave for the Year !');
                                }
                            } else {

                                return redirect('/leave_apply')->with('error', 'Apply annual leave using current Year Dates Or your annual leave may have expired !');
                            }
                        }

                    }elseif($year != date('Y')){

                        return redirect('/leave_apply')->with('error', 'Apply annual leave using current Year Dates !');

                    }
                }
            } elseif ($request->leave_type_id === '4') {
                if ($dayss > 90) {
                    return redirect('/leave_apply')->with('error', 'Maternity leaves Should NOT exceed 90 days');
                }
            } elseif ($request->leave_type_id === '5') {
                if ($dayss > 10) {

                    return redirect('/leave_apply')->with('error', 'Paternity leaves Should NOT exceed 10 days');
                }
            }

//            dd($employee->user->email);
            $apply = new ApplyLeave();
            $apply->user_id = auth()->user()->id;
            $apply->employee_name = auth()->user()->name;
            $apply->leave_type_id = $request->leave_type_id;
            $apply->date_from = $request->input('date_from');
            $apply->date_to = $request->input('date_to');
            $apply->time_from = $request->input('time_from');
            $apply->time_to = $request->input('time_to');
            $apply->number_of_days = $dayss;
            $apply->supervisor1_id = $getSupervisorOne;
            $apply->supervisor2_id = $getSupervisorTwo;
            $apply->reason = $request->input('reason');
            $apply->save();


        return redirect('/leave_apply')->with('success', 'Leave Application Successful');
    }


    public function approveLeave(Request $request)
    {
        //display leaves applied by the supervisees to the supervisor
        $approve = ApplyLeave::whereHas('user', function ($q) {
            $q->whereHas('supervisedBy', function ($qq){
                $qq->where('supervisor_id',Auth::user()->id, function ($qqq){
                    $qqq->where(['status1', 0, 'status2', 0]);
                });
            });
        })->with('user')->get();

        foreach ($approve as $app){

            $sup1 = $app->user->supervisor[0]->id;
            $sup2 = $app->user->supervisor[1]->id;
            $supervisorLoggedInId =  $user = Auth::user()->id;

            if ($sup1 === $supervisorLoggedInId){
                $approve = ApplyLeave::findorFail($request->id);
                $approve->remarks = $request->input('remarks');
                $approve->status1 = $request->status;
                $approve->save();
            }elseif($sup2 === $supervisorLoggedInId){

                $approve = ApplyLeave::findorFail($request->id);
                $approve->remarks = $request->input('remarks');
                $approve->status2 = $request->status;
                $approve->save();
            }

        }
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
        $leaveType = Leave::find($id);

        return view('hrms.leave.leave_type_edit')->with('leaveType', $leaveType);
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
        $userId = User::whereHas('supervisedBy', function ($q){
            $q->where('supervisor_id',Auth::user()->id);
        })->pluck('id');

        $p = request()->input('p');

        if ($p != '') {
            $data = ApplyLeave::whereIn('user_id',$userId)->where('employee_name', 'LIKE', '%' . $p . '%')
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

            return view('hrms.leave.leave_search', compact('data', $data));

        } else {
            return redirect('/approve_leave')->with('warning', 'Search Input Empty!');
        }
    }

}

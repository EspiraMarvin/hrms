<?php

namespace App\Http\Controllers;

use App\ApplyLeave;
use App\Employee;
use App\Role;
use App\User;
use http\Env\Url;
use Illuminate\Http\Request;
use App\Leave;
//use DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;
use function Sodium\compare;

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
        $employee = Employee::findorFail(Auth::user()->id);
        if ($employee->gender === 'Female') {
            $leave = Leave::all()->except(5);

            return view('hrms.leave.leave_apply', compact('leave', $leave));
        }else
        {
            $leave = Leave::all()->except(4);
            return view('hrms.leave.leave_apply', compact('leave', $leave));
        }

    }

    public function approveLeaveList()
    {

        $approve = ApplyLeave::whereHas('user', function ($q) {
            $q->whereHas('supervisedBy', function ($qq){
                $qq->where('supervisor_id',Auth::user()->id);
            });
        })->with('user')->orderBy('id','desc')->paginate(10);

        $totalLeaves = ApplyLeave::where('status',0)->get();

        return view('hrms.leave.approve_leave',compact('approve', $approve,'totalLeaves',$totalLeaves));
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

        $apply = ApplyLeave::where('user_id', \Auth::user()->id)->orderBy('id', 'desc')->paginate(15);

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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */


    public function apply(Request $request)
    {
//        dd($request);
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

        $days = explode('days leave', $request->number_of_days);
        if (sizeof($days) < 2) {
            $days = explode('day leave', $request->number_of_days);
        }
        $dayss = $this->wordsToNumber($days[0]);

        $lea = $request->input('leave_type_id');

                if ($lea === '1') {

                     if ($dayss > 30) {
                        return redirect('/leave_apply')->with('success', 'Annual leaves Should NOT exceed 30 days');
                    }else{

                         $check = ApplyLeave::where([
                             'user_id' => auth()->user()->id,
                             'leave_type_id' => $request->leave_type_id,
                             'status' => '1'
                         ])->get();

                         $sumDaysWent = ApplyLeave::where([
                             'user_id' => auth()->user()->id,
                             'leave_type_id' => $request->leave_type_id,
                             'status' => '1'
                         ])
                             ->sum('number_of_days');

                         foreach ($check as $c)
                         {

                             $year = date_format(new DateTime($c->created_at), 'Y');
                             if ($year === date('Y')){

                                 if ($sumDaysWent <  31){
                                     $defaultAnnualDays = 30;
                                     $remDays = $defaultAnnualDays - $sumDaysWent;

                                     if ($remDays < $dayss){

                                         return redirect('/leave_apply')->with('success', 'You Completed your Annual Leave for the Year');
                                     }
                                 }
                             }
                         }

                     }
                } elseif ($lea === '4') {

                    if ($dayss > 90) {
                        return redirect('/leave_apply')->with('success', 'Maternity leaves Should NOT exceed 90 days');
                    }
                } elseif ($lea === '5') {

                    if ($dayss > 10) {
                        return redirect('/leave_apply')->with('success', 'Paternity leaves Should NOT exceed 10 days');
                    }
                }


                    $apply = new ApplyLeave();
                    $apply->user_id = auth()->user()->id;
                    $apply->employee_name = auth()->user()->name;
                    $apply->leave_type_id = $lea;
                    $apply->date_from = $request->input('date_from');
                    $apply->date_to = $request->input('date_to');
                    $apply->time_from = $request->input('time_from');
                    $apply->time_to = $request->input('time_to');
                    $apply->number_of_days = $dayss;
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
            return redirect('/total_leave_list')->with('error', 'Search Input Empty!');
        }
    }

    function wordsToNumber($data)
    {
        // Replace all number words with an equivalent numeric value
        $data = strtr(
            $data,
            array(
                'zero' => '0',
                'a' => '1',
                'one' => '1',
                'two' => '2',
                'three' => '3',
                'four' => '4',
                'five' => '5',
                'six' => '6',
                'seven' => '7',
                'eight' => '8',
                'nine' => '9',
                'ten' => '10',
                'eleven' => '11',
                'twelve' => '12',
                'thirteen' => '13',
                'fourteen' => '14',
                'fifteen' => '15',
                'sixteen' => '16',
                'seventeen' => '17',
                'eighteen' => '18',
                'nineteen' => '19',
                'twenty' => '20',
                'thirty' => '30',
                'forty' => '40',
                'fourty' => '40', // common misspelling
                'fifty' => '50',
                'sixty' => '60',
                'seventy' => '70',
                'eighty' => '80',
                'ninety' => '90',
                'hundred' => '100',
                'thousand' => '1000',
                'million' => '1000000',
                'billion' => '1000000000',
                'and' => '',
            )
        );

        // Coerce all tokens to numbers
        $parts = array_map(
            function ($val) {
                return floatval($val);
            },
            preg_split('/[\s-]+/', $data)
        );

        $stack = new \SplStack(); //Current work stack
        $sum = 0; // Running total
        $last = null;

        foreach ($parts as $part) {
            if (!$stack->isEmpty()) {
                // We're part way through a phrase
                if ($stack->top() > $part) {
                    // Decreasing step, e.g. from hundreds to ones
                    if ($last >= 1000) {
                        // If we drop from more than 1000 then we've finished the phrase
                        $sum += $stack->pop();
                        // This is the first element of a new phrase
                        $stack->push($part);
                    } else {
                        // Drop down from less than 1000, just addition
                        // e.g. "seventy one" -> "70 1" -> "70 + 1"
                        $stack->push($stack->pop() + $part);
                    }
                } else {
                    // Increasing step, e.g ones to hundreds
                    $stack->push($stack->pop() * $part);
                }
            } else {
                // This is the first element of a new phrase
                $stack->push($part);
            }

            // Store the last processed part
            $last = $part;
        }

        return $sum + $stack->pop();
    }

}

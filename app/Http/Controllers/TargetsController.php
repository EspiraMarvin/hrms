<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Role;
use Illuminate\Http\Request;
use App\Target;
use Illuminate\Support\Facades\Auth;

class TargetsController extends Controller
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

    public function EmpAddTar()
    {

        $employee = Employee::all();

        return view('hrms.target.target_assign')->with('employee', $employee);

    }

    public function targetAdd()
    {
        $target = Target::all();
        return view('hrms.target.target_assign');
    }


    public function targetList()
    {
        $target = Target::with('employee')
            ->orderBy('id', 'desc')->paginate(10);

//            dd($target->toArray());

        return view('hrms.target.target_assign_list')->with('target', $target);
    }

    public function showMyTarget()
    {
        $user = Auth::user();
//        $targets = $user->employee->targets->paginate(20);
        $employee_id = $user->employee->id;
        $targets = Target::wherehas('employee', function ($q) use ($employee_id) {
            $q->where('employee_id', $employee_id);
        })->paginate(10);

//        dd($targets);
//        $apply = ApplyLeave::where('employee_id', \Auth::user()->id)->orderBy('id','desc')->paginate(15);

//        $target = Target::orderBy('id','desc')->paginate(10);

        return view('hrms.target.my_target_list')->with('targets', $targets);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'employee_id' => 'required',
                'targets' => 'required',
                'assigned_date' => 'required',
                'review_date' => 'required',
            ]);

//        dd($request);

        $target = new Target;
        $target->employee_id = $request->input('employee_id');
        $target->targets = $request->input('targets');
        $target->assigned_date = $request->input('assigned_date');
        $target->review_date = $request->input('review_date');
//        $target->employee_id = auth()->user()->id;
        $target->save();

        return redirect('/target_assign')->with('success', 'Target Added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $targetAssign = Target::find($id);

        return view('hrms.target.target_edit', compact(['targetAssign', $targetAssign, 'employee']));
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

        $targetAssign = Target::find($id);
        $targetAssign->targets = $request->input('targets');
        $targetAssign->assigned_date = $request->input('assigned_date');
        $targetAssign->review_date = $request->input('review_date');
        $targetAssign->save();

        return redirect('/target_assign_list')->with('success', 'Target  Information Updated');
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

    public function doDelete(Request $request)
    {
        $targetAssign = Target::findorFail($request->id);
        $targetAssign->delete();

        return redirect('/target_assign_list')->with('success', 'Target Removed Successfully');
    }
}

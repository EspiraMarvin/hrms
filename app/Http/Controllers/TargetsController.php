<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Role;
use Illuminate\Http\Request;
use App\Target;

class TargetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function EmpAddTar(){

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
            $target = Target::orderBy('id','desc')->paginate(10);

            return view('hrms.target.target_assign_list')->with('target',$target);
    }

    public function showMyTarget()
    {
        $target = Target::orderBy('id','desc')->paginate(10);

        return view('hrms.target.target_assign_list')->with('target',$target);
    }

    public function showMyLeave()
    {

        $leaves = EmployeeLeaves::where('user_id', \Auth::user()->id)->paginate(15);
        return view('hrms.leave.show_my_leaves', compact('leaves'));
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
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'employee' =>'required',
                'targets' =>'required',
                'authority'=>'required',
                'assigned_date'=>'required',
                'review_date'=>'required',
            ]);

//        dd($request);

        $target = new Target;
        $target->employee = $request->input('employee');
        $target->targets = $request->input('targets');
        $target->authority = $request->input('authority');
        $target->assigned_date = $request->input('assigned_date');
        $target->review_date = $request->input('review_date');
        $target->save();

        return redirect('/target_assign')->with('success','Target Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

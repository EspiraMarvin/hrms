<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Promote;
use App\Role;
use Illuminate\Http\Request;
use DB;

class PromoteController extends Controller
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

    public function doPromotion()
    {
        return view('hrms.promote.promote_add');
    }

    public function promoteList()
    {
        $promotions = Promote::orderBy('id', 'desc')->paginate(15);

        return view('hrms.promote.promote_list', compact('promotions', $promotions));
    }

    public function index()
    {
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
    public function storePromotion(Request $request)
    {

//        dd($request);
        $new_designation = Employee::where('id', $request->new_designation)->first();
        $process = Employee::where('id', $request->employee_id)->first();
        $process->salary = $request->new_salary;
        $process->save();

//        \DB::table('employees')->where('user_id', $process->user_id)->update(['user_roles' => $request->new_designation]);

        \DB::table('user_roles')->where('employee_id', $process->employee_id)->update(['role_id' => $request->new_designation]);

        $promotion = new Promote;
        $promotion->employee_id = $request->employee_id;
        $promotion->old_designation = $request->old_designation;
        $promotion->new_designation = $request->new_designation;
        $promotion->old_salary = $request->old_salary;
        $promotion->new_salary = $request->new_salary;
        $promotion->promotion_date = $request->promotion_date;
        $promotion->save();

        return redirect('/promote_add')->with('success', 'Employee Promoted Successfully');
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
        $employee = Employee::find($id);
        $roles = Role::all();
        $departments = Department::all();

        return view('hrms.promote.promote_edit', compact('employee', $employee, 'roles', $roles, 'departments', $departments));
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
        //
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
}

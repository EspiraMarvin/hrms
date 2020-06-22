<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use App\Role;
use App\Target;
use App\User;
use Illuminate\Http\Request;
use App\Directorate;
use Illuminate\Support\Facades\DB;

//use DB;


class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function depAdd()
    {

        $directorate = Directorate::all();

        return view('hrms.directorate.department_add')->with('directorate', $directorate);

    }

    public function depList()
    {

        $department = Department::orderBy('id', 'desc')->paginate(10);

        return view('hrms.directorate.department_list')->with('department', $department);
    }

    public function showMemberTargets($id)
    {
        $employee = User::find($id);


//      Get user targets
        $targets = Target::wherehas('user', function ($q) use ($employee) {
            $q->where('user_id', $employee->id);
        })->get();

        return view('hrms.directorate.memberTarget',compact('targets',$targets,'employee',$employee));

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
                'directorate_id' => 'required',
                'department' => 'required|unique:departments',
                'description' => 'required',
            ]);

        $dep = new Department;
        $dep->directorate_id = $request->input('directorate_id');
        $dep->department = $request->input('department');
        $dep->description = $request->input('description');
        $dep->save();

        return redirect('/department_add')->with('success', 'Department Added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        $members = Department::find($id)->employees;
        $count= Department::find($id)->employees->count();

        return view('hrms.directorate.department_show', compact('department','members',$members,'count',$count));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('hrms.directorate.department_edit')->with('department', $department);
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
        $this->validate($request,
            [
                'directorate_id' => 'required',
                'department' => 'required',
                'description' => 'required',
            ]);

        $department = Department::find($id);
        $department->directorate_id = $request->input('directorate_id');
        $department->department = $request->input('department');
        $department->description = $request->input('description');
        $department->save();

        return redirect('/department_list')->with('success', 'Department  Information Updated');
    }

    public function doDelete(Request $request)
    {
        $department = Department::findorFail($request->id);
        $department->delete();

        return redirect('/department_list')->with('success', 'Department Removed Successfully');
    }
}

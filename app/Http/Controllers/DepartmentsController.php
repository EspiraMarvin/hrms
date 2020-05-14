<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use App\Role;
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

    public function __construct()
    {
        $this->middleware('auth');
    }


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
                'directorate' => 'required',
                'name' => 'required|unique:departments',
                'description' => 'required',
            ]);

        $department = new Department;
        $department->directorate = $request->input('directorate');
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->save();

//        dd($request);

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
        $directorate = Directorate::all();
//        $totalDep = Employee::where('department', 'Dlp')->orderBy('id','desc')->get();
        $totalDep = Employee::where('department', $department)->orderBy('id','desc')->get();
//        $co = count($totalDep);

//        dd($co);

//        $totalDep = User::where('department', $department)->orderBy('id','desc')->paginate(15);


        return view('hrms.directorate.department_show', compact('department', 'directorate','totalDep'));

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
                'directorate' => 'required',
                'name' => 'required',
                'description' => 'required',
            ]);

        $department = Department::find($id);
        $department->directorate = $request->input('directorate');
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->save();

        return redirect('/department_list')->with('success', 'Department  Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function doDelete(Request $request)
    {
        dd($request);
        $department = Department::findorFail($request->id);
        $department->delete();

        return redirect('/department_list')->with('success', 'Department Removed Successfully');
    }
}

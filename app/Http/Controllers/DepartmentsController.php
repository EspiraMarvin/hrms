<?php

namespace App\Http\Controllers;

use App\Department;
use App\Role;
use Illuminate\Http\Request;
use App\Directorate;


class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function depAdd(){

        $directorate = Directorate::all();

        return view('hrms.directorate.department_add')->with('directorate',$directorate);

    }
/*    public function listShowDir(Request $request)

    {

        $directorate = Directorate::pluck('name', 'id');

        $selectedID = 2;

//        return view('hrms.directorate.department_edit', compact('id', 'departments'));
        return view('hrms.directorate.department_edit')->with('id',$selectedID, 'directorate',$directorate);

    }*/


    public function depList(){

        $department = Department::orderBy('id','desc')->paginate(10);

        return view('hrms.directorate.department_list')->with('department',$department);
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

//        $directorate = Directorate::all();
//        $directorate= Employee::orderBy('id','desc')->get();

//        return view('hrms.department.department_add')->with('directorate',$directorate);

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
//                'directorate' =>'required',
                'name' =>'required',
                'description'=>'required',
            ]);

        $department = new Department;
        $department->directorate = $request->input('directorate');
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->save();

//        dd($request);

        return redirect('/department_add')->with('success','Department Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $department = Department::find($id);
        $directorate = Directorate::all();
        $role = Role::all();

        return view('hrms.directorate.department_show',compact('department','directorate','role'));
//        return view('hrms.directorate.department_show',compact('department',$department,'directorate',$directorate);

//                return view('hrms.directorate.department_show')->with('department',$department);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('hrms.directorate.department_edit')->with('department',$department);
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
        $this->validate($request,
            [
                'name' =>'required',
                'description'=>'required',
            ]);

        $department = Department::find($id);
//        dd($department);

        $department->directorate = $request->input('directorate');
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->save();

        return redirect('/department_list')->with('success','Department  Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function doDelete($id)
    {

        $department = Department::find($id);
        $department->delete();

        return redirect('/department_list')->with('success','Department Removed Successfully');
    }
}

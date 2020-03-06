<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addRole()
    {
        return view('hrms.role.role_add');
    }

    public function roleList()
    {

        $roles = Role::orderBy('id','asc')->paginate(10);

        return view('hrms.role.role_list')->with('roles',$roles);
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
                'role' =>'required',
                'description'=>'required',
            ]);

        $role = new Role;
        $role->role = $request->input('role');
        $role->description = $request->input('description');
        $role->save();

        return redirect('/role_add')->with('success','Role Added');
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
        $role = Role::find($id);
        return view('hrms.role.role_edit')->with('role',$role);
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
                'role' =>'required',
                'description'=>'required',
            ]);

        $role = Role::find($id);
        $role->role = $request->input('role');
        $role->description = $request->input('description');
        $role->save();

        return redirect('/role_list')->with('success','Role  Information Updated');

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

    public function doDelete($id)
    {

        $role = Role::find($id);
        $role->delete();

        return redirect('/role_list')->with('success','Role Removed Successfully');
    }
}

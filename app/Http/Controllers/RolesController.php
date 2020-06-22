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
        $roles = Role::orderBy('id', 'asc')->get()->except(1);

        return view('hrms.role.role_list')->with('roles', $roles);
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
                'role' => 'required|unique:roles,role',
            ]);

         if (!empty($request->job_group) && ($request->role === 'Supervisor') || $request->role === 'supervisor'){

             return redirect('/role_add')->with('error', 'Supervisor role does not need an ICTA Job Group !');
          }else{

             $request->job_group = "System";
         }

        $role = new Role;
        $role->role = $request->input('role');
        $role->job_group = $request->job_group;
        $role->description = $request->input('description');
        $role->save();

        return redirect('/role_add')->with('success', 'Role Added');
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
        $role = Role::find($id);
        return view('hrms.role.role_edit')->with('role', $role);
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
                'role' => 'required',
            ]);

        if (!empty($request->job_group) && ($request->job_group != 'System') && ($request->role === 'Supervisor') || $request->role === 'supervisor'){

            return redirect('/role_list')->with('error', 'Supervisor role does not need an ICTA Job Group !');

        }elseif(!empty($request->job_group)  && ($request->job_group != 'System')  && ($request->role != 'Supervisor') || $request->role != 'supervisor') {

            $request->job_group = $request->input('job_group');
        }

        $role = Role::find($id);
        $role->role = $request->input('role');
        $role->job_group = $request->job_group;
        $role->description = $request->input('description');
        $role->save();

        return redirect('/role_list')->with('success', 'Role  Information Updated');
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
        $role = Role::findorFail($request->id);
        $role->delete();

        return redirect('/role_list')->with('success', 'Role Removed Successfully');
    }
}

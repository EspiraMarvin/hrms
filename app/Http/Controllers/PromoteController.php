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
        $promotions = Promote::orderBy('id', 'desc')->paginate(10);

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

        $this->validate($request,
            [
                'role_id' => 'required',
                'promotion_date' => 'required'
            ]);

//        dd($request);
        $new_designation = Role::where('id', $request->new_designation)->first();
        $process = Employee::where('id', $request->user_id)->first();
        $process->salary = $request->new_salary;
        $process->save();

//        dd($new_designation);

        \DB::table('user_role')->where('user_id', $process->user_id)->update(['role_id' => $request->new_designation]);

        $promotion = new Promote;
        $promotion->user_id = $request->user_id;
        $promotion->old_designation = $request->old_designation;
        $promotion->new_designation = $new_designation;
//        $promotion->new_designation = $new_designation->name;
        $promotion->old_salary = $request->old_salary;
        $promotion->new_salary = $request->new_salary;
        $promotion->promotion_date = $request->promotion_date;
        $promotion->save();

        return redirect('/promote_add')->with('success', 'Employee Promoted Successfully');
    }

    public function searchPromote()
    {
        $employee = Employee::all();
        $q = request()->input('q');

        if ($q != '') {
            $data = Employee::where('name', 'LIKE', '%' . $q . '%')
                ->orderBy('id', 'desc')
                ->paginate(10)
                ->setpath('');

            $data->appends(array(
                'q' => request()->input('q'),
            ));

            return view('hrms.promote.employee_promote')->with('data', $data);
        } else {
            return redirect('/promote_add')->with('error', 'Search Input Empty!');
        }
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
        $user = Employee::find($id);
        $roles = Role::all()->except('9');
        $departments = Department::all();


        return view('hrms.promote.promote_edit', compact('user',$user, 'roles', $roles, 'departments', $departments));
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

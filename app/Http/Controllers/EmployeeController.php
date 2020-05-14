<?php

namespace App\Http\Controllers;

use App\Supervisor;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Employee;
use App\User;
use App\Department;
use App\Role;
use DB;
use phpDocumentor\Reflection\Types\Nullable;
use Symfony\Component\Console\Input\Input;
use function foo\func;

//use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function EmpAddDep()
    {

        $role = Role::all();
        $department = Department::all();
//        $employee = Employee::all();
        $supervisor = User::whereHas('roles', function ($q) {
            $q->where('user_role.role_id',9);
        })->get();

        return view('hrms.employee.employee_add', compact('role', 'department', 'supervisor',$supervisor));

    }

    public function EmpEditDep()
    {

        $role = Role::all();
        $department = Department::all();
        $supervisor = User::whereHas('roles', function ($q) {
            $q->where('user_role.role_id',9);
        })->get();

        return view('hrms.employee.employee_edit', compact($role, 'role', $department, 'department',$supervisor));
    }

    public function listSupervisor()
    {
        $supervisor = User::whereHas('roles', function ($q) {
            $q->where('user_role.role_id',9);
        })->orderBy('id', 'desc')->paginate(15);
        return view('hrms.employee.supervisor_list',compact('supervisor',$supervisor));
    }

    public function showSupervisedBy()
    {
        $supervisor = User::all();

        $employees = User::whereHas('supervisor', function ($q){
            $q->where('supervisor_id',Auth::user()->id);
        })->orderBy('id', 'desc')->paginate(10);
//        dd($employees);

        return view('hrms.employee.supervisedBy_list',compact('employees',$employees,'supervisor',$supervisor));
    }

    public function index()
    {
        $totalEmployee = Employee::count();
        $employee = Employee::orderBy('id', 'desc')->paginate(10);
        $supervisor = Employee::all();

        return view('hrms.employee.employee_manager', compact('employee', $employee,'supervisor',$supervisor,'totalEmployee', $totalEmployee));
    }

    public function bankDetails()
    {
        $employee = Employee::orderBy('id', 'desc')->paginate(10);

        return view('hrms.employee.employee_bank_details')->with('employee', $employee);

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
//        dd($request);

        $this->validate($request,
            [
                'photo' => 'image|nullable|max:1999',
                'code' => 'required',
                'name' => 'required',
//                'email' => 'required|email|unique:employees',
                'status' => 'required',
                'gender' => 'required',
                'department' => 'required',
//                'supervisor' => 'required',

            ]);
//        return 123;
        //handle file upload
        if ($request->hasFile('photo')) {
            //get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //filename to store , gets original filename with the timestamp so it becomes unique when someone uploads file with same filename with another file
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $user           = new User;
        $user->name     = $request->name;
        $user->email    = str_replace(' ', '_', $request->name) . '@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();


        $employee = new Employee;
        $employee->photo = $fileNameToStore;
        $employee->code = $request->input('code');
        $employee->pf_number = $request->input('pf_number');
        $employee->name = $request->input('name');
        $employee->status = $request->input('status');
        $employee->gender = $request->input('gender');
        $employee->qualification = $request->input('qualification');
        $employee->date_of_birth = $request->input('date_of_birth');
        $employee->date_of_joining = $request->input('date_of_joining');
        $employee->phone_number = $request->input('phone_number');
        $employee->emergency_number = $request->input('emergency_number');
        $employee->kra_pin = $request->input('kra_pin');
        $employee->father_name = $request->input('father_name');
        $employee->current_address = $request->input('current_address');
        $employee->permanent_address = $request->input('permanent_address');
        $employee->department = $request->input('department');
        $employee->duty_station = $request->input('duty_station');
        $employee->posted_date = $request->input('posted_date');
        $employee->employment_type = $request->input('employment_type');
        $employee->job_group = $request->input('job_group');
        $employee->salary = $request->input('salary');
        $employee->account_number = $request->input('account_number');
        $employee->bank_name = $request->input('bank_name');
        $employee->date_of_resignation = $request->input('date_of_resignation');
        $employee->notice_period = $request->input('notice_period');
        $employee->last_working_day = $request->input('last_working_day');
        $employee->full_final = $request->input('full_final');
        $employee->user_id = $user->id;
        $employee->save();


        foreach ($request->roles_id as $request->role_id) {

            $user->roles()->attach($request->role_id);
        }

        $user->supervisedBy()->attach($request->supervisor_id);

        return redirect('/employee_add')->with('success', 'Employee  Added');
    }



    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('hrms.employee.employee_show')->with('employee', $employee);
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
        $department = Department::all();

        $supervisor = User::whereHas('roles', function ($q) {
            $q->where('user_role.role_id',9);
        })->get();


        return view('hrms.employee.employee_edit', compact('employee',$employee, 'department',
            $department,'supervisor',$supervisor,'roles',$roles));
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
//        dd($request);

        $this->validate($request,
            [
                'photo' => 'image|nullable|max:1999',
                'code' => 'required',
                'pf_number' => 'required',
                'name' => 'required',
                'status' => 'required',
                'gender' => 'required',
                'department' => 'required',
                'last_working_day' => 'nullable'

            ]);

//        dd($request);

        //handle file upload
        if ($request->hasFile('photo')) {
            //get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //filename to store , gets original filename with the timestamp so it becomes unique when someone uploads file with same filename with another file
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
        }

        $user           = User::find($id);
        $user->name     = $request->input('name');
//        $user->email    = $request->input('email');
        $user->password = bcrypt('12345678');
        $user->save();

        $employee = Employee::find($id);
        $employee->code = $request->input('code');
        $employee->name = $request->input('name');
        $employee->pf_number = $request->input('pf_number');
//        $employee->email = $request->input('email');
        $employee->status = $request->input('status');
        $employee->gender = $request->input('gender');
        $employee->qualification = $request->input('qualification');
        $employee->date_of_birth = $request->input('date_of_birth');
        $employee->date_of_joining = $request->input('date_of_joining');
        $employee->phone_number = $request->input('phone_number');
        $employee->emergency_number = $request->input('emergency_number');
        $employee->kra_pin = $request->input('kra_pin');
        $employee->father_name = $request->input('father_name');
        $employee->current_address = $request->input('current_address');
        $employee->permanent_address = $request->input('permanent_address');
        $employee->department = $request->input('department');
        $employee->supervisor_id = $request->input('supervisor_id');
        $employee->duty_station = $request->input('duty_station');
        $employee->posted_date = $request->input('posted_date');
        $employee->employment_type = $request->input('employment_type');
        $employee->job_group = $request->input('job_group');
        $employee->salary = $request->input('salary');
        $employee->account_number = $request->input('account_number');
        $employee->bank_name = $request->input('bank_name');
//        $employee->pf_status = $request->input('pf_status');
        $employee->date_of_resignation = $request->input('date_of_resignation');
        $employee->notice_period = $request->input('notice_period');
//        $employee->last_working_day = date_format(date_create($request->last_working_day), 'Y-m-d');
        $employee->last_working_day = $request->input('last_working_day');
        $employee->full_final = $request->input('full_final');
        if ($request->hasFile('photo')) {
            $employee->photo = $fileNameToStore;
        }
        $employee->save();

        $user->roles()->detach();

        foreach ($request->roles_id as $request->role_id) {

            $user->roles()->attach($request->role_id);
        }


        $user->supervisedBy()->detach();
        $user->supervisedBy()->attach($request->supervisor_id);

        return redirect('/employee_manager')->with('success', 'Employee  Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if ($employee->photo != 'noimage.jpg') {

            //delete image
            Storage::delete('public/photos/'.$employee->photo);

        }
        $employee->delete();
        return redirect('/employee_manager')->with('success', 'Employee Removed');

    }

    public function doDelete(Request $request)
    {
        $emp = Employee::findorFail($request->id);

        $emp->roles()->detach();
        $emp->supervisedBy()->attach($request->supervisor_id);

        $emp->delete();

        return redirect('/employee_manager')->with('success', 'Employee Removed Successfully');
    }

    public function doDeleteSup(Request $request)
    {

        $user = User::whereHas('roles', function ($q) {
            $q->where('user_role.role_id',9);
        })->get();
        if ($user == $request->role_id){
            $user->delete();
        }

        return redirect('/supervisor_list')->with('success', 'Supervisor Removed Successfully');

    }

//  function to search database
    public function search()
    {
        $employee = Employee::all();
        $q = request()->input('q');

        if ($q != '') {
            $data = Employee::where('name', 'LIKE', '%' . $q . '%')
                ->orWhere('code', 'LIKE', '%' . $q . '%')
                ->orWhere('pf_number', 'LIKE', '%' . $q . '%')
                ->orWhere('status', 'LIKE', '%' . $q . '%')
                ->orWhere('date_of_joining', 'LIKE', '%' . $q . '%')
                ->orWhere('phone_number', 'LIKE', '%' . $q . '%')
                ->orWhere('department', 'LIKE', '%' . $q . '%')
                ->orWhere('job_group', 'LIKE', '%' . $q . '%')
                ->orWhere('employment_type', 'LIKE', '%' . $q . '%')
                ->orWhere('duty_station', 'LIKE', '%' . $q . '%')
                ->orWhere('posted_date', 'LIKE', '%' . $q . '%')
                ->orderBy('id', 'desc')
                ->paginate(10)
                ->setpath('');

            $data->appends(array(
                'q' => request()->input('q'),
            ));
            return view('hrms.employee.employee_search')->with('data', $data);
        } else {
            return redirect('/employee_manager')->with('error', 'Search Input Empty!');
        }
    }

  /*  public function searchPromote()
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
    }*/

// autocomplete for employees
    public function autocomplete(Request $request)
    {
        $data = Employee::select("name")
            ->where("name", "LIKE", "%{$request->input('query')}%")
            ->get();

        return response()->json($data);
    }

}


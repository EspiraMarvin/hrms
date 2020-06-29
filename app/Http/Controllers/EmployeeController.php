<?php

namespace App\Http\Controllers;

use App\AwardAssign;
use App\Imports\SelectUserSheet;
use App\Mail\LeaveApproval;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Employee;
use App\User;
use App\Department;
use App\Role;
use App\Contracts;
//use Illuminate\Support\Facades\DB;
use App\Exports\EmployeesExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;
use function foo\func;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function EmpAddDep()
    {

        $role = Role::all()->except(1);
        $department = Department::all();
        $supervisor = User::whereHas('roles', function ($q) {
            $q->where('user_role.role_id',2);
        })->get();

        return view('hrms.employee.employee_add', compact('role', 'department', 'supervisor',$supervisor));

    }

    public function EmpEditDep()
    {

        $role = Role::all()->except(1);
        $department = Department::all();
        $supervisor = User::whereHas('roles', function ($q) {
            $q->where('user_role.role_id',2);
        })->get();

        return view('hrms.employee.employee_edit', compact($role, 'role', $department, 'department',$supervisor));
    }

    public function listSupervisor()
    {
        $supervisor = User::whereHas('roles', function ($q) {
            $q->where('user_role.role_id',2);
        })->orderBy('id', 'desc')->get();

        return view('hrms.employee.supervisor_list',compact('supervisor',$supervisor));
    }

    public function showSupervisedBy($id)
    {
        $supervisor = User::find($id);

        $employees = User::whereHas('supervisedBy', function ($q) use ($supervisor) {
            $q->where('supervisor_id', $supervisor->id );
        })->get();

        return view('hrms.employee.supervisedBy_list',compact('employees',$employees,'supervisor',$supervisor));
    }

    public function index()
    {
        $totalEmployee = Employee::count();
        $employee = Employee::orderBy('id', 'desc')->paginate(15);

        return view('hrms.employee.employee_manager', compact('employee', $employee,'totalEmployee', $totalEmployee));
    }

    public function bankDetails()
    {
        $employee = Employee::orderBy('id', 'desc')->paginate(15);

        return view('hrms.employee.employee_bank_details')->with('employee', $employee);
    }

    public function contractsList()
    {
        $employees = Employee::where('employment_type','!=','Permanent')->get();

//        dd($employees);
        // no of contracts
        $contractsNumber = Employee::where('employment_type','!=','Permanent')->count();

        foreach ($employees as $contr){
            //get the contract // separate the array //get the start date and end date of the contract

            $gett = $contr->employment_type;

            $arr = explode(" ",$gett);
            $first = $arr[1];
            $first = ltrim($first, '(');

            $second = $arr[3];
            $second = rtrim($second, ')');

            //convert the strings to dates
            $convertOne = strtotime($first);
            $startContract = date("Y-m-d H:i:s", $convertOne); //start date
            $convertTwo = strtotime($second);
            $endContract = date("Y-m-d H:i:s", $convertTwo);  //end date


            $date1 = Carbon::createMidnightDate($startContract);
            $date2 = Carbon::createMidnightDate($endContract);

            $diffInDays = $date1->diffInDays($date2); //diff in days
            $diffInYears = $date1->diffInYears($date2); //diff in years

            $diffFromToday= $date2->diffForHumans();  // human readable 4 yrs from now



//            dd($diffInYears);

        }
        return view('hrms.employee.contracts_list',compact('employees',$employees,'contractsNumber',$contractsNumber,
        'diffInDays','diffInYears'));
    }

    public function contractRenewal()
    {
        //from the latest to oldest
        $contracts = Contracts::orderBy('id','desc')->get();

        return view('hrms.employee.contract_renewal', compact('contracts', $contracts));

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
                'status' => 'required',
                'gender' => 'required',
            ]);

        //handle file upload
        if ($request->hasFile('photo')) {
            //get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //array to check extension
            $allowedExtension = ['jpg', 'jpeg', 'png'];
            //filename to store , gets original filename with the timestamp so it becomes unique when someone uploads file with same filename with another file
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            if (!in_array($extension, $allowedExtension)) {

                return redirect()->back()->with('error', 'Extension not allowed');
            }
            //upload image
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        $user           = new User;
        $user->name     = $request->name;
        $user->email    = str_replace(' ', '_', $request->name) . '@gmail.com';
        $user->password = bcrypt('12345678');

//        Mail::to($user->email)->send(new LeaveApproval());

        $user->save();

        $employee = new Employee;
        $employee->department_id = $request->input('department_id');
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
        $employee->kin_name = $request->input('kin_name');
        $employee->current_address = $request->input('current_address');
        $employee->permanent_address = $request->input('permanent_address');
        $employee->department_id = $request->input('department_id');
        $employee->duty_station = $request->input('duty_station');
        $employee->posted_date = $request->input('posted_date');
        $employee->employment_type = $request->input('employment_type');
        $employee->salary = $request->input('salary');
        $employee->account_number = $request->input('account_number');
        $employee->bank_name = $request->input('bank_name');
        $employee->date_of_resignation = $request->input('date_of_resignation');
        $employee->notice_period = $request->input('notice_period');
        $employee->last_working_day = $request->input('last_working_day');
        $employee->user_id = $user->id;
        $employee->save();


        foreach ($request->roles_id as $request->role_id) {

            $user->roles()->attach($request->role_id);
        }

        foreach ($request->supervisors_id as $request->supervisor_id){

            $user->supervisedBy()->attach($request->supervisor_id);

        }

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

        $id = $employee->id;
        //find age
        $howOldAmI = Carbon::createFromDate($employee->date_of_birth)->age;
        //no of awards
        $awards = AwardAssign::where('employee_id',$id)->count();

        $check = Employee::where('employment_type','!=','Permanent')
            ->where('user_id', $id)->get();


        if (isset($check)){
            $contracts = $check;
            foreach ($contracts as $contr) {

                $gett = $contr->employment_type;

                $arr = explode(" ", $gett);
                $first = $arr[1];
                $first = ltrim($first, '(');


                $second = $arr[3];
                $second = rtrim($second, ')');

                //convert the strings to dates
                $convertOne = strtotime($first);
                $startContract = date("Y-m-d H:i:s", $convertOne); //start date
                $convertTwo = strtotime($second);
                $endContract = date("Y-m-d H:i:s", $convertTwo);  //end date

                $date1 = Carbon::createMidnightDate($startContract);
                $date2 = Carbon::createMidnightDate($endContract);

                $diffInDays = $date1->diffInDays($date2); //diff in days
                $diffInYears = $date1->diffInYears($date2); //diff in years

                $diffFromToday = $date2->diffForHumans();  // human readable 4 yrs from now

                $now = Carbon::now();
                $countableDiff = $date2->diffInDays($now);
//                dd($countableDiff);

                return view('hrms.employee.employee_show',compact('employee', $employee,'howOldAmI',$howOldAmI,
                    'awards','diffInYears',$diffInYears,'diffInDays',$diffInDays,'diffFromToday','countableDiff',$countableDiff));
            }
        }

        return view('hrms.employee.employee_show',compact('employee', $employee,'howOldAmI',$howOldAmI,'awards'));
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
        $roles = Role::all()->except(1);
        $department = Department::all();

        $supervisor = User::whereHas('roles', function ($q) {
            $q->where('user_role.role_id',2);
        })->get();

        return view('hrms.employee.employee_edit',
            compact('employee',$employee, 'department',$department,'supervisor',$supervisor,'roles',$roles));
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
                'photo' => 'image|nullable|max:1999',
                'code' => 'required',
                'pf_number' => 'required',
                'name' => 'required',
                'status' => 'required',
                'gender' => 'required',
//                'department_id' => 'required'
            ]);

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

        $user = User::find($id);
        $user->save();


        if(empty($request->roles_id) && empty($user->roles[0]->role) && empty($user->roles[1]->role)){

            return redirect()->back()->with('error', 'Employee has No Roles');

        }elseif(empty($request->supervisors_id) && empty($user->supervisedBy[0]->name) && empty($user->supervisedBy[1]->name)){

            return redirect()->back()->with('error', 'Employee has No Supervisors');
        }

        $employee = Employee::find($id);

        // check if employment type is changed.. if its changed save to update table
        if (isset($request->employment_type) && $request->employment_type != 'Permanent'){

            $gett = $request->employment_type;

            $arr = explode(" ", $gett);
            $first = $arr[1];
            $first = ltrim($first, '(');


            $second = $arr[3];
            $second = rtrim($second, ')');

            //convert the strings to dates
            $convertOne = strtotime($first);
            $startContract = date("Y-m-d H:i:s", $convertOne); //start date
            $convertTwo = strtotime($second);
            $endContract = date("Y-m-d H:i:s", $convertTwo);  //end date

            $date1 = Carbon::createMidnightDate($startContract);
            $date2 = Carbon::createMidnightDate($endContract);

            $diffInDays = $date1->diffInDays($date2); //diff in days
            $diffInYears = $date1->diffInYears($date2); //diff in years

            $diffFromToday = $date2->diffForHumans();  // human readable 4 yrs from now

            //check for change in contract details
            if ($request->employment_type != $user->employee->employment_type){

                //timestamp of time contract was renewed
                $n = carbon::now();
                DB::table('contracts')->insert(
                    [
                        'user_id' => $employee->id,
                        'name' => $employee->name,
                        'contract' => $request->employment_type,
                        'renewed_at' => $n,
                        'diffInDays' => $diffInDays,
                        'diffInYears' => $diffInYears

                    ]
                );
            }
        }

        $employee->department_id = $request->input('department_id');
        $employee->code = $request->input('code');
        $employee->name = $request->input('name');
        $employee->pf_number = $request->input('pf_number');
        $employee->status = $request->input('status');
        $employee->gender = $request->input('gender');
        $employee->qualification = $request->input('qualification');
        $employee->date_of_birth = $request->input('date_of_birth');
        $employee->date_of_joining = $request->input('date_of_joining');
        $employee->phone_number = $request->input('phone_number');
        $employee->emergency_number = $request->input('emergency_number');
        $employee->kin_name = $request->input('kin_name');
        $employee->current_address = $request->input('current_address');
        $employee->permanent_address = $request->input('permanent_address');
        $employee->duty_station = $request->input('duty_station');
        $employee->posted_date = $request->input('posted_date');
        $employee->employment_type = $request->input('employment_type');
        $employee->salary = $request->input('salary');
        $employee->date_of_resignation = $request->input('date_of_resignation');
        $employee->notice_period = $request->input('notice_period');
        $employee->last_working_day = $request->input('last_working_day');
        if ($request->hasFile('photo')) {

            $employee->photo = $fileNameToStore;
        }

        $employee->save();

        //check is roles have been changed
        if(isset($request->roles_id)){

            //if roles change is requested detach all the roles of the user
            $user->roles()->detach();

            // then attach the requested roles
            foreach ($request->roles_id as $request->role_id) {

                $user->roles()->attach($request->role_id);
            }
        }

        if(isset($request->supervisors_id)){

            if (!empty($request->supervisors_id)){

                $user->supervisedBy()->detach();
            }

            foreach ($request->supervisors_id as $request->supervisor_id){
                $user->supervisedBy()->attach($request->supervisor_id);

            }
        }

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
      /*  $employee = Employee::find($id);
        if ($employee->photo != 'noimage.jpg') {
            //delete image
            Storage::delete('public/photos/'.$employee->photo);
        }
        $employee->delete();
        return redirect('/employee_manager')->with('success', 'Employee Removed');*/
    }

    public function doDelete(Request $request)
    {
        $emp = Employee::findorFail($request->id);
        $user = User::findorFail($request->id);

        if ($emp->photo != 'noimage.jpg') {
            //delete image
            Storage::delete('public/photos/'.$emp->photo);
        }

        $user->roles()->detach();

        $user->supervisor()->detach();

        $emp->delete();

        $user->delete();

        return redirect('/employee_manager')->with('success', 'Employee Deleted Successfully');
    }

    public function doDeleteSup(Request $request)
    {
        $user = User::findorFail($request->id);

        $user->supervisor()->detach();
        $user->roles()->detach($request->role_id);

        return redirect('/supervisor_list')->with('success', 'Supervisor Deleted Successfully');
    }

    public function doDeleteSupervisee(Request $request)
    {

    }

    public function editBank(Request $request)
    {

        $bank = Employee::findorFail($request->id);
        $bank->kra_pin = $request->input('kra_pin');
        $bank->bank_name = $request->input('bank_name');
        $bank->account_number = $request->input('account_number');
        $bank->save();

        return redirect('/employee_bank_details')->with('success', 'Bank Information Updated');
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
            return redirect('/employee_manager')->with('warning', 'Search Input Empty!');
        }
    }

    //search bank details
    public function searchBank()
    {
        $employee = Employee::all();
        $m = request()->input('m');

        if ($m != '') {
            $data = Employee::where('name', 'LIKE', '%' . $m . '%')
                ->orWhere('bank_name', 'LIKE', '%' . $m . '%')
                ->orWhere('account_number', 'LIKE', '%' . $m . '%')
                ->orderBy('id', 'desc')
                ->paginate(10)
                ->setpath('');

            $data->appends(array(
                'm' => request()->input('m'),
            ));
            return view('hrms.employee.employee_bank')->with('data', $data);
        } else {
            return redirect('/employee_bank_details')->with('warning', 'Search Input Empty!');
        }
    }


// autocomplete search for employees
    public function autocomplete(Request $request)
    {
        $data = Employee::select("name")
            ->where("name", "LIKE", "%{$request->input('query')}%")
            ->get();

        return response()->json($data);
    }

    public function export()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function export_pdf()
    {
        $employees = Employee::all();

        //send data to the view using the loadView function of PDF facade
        $pdf = PDF::loadView('hrms.employee.pdf', compact('employees',$employees));

        // if you want to save the generated pdf to the serve
//        $pdf->save(storage_path().'_filename.pdf');

        //download the file using download function
        return $pdf->download('employees.pdf');

    }

    public function importFileExcel(Request $request)
    {
//        dd($request);
            $request->validate([
                'import_file' => 'required'
            ]);

            if ($request->hasFile('import_file')){
                $imports = new SelectUserSheet();
                $imports->import( request()->file('import_file'));
                return redirect('/employee_manager')->with('success', 'Users Imported');
            }

            return redirect('/employee_manager')->with('error', 'No Import File Chosen');

    }

    public function printPreview()
    {
        $employees = Employee::all();

        return view('hrms.employee.printPreview')->with('employees',$employees);

    }
}


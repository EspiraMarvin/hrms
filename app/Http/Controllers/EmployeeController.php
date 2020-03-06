<?php

namespace App\Http\Controllers;

//use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Employee;
use App\User;
//use App\Directorate;
use App\Department;
use App\Role;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

  /*  public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function EmpAddDep(){

        $role = Role::all();
        $department = Department::all();
        $employee = Employee::all();

        return view('hrms.employee.employee_add',compact(['role', 'department','employee']));

//        return view('hrms.employee.employee_add',compact('role', 'department','employee'));
    }

    public function EmpEditDep(){

        $role = Role::all();
        $department = Department::all();
        $employee = Employee::all();
        $user = User::all();
//        $supervisor = Employee::all();
        $supervisor = DB::table('types')->get();


        return view('hrms.employee.employee_edit',compact([$role,'role', $department,'department',$employee,'employee',$user,'user',$supervisor,'supervisor']));
    }

    public function index()
    {
//        $employee = Employee::all();
//        $employee = Employee::orderBy('id','desc')->get();
//        $employee = Employee::where('id','1')->get();
//        $employee = Employee::orderBy('id','desc')->take(1)->get();

//          $user_id = auth()->user('id');
//          $user = User::find($user_id);
          $employee = Employee::orderBy('id','desc')->paginate(10);


        return view('hrms.employee.employee_manager')->with('employee',$employee);
    }

//  function to search database

    public function search(){
        $employee = Employee::all();
        $q = request()->input('q');
//        dd($q);

//        $q = Input::get('q');
//    dd($q);
        if ($q != ''){
            $data = Employee::where('name', 'LIKE', '%' .$q. '%')
                ->orWhere('code', 'LIKE', '%' .$q. '%')
                ->orWhere('email', 'LIKE', '%' .$q. '%')
                ->orWhere('role', 'LIKE', '%' .$q. '%')
                ->orWhere('supervisor', 'LIKE', '%' .$q. '%')
                ->orWhere('date_of_joining', 'LIKE', '%' .$q. '%')
                ->orWhere('phone_number', 'LIKE', '%' .$q. '%')
                ->orWhere('department', 'LIKE', '%' .$q. '%')
                ->orWhere('duty_station', 'LIKE', '%' .$q. '%')
                ->orWhere('posted_date', 'LIKE', '%' .$q. '%')
                ->orderBy('id','desc')
                ->paginate(5)
                ->setpath('');

            $data->appends(array(
                'q' => request()->input('q'),
//                'q' => Input::get('q'),
            ));
//            if (count($data > 0)){
//                return view('hrms.employee.employee_manager')->with($data);
//            }
            return view('hrms.employee.employee_search')->with('data',$data);
//            return view('hrms.employee.employee_manager',compact('data',$data,'employee',$employee));

//            return view('employee_manager')->withMessage('No results found');
        }
    }


    public function autocomplete(Request $request)
    {
        $data = Employee::select("name")
            ->where("name","LIKE","%{$request->input('query')}%")
            ->get();

        return response()->json($data);
    }

    public function bankDetails()
    {
        $employee = Employee::orderBy('id','desc')->paginate(10);

        return view('hrms.employee.employee_bank_details')->with('employee',$employee);

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

//        dd($request);

        $this->validate($request,
            [
                'photo' => 'image|nullable|max:1999',
                'code' => 'required',
                'name' =>'required',
                'status'=>'required',
                'gender'=>'required',
                'department'=>'required',
                'duty_station'=>'required',
                'date_of_resignation'=> 'nullable',
                'last_working_day' => 'nullable'

            ]);
//        return 123;
        //handle file upload
        if($request->hasFile('photo')){
            //get filename with the extension
            $filenameWithExt=$request->file('photo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //filename to store , gets original filename with the timestamp so it becomes unique when someone uploads file with same filename with another file
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('photo')->storeAs('public/photos',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $employee = new Employee;
        $employee->photo= $fileNameToStore;
        $employee->code = $request->input('code');
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
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
        $employee->role = $request->input('role');
        $employee->department = $request->input('department');
        $employee->supervisor = $request->input('supervisor');
        $employee->duty_station = $request->input('duty_station');
        $employee->posted_date = $request->input('posted_date');
        $employee->employment_type = $request->input('employment_type');
        $employee->salary = $request->input('salary');
        $employee->account_number = $request->input('account_number');
        $employee->bank_name = $request->input('bank_name');
        $employee->pf_account_number = $request->input('pf_account_number');
        $employee->pf_status = $request->input('pf_status');
        $employee->date_of_resignation = $request->input('date_of_resignation');
        $employee->notice_period = $request->input('notice_period');
        $employee->last_working_day = $request->input('last_working_day');
        $employee->full_final = $request->input('full_final');
        $employee->user_id = auth()->user()->id;
        $employee->save();

        return redirect('/employee_add')->with('success','Employee  Added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('hrms.employee.employee_show')->with('employee',$employee);
    }

   /* public function profile($id)
    {
        $employee = Employee::find($id);

        return view('hrms.employee.employee_show')->with('employee',$employee);
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('hrms.employee.employee_edit')->with('employee',$employee);


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
                'photo' => 'image|nullable|max:1999',
                'code' => 'required',
                'name' =>'required',
                'status'=>'required',
                'gender'=>'required',
//                'role' => 'required',
//                'department'=>'required',
                'duty_station'=>'required',
//                'date_of_resignation' => 'nullable',
                'last_working_day' => 'nullable'

            ]);
//        return 123;
        //handle file upload
        if($request->hasFile('photo')){
            //get filename with the extension
            $filenameWithExt=$request->file('photo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //filename to store , gets original filename with the timestamp so it becomes unique when someone uploads file with same filename with another file
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('photo')->storeAs('public/photos',$fileNameToStore);
        }


        $employee = Employee::find($id);
        $employee->code = $request->input('code');
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
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
        $employee->role = $request->input('role');
        $employee->department = $request->input('department');
        $employee->supervisor = $request->input('supervisor');
        $employee->duty_station = $request->input('duty_station');
        $employee->posted_date = $request->input('posted_date');
        $employee->employment_type = $request->input('employment_type');
        $employee->salary = $request->input('salary');
        $employee->account_number = $request->input('account_number');
        $employee->bank_name = $request->input('bank_name');
        $employee->pf_account_number = $request->input('pf_account_number');
        $employee->pf_status = $request->input('pf_status');
        $employee->date_of_resignation = $request->input('date_of_resignation');
        $employee->notice_period = $request->input('notice_period');
        $employee->last_working_day = $request->input('last_working_day');
        $employee->full_final = $request->input('full_final');
        if ($request->hasFile('photo')){
            $employee->photo = $fileNameToStore;
        }
        $employee->save();

        return redirect('/employee_manager')->with('success','Employee  Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if ($employee->photo != 'noimage.jpg'){

            //delete image
            Storage::delete('public/photos/'.$employee->photo);

        }
        $employee->delete();
        return redirect('/employee_manager')->with('success','Employee Removed');

    }

    public function doDelete($id)
    {

        $emp = Employee::find($id);
        $emp->delete();

        return redirect('/employee_manager')->with('success','Employee Removed Successfully');
    }

/*    public function searchCustomerAccounts()
    {
        $filters = request()->input('filters');
        if(!$filters) {
            return response()->json(['data' => []]);
        }
        $customerAccounts = User::query()
            ->where('name', 'LIKE', "%{$filters}%")
            ->orWhere('email', 'LIKE', "%{$filters}%")
            ->orWhere('customer_account', 'LIKE', "%{$filters}%")
            ->get();

        return CustomerAccountResource::collection($customerAccounts);
    }*/

    public function doPromotion()
    {
       /*  $user_id = auth()->user('id');
         $g = $user_id;
         */
        $emps  = User::get();
//        $emps  = Employee::get();
//        $emps  = Employee::get();

        $roles = Role::get();

        return view('hrms.promote.promote_add', compact('emps', 'roles','user_id'));
    }

    public function getPromotionData(Request $request)
    {
        $result = Employee::with('userrole.role')->where('id', $request->employee_id)->first();
        if ($result) {
            $result = ['salary' => $result->salary, 'designation' => $result->userrole->role->name];
        }

        return json_encode(['status' => 'success', 'data' => $result]);
    }

    public function processPromotion(Request $request)
    {

        $newDesignation  = Role::where('id', $request->new_designation)->first();
        $process         = Employee::where('id', $request->emp_id)->first();
        $process->salary = $request->new_salary;
        $process->save();

        \DB::table('user_roles')->where('user_id', $process->user_id)->update(['role_id' => $request->new_designation]);

        $promotion                    = new Promotion();
        $promotion->emp_id            = $request->emp_id;
        $promotion->old_designation   = $request->old_designation;
        $promotion->new_designation   = $newDesignation->name;
        $promotion->old_salary        = $request->old_salary;
        $promotion->new_salary        = $request->new_salary;
        $promotion->date_of_promotion = date_format(date_create($request->date_of_promotion), 'Y-m-d');
        $promotion->save();

        \Session::flash('flash_message', 'Employee successfully Promoted!');

        return redirect()->back();
    }

    public function showPromotion()
    {
        $promotions = Promotion::with('employee')->paginate(10);

        return view('hrms.promote.promote_list', compact('promotions'));
    }
}


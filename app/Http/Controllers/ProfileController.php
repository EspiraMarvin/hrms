<?php

namespace App\Http\Controllers;

use App\AwardAssign;
use App\Contracts;
use App\Employee;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;

class ProfileController extends Controller
{

    public function show()
    {
        $employee = Employee::where('id', \Auth::user()->id)->first();

        //no of awards
        $awards = AwardAssign::where('employee_id', \Auth::user()->id)->count();

        //get user age
        $howOldAmI = Carbon::createFromDate($employee->date_of_birth)->age;
        $check = Employee::where('employment_type','!=','Permanent')
            ->where('user_id', \Auth::user()->id)->get();

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

                return view('profile', compact('employee', $employee, 'howOldAmI', $howOldAmI,
                    'diffInDays', 'diffInYears', 'diffFromToday','countableDiff' ,'awards', $awards));
            }
        }else{
            $contracts = Contracts::where('user_id', \Auth::user()->id)->latest()->get();
        }

//        dd($contracts);
        if (!empty($contracts)) {

            foreach ($contracts as $contr) {

//            dd($contr);
                //get the contract // separate the array //get the start date and end date of the contract
                $gett = $contr->contract;

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

                return view('profile', compact('employee', $employee, 'howOldAmI', $howOldAmI,
                    'diffInDays', 'diffInYears', 'diffFromToday','awards',$awards));
            }

            return view('profile', compact('employee', $employee, 'howOldAmI', $howOldAmI,'awards',$awards));

        }

    }

    public function editProfile(Request $request)
    {

        $user = User::findorFail($request->id);
        $user->email = $request->input('email');
        $user->save();

        return redirect('/profile')->with('success', 'Email Information Updated');
    }

    public function editProfilePic(Request $request)
    {
        $this->validate($request,
            [
//                'photo' => 'required|max:2000000',
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
        }
        $profile = Employee::findorFail($request->id);

        if($request->hasFile('photo')) {
            $profile->photo = $fileNameToStore;
        } else
         {
             $profile->photo = $fileNameToStore = 'noimage.jpg';
         }
        $profile->save();

        return redirect('/profile')->with('success', 'Profile Photo Updated');
    }

    public function editBank(Request $request)
    {

        $bank = Employee::findorFail($request->id);
        $bank->account_number= $request->input('account_number');
        $bank->bank_name = $request->input('bank_name');
        $bank->save();

        return redirect('/profile')->with('success', 'Bank Information Updated');
    }

    public function editPersonal(Request $request)
    {

        $personal = Employee::findorFail($request->id);
        $personal->date_of_birth = $request->input('date_of_birth');
        $personal->phone_number = $request->input('phone');
        $personal->emergency_number = $request->input('emergency');
        $personal->kin_name = $request->input('kin_name');
        $personal->qualification = $request->input('qualification');
        $personal->current_address = $request->input('current_address');
        $personal->permanent_address = $request->input('permanent_address');
        $personal->save();

        return redirect('/profile')->with('success', 'Personal Information Updated');
    }

    public function editEmployment(Request $request)
    {

        $emp = Employee::findorFail($request->id);
        $emp->date_of_joining= $request->input('date_of_joining');
        $emp->duty_station = $request->input('duty_station');
        $emp->posted_date = $request->input('posted_date');
        $emp->notice_period = $request->input('notice_period');
        $emp->date_of_resignation = $request->input('date_of_resignation');
        $emp->last_working_day = $request->input('last_working_day');
        $emp->save();

        return redirect('/profile')->with('success', 'Employment Information Updated');
    }
}

<?php

namespace App\Http\Controllers;

use App\Award;
use App\AwardAssign;
use App\Employee;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AwardsController extends Controller
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

    public function addAward()
    {

        return view('hrms.award.award_add');
    }

    public function assingAward()
    {

        $employees = Employee::all();
        $awards = Award::all();

        return view('hrms.award.award_assign', compact('employees', 'awards'));
    }

    public function awardList()
    {

        $awards = Award::orderBy('id','desc')->paginate(5);

        return view('hrms.award.award_list')->with('awards', $awards);
    }

    public function awardeesList()
    {

        $awards = AwardAssign::orderBy('id', 'desc')->paginate(10);

        return view('hrms.award.awardees_listing')->with('awards', $awards);
    }


    public function myAwards()
    {
        $user = Auth::user();
        $employee_id = $user->employee->id;
        $awards = AwardAssign::wherehas('employee', function ($q) use ($employee_id) {
            $q->where('employee_id', $employee_id);
        })->paginate(10);

        return view('hrms.award.my_awards')->with('awards', $awards);

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

        $validator = Validator::make($request->all(), [
            'award' => 'required|unique:awards',
            'description' => 'required',
        ])->validate();

        $award = new Award;
        $award->award = $request->input('award');
        $award->description = $request->input('description');
        $award->save();

        return redirect('/award_add')->with('success', 'Award Added');

    }

    public function storeAssignedAward(Request $request)
    {

        $this->validate($request,
            [
                'employee_id' => 'required',
                'award_id' => 'required|unique:award_assigns',
                'date' => 'required',
                'reason' => 'required',
            ]);

        $awardAssign = new AwardAssign;
        $awardAssign->employee_id = $request->input('employee_id');
        $awardAssign->award_id = $request->input('award_id');
        $awardAssign->date = $request->input('date');
        $awardAssign->reason = $request->input('reason');
        $awardAssign->save();

        return redirect('/award_assign')->with('success', 'Award Assigned Successful');

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
    /*    $award = Award::find($id);
        return view('hrms.award.award_edit')->with('award', $award);*/
    }

    public function editAssigned($id)
    {

        $awardAssign = AwardAssign::find($id);
        $awards = Award::orderBy('id', 'desc')->get();
        return view('hrms.award.awardees_listing_edit', compact('awardAssign', $awardAssign, 'awards', $awards));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request)
    {
        $this->validate($request,
            [
                'award' => 'required',
//                'award' => 'required|unique:awards',
                'description' => 'required',
            ]);

        $award = Award::findorFail($request->id);
        $award->award = $request->input('award');
        $award->description = $request->input('description');
        $award->save();

        return redirect('/award_list')->with('success', 'Award  Information Updated');
    }

    public function updateAssigned(Request $request, $id)
    {
        $this->validate($request,
            [
                'date' => 'required',
                'reason' => 'required',
            ]);

        $awardAssign = AwardAssign::find($id);
        $awardAssign->date = $request->input('date');
        $awardAssign->reason = $request->input('reason');
        $awardAssign->save();

        return redirect('/awardees_listing')->with('success', 'Awardee Information Updated');
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
        $award = Award::findorFail($request->id);
        $award->delete();

        return redirect('/award_list')->with('success', 'Award Removed Successfully');
    }

    public function doDeleteAssignAward(Request $request)
    {
        $awardAssign = AwardAssign::findorFail($request->id);
        $awardAssign->delete();

        return redirect('/awardees_listing')->with('success', 'Awardee Removed Successfully');
    }

}

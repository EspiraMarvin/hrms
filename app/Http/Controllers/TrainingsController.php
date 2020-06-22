<?php

namespace App\Http\Controllers;

use App\Employee;
use App\InviteTraining;
use App\Training;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class TrainingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addTrain()
    {
        return view('hrms.train.train_add');
    }

    public function trainList()
    {
        $trains = Training::orderBy('id', 'desc')->get();

        return view('hrms.train.train_list')->with('trains', $trains);
    }

    public function trainInvite()
    {

        $employees = Employee::all();
        $programs = Training::orderBy('id', 'desc')->get();

        return view('hrms.train.train_invite', compact('employees', 'programs'));
    }

    public function trainInviteList()
    {
        $invites = InviteTraining::orderBy('id', 'desc')->get();

        return view('hrms.train.train_invite_list')->with('invites', $invites);
    }

    public function myTrainingInvite()
    {
        $trainingInvite = InviteTraining::where('employee_id', \Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('hrms.train.my_train_invite')->with('trainingInvite', $trainingInvite);

    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'training' => 'required',
                'description' => 'required',
            ]);

        $award = new Training;
        $award->training = $request->input('training');
        $award->description = $request->input('description');
        $award->save();

        return redirect('/train_add')->with('success', 'Training Program Added');
    }

    public function storeTrainInvite(Request $request)
    {

        $totalMembers = count($request->members_id);
        $i = 0;
        try {

        foreach ($request->members_id as $member_id) {

            $check = InviteTraining::where(['training_id' => $request->training_id, 'employee_id' => $member_id])->first();
            if (!$check) {
                $invite = new InviteTraining;
                $invite->employee_id = $member_id;
                $invite->training_id = $request->input('training_id');
                $invite->description = $request->input('description');
                $invite->datefrom = $request->input('datefrom');
                $invite->dateto = $request->input('dateto');
                $invite->save();
                $i++;
            }
        }
    } catch (\Exception $e) {
        \Log::info($e->getMessage() . ' on ' . $e->getLine() . ' in ' . $e->getFile());
    }
//        \Session::flash('flash_message', $i . ' out of '. $totalMembers. ' members have been invited for the training!');


        return redirect('/train_invite')->with('success', $i . ' out of ' . $totalMembers . ' members have been invited for  training!');

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
        $training = Training::find($id);

        return view('hrms.train.train_edit', compact('training', $training));
    }

    public function editInvite($id)
    {

        $employees = Employee::all();
        $programs = Training::orderBy('id', 'desc')->get();
        $trainingInvite = InviteTraining::find($id);

        return view('hrms.train.train_invite_edit', compact('trainingInvite', $trainingInvite, 'employees', $employees, 'programs', $programs));
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
                'training' => 'required',
                'description' => 'required',
            ]);

        $training = Training::find($id);
        $training->training = $request->input('training');
        $training->description = $request->input('description');
        $training->save();

        return redirect('/train_list')->with('success', 'Training  Information Updated');
    }

    public function updateInvite(Request $request, $id)
    {
        $trainingInvite = InviteTraining::find($id);
        $trainingInvite->training_id = $request->input('training_id');
        $trainingInvite->description = $request->input('description');
        $trainingInvite->datefrom = $request->input('datefrom');
        $trainingInvite->dateto = $request->input('dateto');
        $trainingInvite->save();

        return redirect('/train_invite_list')->with('success', 'Invite Training Information Updated');
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
//        dd($request);
        $training = Training::findorFail($request->id);
        $training->delete();

        return redirect('/train_list')->with('success', 'Training Removed Successfully');
    }

    public function doDeleteInvite(Request $request)
    {
//        dd($request);
        $training = InviteTraining::findorFail($request->id);
        $training->delete();

        return redirect('/train_invite_list')->with('success', 'Training Invite Removed Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Target;
use Illuminate\Support\Facades\Auth;

class TargetsController extends Controller
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

    public function AddTar()
    {

       $users = Target::whereHas('user', function ($q) {
            $q->whereHas('supervisedBy', function ($qq){
                $qq->where('supervisor_id',Auth::user()->id);
            });
        })->with('user')->orderBy('id','desc')->get();

       $employees = User::whereHas('supervisedBy', function ($q){
           $q->where('supervisor_id',Auth::user()->id);
       })->get();

        return view('hrms.target.target_assign')->with('employees',$employees,'users',$users);
    }


    public function targetList()
    {

        $target = Target::whereHas('user', function ($q) {
            $q->whereHas('supervisedBy', function ($qq){
                $qq->where('supervisor_id',Auth::user()->id);
            });
        })->with('user')->orderBy('id','desc')->paginate(10);


        return view('hrms.target.target_assign_list')->with('target', $target);
    }

    public function showMyTarget()
    {

        $user = Auth::user();
        $user_id = $user->id;
        $targets = Target::wherehas('user', function ($q) use ($user_id) {
            $q->where('user_id', $user_id);
        })->paginate(10);


        return view('hrms.target.my_target_list')->with('targets', $targets);
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
                'user_id' => 'required',
                'targets' => 'required',
                'assigned_date' => 'required',
                'review_date' => 'required',
            ]);


        $target = new Target;
        $target->user_id = $request->input('user_id');
        $target->targets = $request->input('targets');
        $target->assigned_date = $request->input('assigned_date');
        $target->review_date = $request->input('review_date');
        $target->save();

        return redirect('/target_assign')->with('success', 'Target Added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $targetAssign = Target::find($id);

        return view('hrms.target.target_edit', compact('targetAssign', $targetAssign));
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

        $targetAssign = Target::find($id);
        $targetAssign->targets = $request->input('targets');
        $targetAssign->assigned_date = $request->input('assigned_date');
        $targetAssign->review_date = $request->input('review_date');
        $targetAssign->save();

        return redirect('/target_assign_list')->with('success', 'Target  Information Updated');
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
        $targetAssign = Target::findorFail($request->id);
        $targetAssign->delete();

        return redirect('/target_assign_list')->with('success', 'Target Removed Successfully');
    }
}

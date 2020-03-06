<?php

namespace App\Http\Controllers;

use App\AssetAssign;
use App\Employee;
use Illuminate\Http\Request;
use App\Asset;

class AssetAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function assignAsset()
    {
        $asset = Asset::all();
        $employee = Employee::all();

        return view('hrms.asset.asset_assign',compact('asset','employee'));
//        return view('hrms.asset.asset_add');
    }

    public function assetAssignList()
    {
        $asset = AssetAssign::orderBy('id','desc')->paginate(10);

        return view('hrms.asset.asset_assign_list')->with('asset',$asset);
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
                'region' => 'required',
//                'name' =>'required',
            ]);

//        dd($request);

        $assignment = new AssetAssign;
        $assignment->region = $request->input('region');
        $assignment->name = $request->input('name');
        $assignment->authority = $request->input('authority');
        $assignment->assigned_date = $request->input('assigned_date');
        $assignment->released_date = $request->input('released_date');
        $assignment->save();

        return redirect('/asset_assign')->with('success','Asset Assigned Successfully');
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
        //
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
        //
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
}

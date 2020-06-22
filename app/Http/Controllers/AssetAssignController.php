<?php

namespace App\Http\Controllers;

use App\AssetAssign;
use App\County;
use App\Employee;
use App\Region;
use Illuminate\Http\Request;
use App\Asset;
use DB;
use Illuminate\Support\Facades\Auth;

class AssetAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function assignAsset()
    {
        $asset = Asset::orderBy('id', 'desc')->get();
        $employees = Employee::all();
        $regions = DB::table('regions')->pluck("region", "id");

        return view('hrms.asset.asset_assign', compact('asset', 'employees', $employees, 'regions'));
    }

    public function getCounties($id)
    {
        $counties = DB::table("counties")->where("region_id", $id)->pluck("county", "id");
        return json_encode($counties);
    }

    public function assetAssignList()
    {
        $assets = AssetAssign::orderBy('id', 'desc')->get();

        return view('hrms.asset.asset_assign_list', compact('assets', $assets));
    }

    public function myAssets()
    {
        $user = Auth::user();
        $employee_id = $user->employee->id;
        $assets = AssetAssign::wherehas('employee', function ($q) use ($employee_id) {
            $q->where('employee_id', $employee_id);
        })->paginate(10);

        return view('hrms.asset.my_assigned_assets', compact('assets', $assets));
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
//        dd($request);
        $this->validate($request,
            [
                'region_id' => 'required',
                'county_id' => 'required',
                'asset_id' => 'required|unique:asset_assigns',
                'employee_id' => 'required',
//                'authority' => 'required',
                'assigned_date' => 'required',
                'released_date' => 'required',

            ]);

//        dd($request);

        $assignment = new AssetAssign;
        $assignment->region_id = $request->input('region_id');
        $assignment->county_id = $request->input('county_id');
        $assignment->asset_id = $request->input('asset_id');
        $assignment->employee_id = $request->input('employee_id');
        $assignment->authority = $request->input('authority');
        $assignment->assigned_date = $request->input('assigned_date');
        $assignment->released_date = $request->input('released_date');
        $assignment->save();

        return redirect('/asset_assign')->with('success', 'Asset Assigned Successfully');
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
        $assetAssign = AssetAssign::find($id);
        $employees = Employee::all();

        return view('hrms.asset.asset_assign_edit', compact('assetAssign', $assetAssign, 'employees', $employees));
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
                'employee_id' => 'required',
                'authority' => 'required',
                'assigned_date' => 'required',
                'released_date' => 'required',

            ]);

        $assetAssign = AssetAssign::find($id);
        $assetAssign->employee_id = $request->input('employee_id');
        $assetAssign->authority = $request->input('authority');
        $assetAssign->assigned_date = $request->input('assigned_date');
        $assetAssign->released_date = $request->input('released_date');

        $assetAssign->save();

        return redirect('/asset_assign_list/%7Bid%7D')->with('success', 'Asset Assignment Information Updated');
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
        $assetAssign = AssetAssign::findorFail($request->id);
        $assetAssign->delete();

        return redirect('/asset_assign_list/%7Bid%7D')->with('success', 'Asset Assigned Deleted Successfully');
    }
}

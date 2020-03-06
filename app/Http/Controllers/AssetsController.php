<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetAssign;
use App\Employee;
use Illuminate\Http\Request;

class AssetsController extends Controller
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
//        return view('hrms.asset.asset_assign')->with('asset',$asset);
    }

    public function assetAdd()
    {

        return view('hrms.asset.asset_add');
    }
    public function assetAssign()
    {

        return view('hrms.asset.asset_assign');
    }

    public function assetAssignList()
    {
        $asset = Asset::orderBy('id','desc')->paginate(10);

        return view('hrms.asset.asset_assign_list')->with('asset',$asset);
    }

    public function assetList()
    {
        $asset = Asset::orderBy('id','desc')->paginate(10);

        return view('hrms.asset.asset_list')->with('asset',$asset);
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
                'name' =>'required',
                'description'=>'required',
            ]);

        $asset = new Asset;
        $asset->name = $request->input('name');
        $asset->description = $request->input('description');
        $asset->save();

        return redirect('/asset_add')->with('success','Asset Added');

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


<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Imports\AssetsImport;
use App\Exports\AssetsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $asset = Asset::orderBy('id', 'desc')->paginate(15);

        return view('hrms.asset.asset_assign_list')->with('asset', $asset);
    }

    public function assetList()
    {
        $asset = Asset::orderBy('id', 'desc')->paginate(15);

        return view('hrms.asset.asset_list')->with('asset', $asset);
    }

    public function importAssets(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        if ($request->hasFile('import_file')){
            Excel::import(new AssetsImport, request()->file('import_file'));
            return redirect('/asset_add')->with('success', 'Assets Imported');
        }

        return redirect('/asset_add')->with('error', 'No Import File Chosen');
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
                'asset' => 'required',
                'serial_number' => 'required|unique:assets',
            ]);

        $asset = new Asset;
        $asset->asset = $request->input('asset');
        $asset->serial_number = $request->input('serial_number');
        $asset->description = $request->input('description');
        $asset->save();

        return redirect('/asset_add')->with('success', 'Asset Added');

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
        $asset = Asset::find($id);
        return view('hrms.asset.asset_edit')->with('asset', $asset);
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
        $asset = Asset::find($id);
        $asset->asset = $request->input('asset');
        $asset->serial_number = $request->input('serial_number');
        $asset->description = $request->input('description');
        $asset->save();

        return redirect('/asset_list')->with('success', 'Asset Information Updated');
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
        $asset = Asset::findorFail($request->id);
        $asset->delete();

        return redirect('/asset_list')->with('success', 'Asset Removed Successfully');
    }

    //  function to search database
    public function searchAsset()
    {
        $r = request()->input('r');

        if ($r != '') {
            $data = Asset::where('asset', 'LIKE', '%' . $r . '%')
                ->orWhere('serial_number', 'LIKE', '%' . $r . '%')
                ->orderBy('id', 'desc')
                ->paginate(10)
                ->setpath('');

            $data->appends(array(
                'r' => request()->input('r'),
            ));
            return view('hrms.asset.asset_search')->with('data', $data);
        } else {
            return redirect('/asset_list')->with('warning', 'Search Input Empty!');
        }
    }
    public function export()
    {
        return Excel::download(new AssetsExport, 'assets.xlsx');
    }


    public function printPreview()
    {
        $assets = Asset::all();

        return view('hrms.asset.printPreview')->with('assets',$assets);

    }

}


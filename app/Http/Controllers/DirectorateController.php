<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Directorate;


class DirectorateController extends Controller
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

    public function dirAdd()
    {

        return view('hrms.directorate.directorate_add');
    }


    public function dirList()
    {

        $directorate = Directorate::orderBy('id', 'desc')->paginate(10);

        return view('hrms.directorate.directorate_list')->with('directorate', $directorate);
    }


    public function index()
    {
//        $directorate = Directorate::orderBy('id','desc')->paginate(10);

//        return view('hrms.directorate.directorate_list')->with('employee',$directorate);

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
                'name' => 'required|unique:directorates',
                'description' => 'required',
            ]);

        $directorate = new Directorate;
        $directorate->name = $request->input('name');
        $directorate->description = $request->input('description');
        $directorate->save();

        return redirect('/directorate_add')->with('success', 'Directorate Added');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $directorate = Directorate::find($id);
//        return view('hrms.directorate.directorate_list')->with('directorate',$directorate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directorate = Directorate::find($id);
        return view('hrms.directorate.directorate_edit')->with('directorate', $directorate);
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
                'name' => 'required|unique:directorates',
                'description' => 'required',
            ]);

        $directorate = Directorate::find($id);
        $directorate->name = $request->input('name');
        $directorate->description = $request->input('description');
        $directorate->save();

        return redirect('/directorate_list')->with('success', 'Directorate  Information Updated');


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
        $directorate = Directorate::findorFail($request->id);
        $directorate->delete();

        return redirect('/directorate_list')->with('success', 'Directorate Removed Successfully');
    }
}

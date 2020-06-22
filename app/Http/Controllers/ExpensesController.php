<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getRegions()
    {
        $regions = DB::table('regions')->pluck("region", "id");

        return view('hrms.expense.expense_add', compact('regions', $regions));
    }

    public function getCounties($id)
    {
        $counties = DB::table("counties")->where("region_id", $id)->pluck("county", "id");
        return json_encode($counties);
    }

    public function expenseAdd()
    {

        return view('hrms.expense.expense_add');
    }

    public function expenseList()
    {

        $expense = Expense::orderBy('id', 'desc')->get();

        return view('hrms.expense.expense_list')->with('expense', $expense);
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
                'region_id' => 'required',
                'county_id' => 'required',
                'item' => 'required',
                'expense' => 'required',
                'assigned_date' => 'required',
            ]);

        $expense = new Expense;
        $expense->region_id = $request->input('region_id');
        $expense->county_id = $request->input('county_id');
        $expense->item = $request->input('item');
        $expense->expense = $request->input('expense');
        $expense->assigned_date = $request->input('assigned_date');
        $expense->save();

        return redirect('/expense_add')->with('success', 'Expense Added');
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
        $expense = Expense::find($id);
        return view('hrms.expense.expense_edit')->with('expense', $expense);
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
                'item' => 'required',
                'expense' => 'required',
                'assigned_date' => 'required',
            ]);

        $expense = Expense::find($id);
        $expense->item = $request->input('item');
        $expense->expense = $request->input('expense');
        $expense->assigned_date = $request->input('assigned_date');
        $expense->save();

        return redirect('/expense_list')->with('success', 'Expense  Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function doDelete(Request $request)
    {
        $expense = Expense::findorFail($request->id);
        $expense->delete();

        return redirect('/expense_list')->with('success', 'Expense Deleted Successfully');
    }
}

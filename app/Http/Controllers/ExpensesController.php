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

    public function expenseAdd()
    {

        return view('hrms.expense.expense_add');
    }

    public function expenseList()
    {
//        $expense = Expense::select('region,item,expense')->where('region', 'Nairobi')->value('expense')->get();

//        $expense = Expense::select('region,item,expense,assigned_date')->where('region', 'Nairobi')->paginate(10);

//        return view('hrms.expense.expense_list',compact(['expense','region','item']));

        $expense = Expense::orderBy('id','desc')->paginate(10);

        return view('hrms.expense.expense_list')->with('expense',$expense);
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
                'region' =>'required',
                'item'=>'required',
                'expense'=>'required',
                'assigned_date'=>'required',
            ]);

        $expense = new Expense;
        $expense->region = $request->input('region');
        $expense->item = $request->input('item');
        $expense->expense = $request->input('expense');
        $expense->assigned_date = $request->input('assigned_date');
        $expense->save();

        return redirect('/expense_add')->with('success','Expense Added');
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

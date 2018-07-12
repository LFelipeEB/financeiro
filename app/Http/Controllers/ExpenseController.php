<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpense;
use App\Models\Expense;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ExpenseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("expense.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpense $request)
    {
        $expense = Expense::create([
            'category_id' => $request->category_id,
            'account_id' => $request->account_id,
            'user_id' => Auth::id(),
            'value' => $request->value,
            'receipt' => $request->receipt,
            'place' => $request->place,
            'description' => $request->description,
            'date_operation' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->date),
        ]);

        Log::makeLog($expense);
        Session::flash('success', "Dados da despesa SALVO com sucesso.");

        return redirect('/expense');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->category_id = $request->category_id;
        $expense->account_id = $request->account_id;
        $expense->value = $request->value;
        $expense->receipt = $request->receipt;
        $expense->place = $request->place;
        $expense->description =  $request->description;
        $expense->date_operation =  $request->date;

        Log::makeLog($expense, $expense->getOriginal());
        Session::flash('success', "Dados da despesa EDITADO com sucesso.");

        $expense->save();

        return redirect("/expense");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        Log::makeLog($expense, $expense->getOriginal());
        Session::flash('success', "Dados da despesa DELETADO com sucesso.");

        return redirect('/expense');
    }
}

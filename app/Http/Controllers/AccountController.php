<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccount;
use App\Http\Requests\TransferStoreRequest;
use App\Models\Account;
use App\Models\Expense;
use App\Models\Log;
use App\Models\Profit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
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
        return view('account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccount $request)
    {
        $account = Account::create([
            'bank_id' => $request->bank_id,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            isset($request->operation) ? "'operation' =>  {$request->operation}": '',
            'account' => $request->account,
            'agency' => $request->agency,
        ]);

        Log::makeLog($account);
        Session::flash('success', "Conta cadastrada com Sucesso.");

        return redirect("/account");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('account.edit', compact('account'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->bank_id = $request->bank_id;
        $account->category_id = $request->category_id;
        $account->operation = $request->operation;
        $account->account = $request->account;
        $account->agency = $request->agency;
        Log::makeLog($account, $account->getOriginal());
        $account->save();

        Session::flash('success', "Dados bancarios editado com sucesso.");
        return redirect("/account");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        Log::makeLog($account, $account->getOriginal());
        Session::flash('success', "Dados bancarios DELETADO com sucesso.");
        return redirect("/account");
    }

    public function transferStore(TransferStoreRequest $request)
    {
        $from = Account::find($request->orig_account);
        $to = Account::find($request->dest_account);

        $expense = Expense::create([
            'category_id' => 29,
            'account_id' => $request->orig_account,
            'user_id' => Auth::id(),
            'value' => $request->value,
            'description' => "Transferencia de Valores entre Ag:{$from->agency} | CC:{$from->account} para Ag:{$to->agency} | CC:{$to->account}",
            'date_operation' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->date),
        ]);
        Log::makeLog($expense);

        $profit = Profit::create([
            'category_id' => 29,
            'account_id' => $request->dest_account,
            'user_id' => Auth::id(),
            'value' => $request->value,
            'receipt' => '',
            'source' => "Ag:{$from->agency} | CC:{$from->account}",
            'description' => "Transferencia de Valores entre Ag:{$from->agency} | CC:{$from->account} para Ag:{$to->agency} | CC:{$to->account}",
            'date_operation' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->date),
        ]);

        Log::makeLog($profit);
        Session::flash('success', "Transferencia de Valores cadastrada com sucesso.");
        return redirect('/');
    }

    public function transfer()
    {
        return view('account.transfer');
    }
}

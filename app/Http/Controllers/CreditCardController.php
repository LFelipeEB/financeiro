<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditCard;
use App\Models\CreditCard;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class CreditCardController extends Controller
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
        return view('creditcard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creditcard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreditCard $request)
    {
        $creditCard = CreditCard::create([
            'account_id' => $request->account_id,
            'user_id' => Auth::id(),
            'good_true' => $request->good_true,
            'printed_name' => $request->printed_name,
            'nickname' => $request->nickname,
            'number' => $request->number,
            'brand' => $request->brand,
            'limit' => $request->limit,
            'maturity' => $request->maturity,
            'closure' => $request->closure,
        ]);
        Log::makeLog($creditCard);
        Session::flash('success', "Dados do cartao de credito SALVOS com sucesso.");


        return redirect('/creditcard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreditCard  $creditCard
     * @return \Illuminate\Http\Response
     */
    public function show(CreditCard $creditCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreditCard  $creditCard
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditCard $creditCard)
    {
        return view('creditcard.edit', compact('creditCard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreditCard  $creditCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditCard $creditCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreditCard  $creditCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditCard $creditCard)
    {
        $creditCard->delete();

        Log::makeLog($creditCard, $creditCard->getOriginal());
        Session::flash('success', "Dados do cartao de credito DELETADO com sucesso.");

        return redirect('/creditcard');
    }
}

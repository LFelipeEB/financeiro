<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use App\Models\InvoceCreditCard;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InvoceCreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoce_credit_card.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoce_credit_card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($i=0; $i<$request->plots; $i++) {
            $p=$i;
            $invoce = InvoceCreditCard::create([
                'credit_card_id' => $request->credit_card_id,
                'category_id' => $request->category_id,
                'date_buy' => Carbon::createFromFormat('m/d/Y', $request->date_buy)->addMonth($i)->toDateString(),
                'place'=> $request->place,
                'plots'=> (++$p)."/".$request->plots,
                'value' => $request->value/$request->plots
            ]);
            Log::makeLog($invoce);
        }

        Session::flash('success', 'Compra no cartao de Credito SALVA com Sucesso.');
        return redirect('/invocecreditcard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CreditCard $creditCard, $month, $year)
    {
        $expenses = $creditCard->invoceCreditCard()
            ->whereMonth("date_buy", $month)
            ->whereYear('date_buy', $year)
            ->get();

        return view('invoce_credit_card.show', compact('expenses', 'month', 'year'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoceCreditCard $invoceCreditCard)
    {
        return view('invoce_credit_card.edit', compact('invoceCreditCard'));
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
    public function destroy(InvoceCreditCard $invoceCreditCard)
    {
        $invoceCreditCard->delete();
        Log::makeLog($invoceCreditCard, $invoceCreditCard->getOriginal());
        return redirect('/invocecreditcard');
    }

    public function getApiInvoces(CreditCard $creditCard, $month, $year){
        $invoce  = InvoceCreditCard::
        whereBetween('date_buy', [
            Carbon::create($year, $month-1, $creditCard->closure-1)->toDateString(),
            Carbon::create($year, $month, $creditCard->closure-1)->toDateString(),
        ])
            ->get();

        return [
            'invoce' => $invoce,
            'value' => $invoce->sum('value'),
            'credit_card' => $creditCard,
        ];
    }

    public function getApiBalanceInvoceOpened(){
        $balance=[];
        foreach (Auth::user()->creditCard as $creditCard){
            $balance = InvoceCreditCard::
            where('date_buy', '>',
                Carbon::create(date('Y'), date('m')-1,$creditCard->clousure)->toDateString()
            )->sum('value');
        }

        return $balance;
    }

}

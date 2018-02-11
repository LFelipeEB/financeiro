<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfit;
use App\Models\Profit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfitController extends Controller
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
        return view('profit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfit $request)
    {
        Profit::create([
            'category_id' => $request->category_id,
            'account_id' => $request->account_id,
            'user_id' => Auth::id(),
            'value' => $request->value,
            isset($request->receipt)? "'receipt' => $request->receipt":"",
            isset($request->source)? "'source' => $request->place":"",
            isset($request->description)? "'description' => $request->description":"",
        ]);

        return redirect('/profit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profit  $profit
     * @return \Illuminate\Http\Response
     */
    public function show(Profit $profit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profit  $profit
     * @return \Illuminate\Http\Response
     */
    public function edit(Profit $profit)
    {
        return view('profit.edit', compact('profit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profit  $profit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profit $profit)
    {
        $profit->category_id = $request->category_id;
        $profit->account_id = $request->account_id;
        $profit->value = $request->value;
        $profit->receipt = $request->receipt;
        $profit->source = $request->source;
        $profit->description = $request->description;
        $profit->save();

        return redirect("/profit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profit  $profit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profit $profit)
    {
        $profit->delete();
        return redirect('/profit');
    }
}

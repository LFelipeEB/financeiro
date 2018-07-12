<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplication;
use App\Models\Application;
use App\Models\Expense;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ApplicationController extends Controller
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
        return view('application.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplication $request)
    {
        $application = Application::create([
            'user_id' => Auth::id(),
            'value' => $request->value,
            'expected' => $request->expected,
            'type' => $request->type,
            'description' => $request->description,
        ]);
        Log::makeLog($application);

        if($request->account_id != 0) {
            $expense = Expense::create([
                'category_id' => 4,
                'account_id' => $request->account_id,
                'user_id' => Auth::id(),
                'value' => $request->value,
                'description' => $request->description,
                'date_operation' => \Carbon\Carbon::now(),
            ]);
        }
        Session::flash('success', "Dados da aplicaçao SALVO com sucesso.");

        return redirect("/application");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        return view('application.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $application->value = $request->value;
        $application->expected = $request->expected;
        $application->type = $request->type;
        $application->description = $request->description;
        Log::makeLog($application, $application->getOriginal());
        Session::flash('success', "Dados da aplicaçao EDITADOS com sucesso.");

        $application->save();
        return redirect('/application');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();
        Log::makeLog($application);
        Session::flash('success', "Dados da aplicaçao DELETADOS com sucesso.");

        return redirect('/application');
    }
}

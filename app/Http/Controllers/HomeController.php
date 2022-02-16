<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function index1()
    {
        return view('advancedpolicies');
    }
    public function index2()
    {
        return view('Cancelploicy');
    }

    public function index4()
    {
        return view('changepassword');
    }
    public function index5()
    {
        return view('register');
    }
    public function index6()
    {
        return view('resetpassword');
    }
    public function index7()
    {
        return view('doreset');
    }
    public function index8()
    {
        return view('doreset');
    }

    public function index9()
    {
        return view('print');
    }
    public function index10()
    {
        return view('loginn');
    }
    public function index11()
    {
        return view('History');
    }
    public function index12()
    {
        return view('preview');
    }
    public function index13()
    {
        return view('save');
    }
    public function index14()
    {
        return view('show');
    }
    public function index15()
    {
        return view('broker');
    }
    public function index16()
    {
        return view('previewbroker');
    }
    public function index17()
    {
        return view('savebroker');
    }
    public function index18()
    {
        return view('brokerexport');
    }
    public function index19()
    {
        return view('pending');
    }
    public function index20()
    {
        return view('Approve');
    }
    public function index21()
    {
        return view('pendingUser');
    }
    public function index22()
    {
        return view('Upadtebroker');
    }
    public function index23()
    {
        return view('Review');
    }
    public function index24()
    {
        return view('UpdatePolicy');
    }
    public function index25()
    {
        return view('EmployeePrint');
    }
    public function index26()
    {
        return view('HistoryPrint');
    }
    public function index27()
    {
        return view('AllPolicies');
    }
    public function index28()
    {
        return view('download');
    }
    public function index29()
    {
        return view('Flag');
    }


}

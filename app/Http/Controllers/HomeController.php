<?php

namespace App\Http\Controllers;
use App\Car;
use DB;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Car::all();
        $count = DB::table('cars')->count();
        return view('pages.dashboard', compact('cars', 'count'));
    }
}

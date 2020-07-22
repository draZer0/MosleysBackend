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
        $cars = Car::all();
        $users = DB::table('users')->get();

        // Dashboard variables
        $cars_count = DB::table('cars')->count();
        $users_count = DB::table('users')->count();

        return view('pages.dashboard', compact('cars', 'users', 'cars_count', 'users_count'));
    }
}

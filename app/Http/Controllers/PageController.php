<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use DB;

class PageController extends Controller
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
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {

        if (view()->exists("pages.{$page}")) {
            $cars = Car::all();
            $users = DB::table('users')->get();
            $cars_count = DB::table('cars')->count();
            $cars_sum = DB::table('cars')->sum('prijs');
            $users_count = DB::table('users')->count();
            $users_with_role = DB::table('users')->where('role','=','employee')->orWhere('role','=','admin')->count();

            return view("pages.{$page}", compact('cars', 'users', 'cars_count', 'users_count', 'users_with_role', 'cars_sum'));
        }

        return abort(404);
    }
}

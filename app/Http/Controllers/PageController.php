<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

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
            return view("pages.{$page}", compact('cars'));
        }

        return abort(404);
    }
}

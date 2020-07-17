<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cars;

class CarsController extends Controller
{
    //
    public function index(){
      return Cars::get()->all();
    }
}

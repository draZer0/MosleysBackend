<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        $cars_sum = DB::table('cars')->sum('prijs');
        $users_count = DB::table('users')->count();
        $users_with_role = DB::table('users')->where('role','=','admin')->count();

        return view('pages.dashboard', compact('cars', 'users', 'cars_count', 'users_count', 'users_with_role', 'cars_sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'merk'=>'required',
        'type'=>'required',
        'prijs'=>'required'
      ]);

      $cars = new Car([
        'merk' => $request->get('merk'),
        'type' => $request->get('type'),
        'prijs' => $request->get('prijs'),
        'bouwjaar' => $request->get('bouwjaar'),
        'categorie' => $request->get('categorie'),
        'transmissie' => $request->get('transmissie'),
        'brandstof' => $request->get('brandstof'),
        'kmstand' => $request->get('kmstand'),
        'foto' => $request->get('foto')
      ]);

      $cars->save();
      return redirect('/home')->with('success', 'Auto toegevoegd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cars = Car::find($id);
        return view('pages.edit', compact('cars'));
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
        $request->validate([
            'merk'=>'required',
            'type'=>'required',
            'prijs'=>'required'
        ]);

        $cars = Car::find($id);
        $cars->merk =  $request->get('merk');
        $cars->type = $request->get('type');
        $cars->prijs = $request->get('prijs');
        $cars->bouwjaar = $request->get('bouwjaar');
        $cars->categorie = $request->get('categorie');
        $cars->transmissie = $request->get('transmissie');
        $cars->brandstof = $request->get('brandstof');
        $cars->kmstand = $request->get('kmstand');
        $cars->foto = $request->get('foto');
        $cars->save();

        return redirect('/home')->with('success', 'Auto bewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cars = Car::find($id);
        $cars->delete();
        return redirect('/home')->with('success', 'Auto verwijderd!');
    }
}

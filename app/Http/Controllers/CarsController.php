<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarsController extends Controller
{

    public function api(){
      return Car::get()->all();
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
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cars.create');
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
      return redirect('/cars')->with('success', 'Car saved!');
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
        return view('cars.edit', compact('cars'));
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

        return redirect('/cars')->with('success', 'Auto updated!');
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
        return redirect('/cars')->with('success', 'Auto verwijderd!');
    }
}

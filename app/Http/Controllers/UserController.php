<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Car;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function edit($id)
    {
        //
        $users = User::find($id);
        return view('users.edit', compact('users'));
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=>'required',
            'role'=>'required'
        ]);

        $users = User::find($id);
        $users->name =  $request->get('name');
        $users->role = $request->get('role');
        $users->save();

        return redirect('/user')->with('success', 'User bewerkt!');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/user')->with('success', 'Gebruiker verwijderd!');
    }

}

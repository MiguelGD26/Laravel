<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=$request->input('texto');
        $registros= User::where('name','like','%'.$texto.'%')->paginate(2);
        return view('user.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registro = new User();
        $registro -> name= $request->input('name');
        $registro ->email=$request->input('email');
        $registro ->password=bcrypt($request->input('password'));
        $registro ->save();
        return redirect()->route('users.index')->with('mensaje', 'Usuario actualizado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $registro = User::findOrFail($id);
        return view('user.edit',compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registro = User::findOrFail($id);
        $registro->name= $request->input('name');
        $registro->email=$request->input('email');
        $registro ->password=bcrypt($request->input('password'));
        $registro->save();
        return redirect()->route('users.index')->with('mensaje', 'Usuario actualizado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = User::findOrFail($id);
        $registro->delete();
        return redirect()->route('users.index')
        ->with('mensaje','Eliminado satisfactoriamente');

    }
}

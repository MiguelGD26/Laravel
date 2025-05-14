<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facade\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        //FormReques, Validator, Validate
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $credenciales=$request->only('email','password');

        if(Auth::attempt($credenciales)){
            $user = Auth::user();
            return redirect()->route('categorias.index');
        }
        return back()->with('error', 'Usted no tiene acceso.');
    }
}

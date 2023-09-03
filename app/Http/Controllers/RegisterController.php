<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request);
        //Modificar el request y no permitir espacios en username
        $request->request->add(['username'=> Str::slug($request->username)]);
        //Validación del Formulario

        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>$request->password

        ]);

        //Autenticar el usuario una vez se registre
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //Otra forma de hacer el auth del usuario
        auth()->attempt($request->only('email', 'password'));

        //Redireccionar a una URL
        return redirect()->route('post.index');

    }
}

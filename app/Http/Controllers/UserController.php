<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    public function create() {

        return view('users.create');

    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email','unique:users,email'],
            'password' => ['required', 'min:6']
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email no es valido',
            'email.unique' => 'El email ingresado ya existe en el sistema',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'El campo password debe contener un minimo de 6 caracteres'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
                     ]);

        return redirect('usuarios');
    }

}

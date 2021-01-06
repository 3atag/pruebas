<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
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

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $data = request()->validate(
            [
                'name' => 'required',
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'min:6'],
                'bio' => '',
                'cellphone' => 'required'
            ],
            [
                'name.required' => 'El campo nombre es obligatorio',
                'email.required' => 'El campo email es obligatorio',
                'email.email' => 'El campo email no es valido',
                'email.unique' => 'El email ingresado ya existe en el sistema',
                'password.required' => 'El campo password es obligatorio',
                'password.min' => 'El campo password debe contener un mínimo de 6 caracteres',
                'cellphone.required' => 'Debe ingresar un teléfono celular para agregar el profesional'
            ]
        );

        User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]
        );

        UserProfile::create(
            [
                'bio' => $data['bio'],
                'cellphone' => $data['cellphone'],
                ''
            ]
        );


        return redirect('usuarios');
    }

}

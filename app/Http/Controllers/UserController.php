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
        $data = request()->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
                     ]);

        return redirect('usuarios');
    }

}

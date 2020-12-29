<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Juan Pintos',
            'email'=>'antesdeldomingo@gmail.com',
            'rol_id'=>1,
            'password'=>Hash::make('juan1981_')
        ]);

        User::create([
            'name'=>'Diaz Gabriela',
            'email'=>'gabyaeof77@hotmail.com',
            'rol_id'=>2,
            'password'=>Hash::make('gabyaeof')
        ]);
    }
}

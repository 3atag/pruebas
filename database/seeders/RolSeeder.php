<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('rols')->insert([
           'description' => 'Admin'
        ]);

        DB::table('rols')->insert([
            'description' => 'Invited'
        ]);

    }
}

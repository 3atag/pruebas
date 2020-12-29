<?php

namespace Tests\Feature;

use App\Models\Rol;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RolModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function muestra_mensaje_si_no_existen_roles()
    {

//        Rol::create([
//            'description' => 'Admin'
//        ]);
//
//        Rol::create([
//            'description' => 'Invited'
//        ]);

        $response = $this->get('/roles');

        $response->assertStatus(200)
            ->assertSee('No hay Roles registrados.');

    }
}

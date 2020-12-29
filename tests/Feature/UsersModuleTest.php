<?php

namespace Tests\Feature;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    function carga_lista_usuarios()
    {

        Rol::create([
            'description' => 'Admin'
        ]);

        Rol::create([
            'description' => 'Invited'
        ]);


        User::create([
            'name' => 'Juan Pintos',
            'email' => 'antesdeldomingo@gmail.com',
            'password' => Hash::make('juan1981_'),
            'rol_id' => 1
        ]);

        User::create([
            'name' => 'Gabriela Diaz',
            'email' => 'gabyaeof@hotmail.com',
            'password' => Hash::make('123456'),
            'rol_id' => 2
        ]);


        $response = $this->get('/usuarios');

        $response->assertStatus(200)
            ->assertSee('Juan');
    }

    /** @test */

    function muestra_mensaje_si_no_existen_usuarios()
    {
        $response = $this->get('/usuarios');

        $response->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }

//    /** @test */
//
//    function muestra_detalle_usuario()
//    {
//
//        $user = User::create([
//            'name' => 'Juan Pintos',
//            'email' => 'antesdeldomingo@gmail.com',
//            'password' => Hash::make('juan1981_')
//        ]);
//
//
//        $response = $this->get('/usuarios/' . $user->id);
//
//        $response->assertStatus(200);
//
//    }

    /** @test */

    function muestra_error_404_si_no_existe_usuario()
    {
        $response = $this->get('/usuarios/999');

        $response->assertStatus(404);

    }

    /** @test */

    function crear_nuevo_usuario()
    {
        $response = $this->post('/usuarios/', [
            'name' => 'Jorge Perez',
            'email' => 'admin@admin.com.ar',
            'rol_id' => 2
        ]);

        $response->assertStatus(404);

    }
}

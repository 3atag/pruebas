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
        Rol::create(
            [
                'description' => 'Admin'
            ]
        );

        Rol::create(
            [
                'description' => 'Invited'
            ]
        );


        User::create(
            [
                'name' => 'Juan Pintos',
                'email' => 'antesdeldomingo@gmail.com',
                'password' => Hash::make('juan1981_'),
                'rol_id' => 1
            ]
        );

        User::create(
            [
                'name' => 'Gabriela Diaz',
                'email' => 'gabyaeof@hotmail.com',
                'password' => Hash::make('123456'),
                'rol_id' => 2
            ]
        );

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

        $this->withoutExceptionHandling();

        $this->post(
            '/usuarios/',
            [
                'name' => 'Jorge Perez',
                'email' => 'admin@admin.com.ar',
                'password' => '123456',
                'bio' => 'Medico Clinico',
                'cellphone' => '2983559992'
            ]
        )->assertRedirect('usuarios');

        $this->assertCredentials(
            [
                'name' => 'Jorge Perez',
                'email' => 'admin@admin.com.ar',
                'password' => '123456'
            ]
        );

        $this->assertDatabaseHas('user_profiles', [
            'user_id' => User::first()->id,
            'bio' => 'Medico Clinico',
            'cellphone' => '2983559992'
        ]);
    }

    /** @test */
    function el_campo_name_es_obligatorio()
    {
        $this->from('usuarios/nuevo')
            ->post(
                '/usuarios/',
                [
                    'name' => '',
                    'email' => 'admin@admin.com.ar',
                    'password' => '12345'
                ]
            )->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(
                [
                    'name' => 'El campo nombre es obligatorio'
                ]
            );

        $this->assertDatabaseMissing(
            'users',
            [
                'email' => 'admin@admin.com.ar'
            ]
        );
    }

    /** @test */
    function el_campo_email_es_obligatorio()
    {
        $this->from('usuarios/nuevo')
            ->post(
                '/usuarios/',
                [
                    'name' => 'Jorge Perez',
                    'email' => '',
                    'password' => '12345'
                ]
            )->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email']);

        $this->assertEquals(0, User::count());
    }

    /** @test */
    function el_campo_email_no_es_valido()
    {
        $this->from('usuarios/nuevo')
            ->post(
                '/usuarios/',
                [
                    'name' => 'Jorge Perez',
                    'email' => 'correo-no-valido',
                    'password' => '12345'
                ]
            )->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email']);

        $this->assertEquals(0, User::count());
    }

    /** @test */
    function el_campo_email_debe_ser_unico()
    {
//        $this->withoutExceptionHandling();

        User::factory()->create(
            [
                'email' => 'jorge@perez.com.ar'
            ]
        );

        $this->from('usuarios/nuevo')
            ->post(
                '/usuarios/',
                [
                    'name' => 'Jorge Perez',
                    'email' => 'jorge@perez.com.ar',
                    'password' => '12345'
                ]
            )->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email']);

        $this->assertEquals(1, User::count());
    }

    /** @test */
    function el_campo_password_es_obligatorio()
    {
        $this->from('usuarios/nuevo')
            ->post(
                '/usuarios/',
                [
                    'name' => 'Jorge Perez',
                    'email' => 'jorge@perez.com.ar',
                    'password' => ''
                ]
            )->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['password']);

        $this->assertEquals(0, User::count());
    }

    /** @test */
    function el_campo_password_debe_tene_al_menos_6_caracteres()
    {
        $this->from('usuarios/nuevo')
            ->post(
                '/usuarios/',
                [
                    'name' => 'Jorge Perez',
                    'email' => 'jorge@perez.com.ar',
                    'password' => '123'
                ]
            )->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['password']);

        $this->assertEquals(0, User::count());
    }


}

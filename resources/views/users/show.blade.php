@extends('layout')

@section('contenido')
    <div class="row">
        <div class="col">

            <h3>Perfil de {{ $user->name }}</h3>

            <dl>
                <dt>email</dt>
                <dd>{{ $user->email }}</dd>

                <dt>Rol</dt>
                <dd>{{ $user->rol->description }}</dd>

            </dl>

            <a href="{{ route('users.index') }}" type="button">Volver</a>

        </div>
    </div>
@endsection

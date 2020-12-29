@extends('layout')

@section('contenido')
    <div class="row">
        <div class="col">

            <h3>Usuarios</h3>

            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('users.create') }}">
                    <button class="btn btn-primary">Nuevo</button>
                </a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->rol->description }}</td>
                        <td><a type="button" href="{{ route('users.show', $user) }}">Ver</a></td>
                        @empty
                            <li>No hay usuarios registrados.</li>

                    </tr>
                @endforelse


                </tbody>
            </table>

        </div>
    </div>
@endsection

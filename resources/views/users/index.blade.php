@extends('layout')

@section('contenido')
    <div class="row mt-3">
        <div class="col">

            <div class="d-flex justify-content-between align-items-end mb-3">
                <h5>Usuarios</h5>
                <p>
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Nuevo</a>
                </p>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>

                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

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

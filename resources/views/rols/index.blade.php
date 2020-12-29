@extends('layout')

@section('contenido')
    <div class="row">
        <div class="col">

            <h3>Roles</h3>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>

                @forelse ($rols as $rol)
                    <tr>
                        <th scope="row">{{ $rol->id }}</th>
                        <td>{{ $rol->description }}</td>
                        @empty
                            <li>No hay Roles registrados.</li>
                    </tr>
                @endforelse


                </tbody>
            </table>

        </div>
    </div>
@endsection

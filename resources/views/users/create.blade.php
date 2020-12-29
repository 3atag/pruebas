@extends('layout')

@section('contenido')
    <div class="row">
        <div class="col">

            <h3>Nuevo usuario</h3>

            <form method="POST" action="{{ route('users.store') }}">
                <div class="mb-3">
                    <label for="userName" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="userName">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>


                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

            <a href="{{ route('users.index') }}" type="button">Volver</a>

        </div>
    </div>
@endsection

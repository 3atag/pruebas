@extends('layout')

@section('contenido')
    <div class="row">
        <div class="col">

            <h3>Nuevo usuario</h3>

            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <p class="alert alert-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif


                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <p class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pssword" name="password">
                    @if ($errors->has('password'))
                        <p class="alert alert-danger">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

            <a href="{{ route('users.index') }}" type="button">Volver</a>

        </div>
    </div>
@endsection

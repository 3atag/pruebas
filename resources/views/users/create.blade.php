@extends('layout')

@section('contenido')
    <div class="row mt-3">
        <div class="col-sm-8">

            <div class="card">
                <div class="card-header">
                    <h5>Nuevo usuario</h5>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h6>Por favor corrige los errores debajo:</h6>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('users.store') }}">

                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pssword" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea type="text" class="form-control" id="bio" name="bio">
                        {{ old('bio') }}
                    </textarea>

                            <div class="mb-3">
                                <label for="phonecellcellphone" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="cellphone" name="cellphone"
                                       value="{{ old('cellphone') }}">

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Crear usuario</button>
                        <a href="{{ route('users.index') }}" class="btn btn-link btn-sm">Regresar al listado de usuarios</a>
                    </form>


                </div>
            </div>


        </div>
    </div>
@endsection

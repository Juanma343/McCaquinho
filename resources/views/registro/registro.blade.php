@extends('layouts.header')
@section('contenido')

@if (session('success'))
    <div class="alert alert-success text-center my-3 m-3" role="alert">
        <h4>{{session('success')}}</h4>
    </div>
    @endif

    @error('title')
    <div class="alert alert-danger text-center my-3 m-3" role="alert">
        <h4>{{$message}}</h4>
    </div>
    @enderror

<div class="container col-sm-4 mt-5 mb-3">
    <div class="border rounded pt-4 px-5 pb-3 shadow">
        <h1 class="text-center mb-3">Usuarios</h1>

        <form action="{{route('registro')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" minlength="5" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" minlength="8" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label class="form-label">¿Va a ser consultor?</label>
                <ul>
                    <input type="radio" name="es_consultor" value=1 checked>
                    <label  class="form-label">Si</label>
                <ul>

                </ul>
                    <input type="radio" name="es_consultor" value=0 checked>
                    <label  class="form-label">No</label>
                </ul>
            </div>

            <button type="submit" class="btn btn-success">Aceptar</button>
        </form>
    
    </div>
</div>

@endsection
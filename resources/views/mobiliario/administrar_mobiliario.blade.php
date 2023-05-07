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


    <div class="border rounded p-5 shadow">
        <h1 class="text-center mb-3">Gestionar mesas</h1>

        <form action="{{route('modificar')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">¿Que quieres cambiar?</label>
                <ul>
                    <input type="radio" name="Columna" value=1 checked>
                    <label  class="form-label"><span class="fw-bold">Mesas para clientes</span></label>
                    <ul>
                        
                    </ul>
                    <input type="radio" name="Columna" value=2 checked>
                    <label  class="form-label"><span class="fw-bold">Mesas totales</span> (Restaurante + almacén)</label>
                </ul>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Nuevo número de mesas</label>
                <input type="number" class="form-control" name="numero" min="1" required>
            </div>

            <button type="submit" class="btn btn-success">Aceptar</button>
        </form>
    </div>
</div>
@endsection
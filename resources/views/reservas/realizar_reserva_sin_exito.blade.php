@extends('layouts.header')
@section('contenido')
<div class="container col-sm-6 mt-5 mb-3">
    <div class="border rounded p-5 shadow">

    <h1 class="text-center mb-3">Realiza tu reserva</h1>

        <div class="alert alert-danger text-center" role="alert">
            <p>Reserva NO realizada</p>
            <p>El número de mesas que has solicitado no está disponible</p>
        </div>
    </div>
</div>
@endsection
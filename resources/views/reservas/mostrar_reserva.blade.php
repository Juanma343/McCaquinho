@extends('layouts.header')
@section('contenido')
<div class="container col-sm-6 mt-3 mb-5">
    <div class="border rounded pt-4 px-5 pb-3 shadow">
            
        <h1 class="text-center mt-4">Reserva </h1>

        <div class='container mb-3'>
                 <div class='row'>
                     <div class='col-12'>
                         <div class='card'>
                             <div class='card-body'>
                                <p class='card-text fw-bold'>Nombre del cliente:   {{$reserva->nombre}}  </p>
                                <p class='card-text fw-bold'>Teléfono del cliente:   {{$reserva->telefono}}  </p>
                                <p class='card-text'>Fecha y hora de la reserva: {{$reserva->timestamp}}  </h6>
                                <p class='card-text'>Número de comensales: {{$reserva->num_comensales}}  </p>
                                <p class='card-text'>Número de mesas: {{$reserva->mesas}}  </p>
                                <p class='card-title'>Id de la reserva: {{$reserva->id}}  </p>
                                <p class='card-text'>Observaciones: {{$reserva->observaciones}} </p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

    </div>
</div>

@endsection
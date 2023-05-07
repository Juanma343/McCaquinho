@extends('layouts.header')
@section('contenido')
<div class="container col-sm-6 mt-3 mb-5">
    <div class="border rounded pt-4 px-5 pb-3 shadow">
            
        <h1 class="text-center mt-4 mb-4" style='color:green'>Reserva </h1>

        <div class='container mb-3'>
                 <div class='row'>
                     <div class='col-12'>
                         <div class='card'>
                             <div class='card-body' >
                                <p class='card-text fw-bold'>Nombre y Apellidos del cliente:   {{$reserva->nombre}}  </p>
                                <p class='card-text fw-bold'>Teléfono del cliente:   {{$reserva->telefono}}  </p>
                                <p class='card-text'>Fecha y hora de la reserva: {{$reserva->timestamp}}  </h6>
                                <p class='card-text'>Número de comensales: {{$reserva->num_comensales}}  </p>
                                <p class='card-text'>Número de mesas: {{$reserva->mesas}}  </p>
                                <p class='card-title fw-bold'>Id de la reserva: {{$reserva->id}}  </p>
                                <p class='card-text'>Observaciones: {{$reserva->observaciones}} </p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

    </div>
</div>

@endsection
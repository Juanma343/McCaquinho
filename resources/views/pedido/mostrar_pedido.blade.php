@extends('layouts.header')
@section('contenido')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Iconos de Boostrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- CSS propio -->
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Carta</title>
</head>
<body>
<h1 class="text-center mt-4 mb-4" style='color:green'>Lista de pedidos </h1>

@foreach($pedidos as $pedido)
 <div class='container mb-3'>
         <div class='row'>
             <div class='col-12'>
                 <div class='card'>
                     <div class='card-body'>
                        <p class='card-text fw-bold'>Id del pedido:   {{$pedido->id}}  </p>
                        <p class='card-text'>Fecha:   {{$pedido->timestamp}}  </p>
                        <p class='card-text'>Nombre del cliente: {{$pedido->nombre}}  </p>
                        @if( $pedido->direccion == null) 
                            <p> Recoger en restaurante</p>
                        @endif
                        @if( $pedido->direccion != null) 
                            <p> Dirección del cliente: {{$pedido->direccion}}</p>
                        @endif
                        <p class='card-text fw-bold'>Telefono del cliente: {{$pedido->telefono}}  </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endforeach


</div>
</div>


@endsection
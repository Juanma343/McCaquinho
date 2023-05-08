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

<div class="container mt-5">

    <div class="row align-items-start">

        <div class="col-s-12 col-md-8">

            <h1>Finaliza tu compra</h1>
            
            <form method="POST" action="{{route('guardar')}}">
                {{csrf_field()}}
            
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="txtNombre" id="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="txtDireccion" id="direccion">
                    <div id="emailHelp" class="form-text">Deja este campo vacío en caso de querer recogerlo en nuestro restaurante</div>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Número de teléfono</label>
                    <input type="tel" class="form-control" name="intTelefono" id="telefono" pattern="[0-9]{9}" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="aceptacion" required>
                    <label class="form-check-label" for="exampleCheck1">Acepto la Política de Privacidad</label>
                </div>
                
                <input type="hidden" name="realizarpedido" ></input>
                <input type="hidden" name="realizarlineapedido" ></input>
                
                <!-- Si el carrito esta vacio, no dejamos hacer el pedido -->
                @if (count($platos) < 1) 
                    <button type="submit" class="btn btn-success" disabled>Realizar pedido</button>
                @endif

                @if (count($platos) >= 1)
			        <button type="submit" class="btn btn-success">Realizar pedido</button>                
                @endif

            </form>
            
        </div>

        <div class="col-s-12 col-md-4 mb-70">

            <h1 class="border-bottom mb-1 pb-2">Tu pedido</h1>
            
                @if(count($platos)==0)
                    <p>No hay platos en el carrito</p>
                @endif
                @if(count($platos)!=0)

                    @php
                        $contador = 0;
                    @endphp

                    @foreach($platos as $plato)

                        <div class="p-3 mb-2 border-bottom">
                    
                            <div class="d-flex flex-row justify-content-between align-items-center mb-2">
                                <img src=" {{$plato->url_foto}} " height="50px" alt="...">
                                <h4 class="ml-2"> {{$plato->nombre}} </h4>
                            </div>


                            <div class="d-flex justify-content-between">
									
                                <p> {{$plato->precio}} €</p>

                                <div class="d-flex align-items-center">
                                
                                    <form action="{{route('sumarCantidad')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$plato->id}}"></input>
                                        <button type="submit" class="btn btn-primary btn-sm m-2" value="submit"><i class="bi bi-plus"></i></button>
                                    </form>

                                    {{ $cantidades[$contador] }}

                                    <form action="{{route('restarCantidad')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$plato->id}}"></input>
                                        <button type="submit" class="btn btn-danger btn-sm m-2" value="submit"><i class="bi bi-dash-lg"></i></button>
                                    </form>

                                </div>	

							</div>
		
                        </div>

                        @php
                            $contador = $contador + 1;
                        @endphp

                    @endforeach
                        
                @endif
                        
                <div class="d-flex flex-row justify-content-between border rounded p-2 mb-2">
                    <h4>Total</h4>

                    <h4>
                        
                        @php

                            $total = 0;
                            
                            if (count($platos) > 0) {
                                
                                $contador = 0;

                                foreach($platos as $plato) {

                                    $total = $total + $plato->precio * $cantidades[$contador];
                                    $contador = $contador + 1;       

                                }
                            }
                            
                        @endphp

                        {{$total}} €

                    </h4>

                </div>
							
            <a href="/">Volver a la carta y seguir comprando</a>

        </div>

    </div>

</div>

    
	<!-- Boostrap JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
@endsection
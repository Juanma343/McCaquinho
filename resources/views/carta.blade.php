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

    <div class="container text-center mt-3 mb-5">
    
        <div class="row align-items-stretch">

            @foreach($platos as $plato)
                <div class="col-s-12 col-md-3 mb-3">
        
                    <div class="border rounded p-3 shadow h-100 d-flex flex-column justify-content-between">
                            
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{$plato->url_foto}}" class="img-fluid" alt="descripcion">
                            <h4 class="mt-2">{{$plato->nombre}}</h4>
                            <p>{{$plato->descripcion}}</p>
                        </div>
        
                        <div class="d-flex justify-content-between">

                            <p class='fw-bold'>{{$plato->precio}} €</p>
                            
                            @if ($is_login == true && $es_consultor == false)
                                <form action="{{route('eliminar_plato')}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="id" value="{{$plato->id}}"></input>
                                    <button class="btn btn-danger" type="submit" value="Añadir"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                            @endif

                            @if ($is_login == false)
                                <form action="{{route('guardar_en_sesion')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$plato->id}}"></input>
                                    <button class="btn btn-primary" type="submit" value="Añadir">Añadir</button>
                                </form>
                            @endif

                            
                        </div>
        
                    </div>
        
                </div>
            @endforeach

        </div>
    
    </div>

@endsection
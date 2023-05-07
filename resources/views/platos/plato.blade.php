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

        <h2 class='text-center'>Crear nuevo plato</h2>

        
        <br>
        <form action="{{route('guardarPlato')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class='mb-3'>
                    <label class='form-label'>Nombre</label>
                    <input type='text' class='form-control' name='Nombre_plato' minlength='4' maxlength='25' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Precio</label>
                <input type='number' class='form-control' name='Precio' min='0' required>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Descripción</label>
                <input type='text' class='form-control' name='Descripcion' minlength='4' maxlength='25' required>
            </div>
            <div class='mb-3'>
                <input type='file' name='foto'/>
            </div>
            <input type='hidden' name='id'>
            <button type='submit' class='btn btn-success'>Aceptar</button>
        </form>
            
           

        </div>
    </div>
@endsection
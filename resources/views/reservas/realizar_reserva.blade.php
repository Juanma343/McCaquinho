@extends('layouts.header')
@section('contenido')
<div class="container col-sm-4 mt-3 mb-5">
    <div class="border rounded pt-4 px-5 pb-3 shadow">
            
    <h1 class="text-center mt-4 mb-4" style='color:green'>Realiza tu reserva </h1>

            <form action="{{route('guardar')}}" method = "post">
                {{csrf_field()}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre y Apellidos</label>
                    <input type="text" class="form-control" name="nombre" minlength="5" maxlength="25" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Número de teléfono</label>
					<input type="tel" class="form-control" name="telefono" id="telefono" pattern="[0-9]{9}" required>
                </div>

                <div class="mb-3">
                    <label for="comensales" class="form-label">Número de comensales</label>
                    <input type="number" class="form-control" name="num_comensales" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Fecha</label>
                    <input type="datetime-local" name="fecha" step="3600" required></input>
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea class="form-control" name="observaciones" rows="4" maxlength="150"></textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="aceptacion" required>
                    <label class="form-check-label">Acepto la Política de Privacidad</label>
                </div>

                <button type="submit" value="Enviar" class="btn btn-outline-success">Reservar</button>

            </form>

        </div>
	</div>


@endsection
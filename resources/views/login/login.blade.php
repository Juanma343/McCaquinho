<div class="container col-sm-4 mt-5 mb-3">
    <div class="border rounded p-5 shadow">
        <h1 class="text-center mb-3">Iniciar sesión</h1>
        <form action="{{route('login')}}" method="post">
        {{csrf_field()}}
            <div class="mb-3">
                <label for="telefono" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="comensales" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" required>
            </div>

            <button type="submit" name="submit" value="submit" class="btn btn-success">Acceder</button>
        </form>
        <br>
    </div>
</div>
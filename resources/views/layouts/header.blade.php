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

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid">

            <a class="navbar-brand" href="index.php">McCaquinho</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="carta.php">Carta</a>
                    </li>


                     <li class="nav-item">
                        <a class="nav-link active" href="reservas.php">Reservas</a>
                    </li>
                                     
                    <li class="nav-item dropdown">
    
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administración del restaurante
                        </a>
        
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="platosAdministrador.php">Crear plato</a></li>
                            <li><a class="dropdown-item" href="mesasAdministrador.php">Gestionar mesas</a></li>
                            <li><a class="dropdown-item" href="usuariosAdministrador.php">Crear usuarios</a></li>
                        </ul>
    
                    </li>

            
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="nosotros.php">Nuestra historia</a>
                    </li>
            
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pedidosConsultor.php">Lista de pedidos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="reservasConsultor.php">Reservas de clientes</a>
                    </li>

                </ul>
                
                <a class="btn btn-danger ms-3" href="login.php">Cerrar sesión <i class="bi bi-door-closed"></i></a>
                <a class="btn btn-primary" href="pedidos.php">Mi pedido <i class="bi bi-cart"></i></a>

            </div>

        </div>

    </nav>

    @yield('contenido')

    <footer class="p-3 border-top bg-secondary-subtle">
        &copy; Restaurante 
        <i class="bi bi-whatsapp"></i> 
        <i class="bi bi-facebook"></i>
    </footer>

	<!-- Boostrap JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
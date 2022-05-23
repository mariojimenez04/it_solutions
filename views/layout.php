<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/build/css/bootstrap.css">
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <?php 
        $enlaces = $_SERVER['REQUEST_URI'] === '/it_solutions/public/' 
    ?>

    <?php if( !$enlaces ) :  ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-4">
            <div class="container-fluid">
                <h2 class="me-5">
                    <a class="navbar-brand" href="/admin/index">IT Office Solutions</a>
                </h2>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/admin/product/index">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/shipments/index">Embarques</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/user/register">Registrar nuevo usuario</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/user/password/index">Editar perfiles</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/admin/processors/index">Procesadores</a>
                        </li>
                            
                    </ul>
                    <?php if( $_SESSION['nombre'] ?? null ): ?>
                        <li class="nav-item dropdown me-2">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo s($_SESSION['nombre']); ?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/admin/index">Inicio</a></li>
                                <li><a class="dropdown-item" href="/admin/user/edit">Editar perfil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>
                            </ul>

                        </li>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <div class="container-fluid">
        <?php echo $contenido; ?>   
    </div>

    <script src="/build/js/bootstrap.bundle.js"></script>
    
</body>
</html>
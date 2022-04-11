<?php 

    require_once __DIR__ . '/../includes/app.php';

    use Controllers\AdministracionController;
use Controllers\ExcelController;
use Controllers\ProductController;
    use Controllers\ShipmentsController;
    use Controllers\UsuarioController;
    use MVC\Router;

    $router = new Router();

    $router->get('/', [UsuarioController::class, 'login']);
    $router->post('/', [UsuarioController::class, 'login']);
    //Panel Administracion
    $router->get('/admin/index', [AdministracionController::class, 'index']);

    //USUARIOS - Registro
    $router->get('/admin/user/register', [UsuarioController::class, 'register']);
    $router->post('/admin/user/register', [UsuarioController::class, 'register']);

    //USUARIOS - index
    $router->get('/admin/user/password/index', [UsuarioController::class, 'passwordIndex']);
    $router->post('/admin/user/password/index', [UsuarioController::class, 'passwordIndex']);

    //USUARIOS - Editar usuarios
    $router->get('/admin/user/edit', [UsuarioController::class, 'edit']);
    $router->post('/admin/user/edit', [UsuarioController::class, 'edit']);

    //USUARIOS - Editar contraseñas
    $router->get('/admin/user/password/edit', [UsuarioController::class, 'passwordEdit']);    
    $router->post('/admin/user/password/edit', [UsuarioController::class, 'passwordEdit']);    

    //USUARIOS - Confirmar usuario
    $router->get('/admin/confirm/user', [UsuarioController::class, 'confirm']);

    //USUARIOS - Cerrar sesion
    $router->get('/logout', [UsuarioController::class, 'logout']);

    /**   Panel de Registros   **/
    //Shipments
    $router->get('/admin/shipments/index', [ShipmentsController::class, 'index']);

    $router->get('/admin/shipments/create', [ShipmentsController::class, 'create']);
    $router->post('/admin/shipments/create', [ShipmentsController::class, 'create']);

    $router->get('/admin/shipments/update', [ShipmentsController::class, 'update']);
    $router->post('/admin/shipments/update', [ShipmentsController::class, 'update']);

    $router->get('/admin/shipments/detalles', [ShipmentsController::class, 'detalles']);
    $router->post('/admin/shipments/detalles', [ShipmentsController::class, 'detalles']);

    $router->post('/admin/shipments/delete', [ShipmentsController::class, 'delete']);

    $router->get('/admin/shipments/create-laptop', [ShipmentsController::class, 'createLaptop']);
    $router->post('/admin/shipments/create-laptop', [ShipmentsController::class, 'createLaptop']);

    //Buscadores - Shipments
    $router->get('/admin/shipments/search/id', [ShipmentsController::class, 'search']);
    $router->post('/admin/shipments/search/id', [ShipmentsController::class, 'search']);
    
    //Products
    $router->get('/admin/product/index', [ProductController::class, 'index']);

    $router->get('/admin/product/create', [ProductController::class, 'create']);
    $router->post('/admin/product/create', [ProductController::class, 'create']);

    $router->get('/admin/product/update', [ProductController::class, 'update']);
    $router->post('/admin/product/update', [ProductController::class, 'update']);

    $router->post('/admin/product/delete', [ProductController::class, 'delete']);

    //Buscadores - Products
    $router->get('/admin/product/search/id', [ProductController::class, 'search']);

    $router->get('/error', [AdministracionController::class, 'error']);

    /** Exportar a EXCEL **/
    //Laptops
    $router->get('/archive-excel-download', [ExcelController::class, 'downloadLaptop']);

    $router->checkRoutes();
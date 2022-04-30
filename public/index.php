<?php 


require_once __DIR__ . '/../includes/app.php';

    use Controllers\EmbarquesController;
    use Controllers\AdministracionController;
    use Controllers\ExcelController;
    use Controllers\ProcesadoresController;
    use Controllers\ProductController;
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
    //Embarques - index
    $router->get('/admin/shipments/index', [EmbarquesController::class, 'index']);

    //Embarques - Crear
    $router->get('/admin/shipments/create', [EmbarquesController::class, 'create']);
    $router->post('/admin/shipments/create', [EmbarquesController::class, 'create']);

    //Embarques - Actualizar
    // $router->get('/admin/shipments/update', [EmbarquesController::class, 'update']);
    // $router->post('/admin/shipments/update', [EmbarquesController::class, 'update']);

    //Embarques - Eliminar
    $router->post('/admin/shipments/delete', [EmbarquesController::class, 'delete']);

    //Laptops - Index 
    $router->get('/admin/shipments/detalles', [EmbarquesController::class, 'detalles']);
    $router->post('/admin/shipments/detalles', [EmbarquesController::class, 'detalles']);

    //Laptops - Crear
    $router->get('/admin/shipments/create-laptop', [EmbarquesController::class, 'createLaptop']);
    $router->post('/admin/shipments/create-laptop', [EmbarquesController::class, 'createLaptop']);

    //Laptops - Actualizar
    $router->get('/admin/shipments/update-laptop', [EmbarquesController::class, 'updateLaptop']);
    $router->post('/admin/shipments/update-laptop', [EmbarquesController::class, 'updateLaptop']);

    //Laptops - Eliminar
    $router->post('/admin/shipments/delete-laptop', [EmbarquesController::class, 'deleteLaptop']);

    //Buscadores - Shipments
    $router->get('/admin/shipments/search/id', [EmbarquesController::class, 'search']);
    $router->post('/admin/shipments/search/id', [EmbarquesController::class, 'search']);
    
    /** Administracion - Procesadores **/
    //Index
    $router->get('/admin/processors/index', [ProcesadoresController::class, 'index']);

    //Create
    $router->get('/admin/processors/create', [ProcesadoresController::class, 'create']);
    $router->post('/admin/processors/create', [ProcesadoresController::class, 'create']);

    //Update
    // $router->get('/admin/processors/update', [ProcesadoresController::class, 'update']);
    // $router->post('/admin/processors/update', [ProcesadoresController::class, 'update']);

    //Delete
    $router->post('/admin/processors/delete', [ProcesadoresController::class, 'delete']);

    /** Productos **/

    //Productos - Index
    $router->get('/admin/product/index', [ProductController::class, 'index']);

    //Productos - Crear
    $router->get('/admin/product/create', [ProductController::class, 'create']);
    $router->post('/admin/product/create', [ProductController::class, 'create']);

    //Productos - Actualizar
    $router->get('/admin/product/update', [ProductController::class, 'update']);
    $router->post('/admin/product/update', [ProductController::class, 'update']);

    //Productos - Eliminar
    $router->post('/admin/product/delete', [ProductController::class, 'delete']);

    //Buscadores - Products
    $router->get('/admin/product/search/id', [ProductController::class, 'search']);

    //Pagina de error
    $router->get('/error', [AdministracionController::class, 'error']);

    /** Exportar a EXCEL **/
    //Laptops - General
    $router->get('/archive-excel-download', [ExcelController::class, 'downloadLaptop']);

    //Archivo Roldan
    $router->get('/archive-excel-download-roldan', [ExcelController::class, 'downloadRoldan']);

    $router->checkRoutes();
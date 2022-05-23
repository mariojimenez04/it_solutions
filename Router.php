<?php

namespace MVC;

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get( $url, $function ) {
        $this->rutasGET[$url] = $function;
    }
    
    public function post( $url, $function ) {
        $this->rutasPOST[$url] = $function;
    }

    public function checkRoutes() {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        $protected_pages = [
                            '/admin/index',
                            '/admin/shipments/index',
                            '/admin/shipments/create',
                            '/admin/shipments/detalles',
                            '/admin/shipments/update',
                            '/admin/shipments/search/id',
                            '/admin/shipments/create-laptop',
                            '/admin/product/index',
                            '/admin/product/create',
                            '/admin/product/update',
                            '/admin/product/delete',
                            '/admin/product/search/id',
                            '/admin/user/password/index',
                            '/admin/user/password/edit',
                            '/admin/user/register',
                            '/admin/user/edit',
                            '/admin/confirm/user',
                            '/admin/processors/index',
                            ];

        //Leer lo que el usuario esta buscando
        $currentURL = strtok($_SERVER["REQUEST_URI"], '?') === '' ? '/' : $_SERVER["REQUEST_URI"];
        //Saber si el metodo es GET
        $method = $_SERVER['REQUEST_METHOD'];

        if( $method === 'GET') {
            $function = $this->rutasGET[$currentURL] ?? null;
        }else {
            $function = $this->rutasPOST[$currentURL] ?? null;
        }

        if( in_array($currentURL, $protected_pages) && !$auth) {
            header('Location: /');
        }

        if( $function ) {

            call_user_func($function, $this);
        }else {
            echo "Pagina no encontrada";
        }
    }

    //Mostrar una vista
    public function render($view, $datos = [] ) {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include_once __DIR__ . "/views/layout.php";
    }
}
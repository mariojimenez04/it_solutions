<?php 

    namespace Controllers;

use Model\Shipments;
use MVC\Router;

    class AdministracionController {

        public static function index(Router $router) {
            $embarques = Shipments::all();

            $router->render('administracion/index', [
                'embarques' => $embarques
            ]);
        }

        public static function error(Router $router){


            $router->render('error');
        }

    }
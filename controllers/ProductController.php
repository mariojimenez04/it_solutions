<?php


    namespace Controllers;

    use MVC\Router;

    class ProductController {

        public static function index(Router $router) {
            
            $router->render('administracion/product/index');
        }

        public static function create(Router $router) {
            
            $router->render('administracion/product/create');
        }

        public static function update(Router $router) {
            
        }

        public static function delete(Router $router) {
            
        }

        public static function search(Router $router) {
            
        }

    }
<?php

    namespace Controllers;

use Model\Procesador;
use MVC\Router;

    class ProcesadoresController {

        public static function index(Router $router){
            $messaje_report = $_GET['messaje_report'] ?? null;
            $actualizado = $_GET['resultado'] ?? null;

            $procesadores = Procesador::all();
            
            $router->render('administracion/procesador/index', [
                'procesadores' => $procesadores,
                'actualizado' => $actualizado,
                'messaje_report' => $messaje_report
            ]);
        }

        public static function create(Router $router){
            $procesador = new Procesador;

            $alertas = [];

            if( $_SERVER['REQUEST_METHOD'] === 'POST') {
                $procesador = new Procesador($_POST);

                $alertas = $procesador->validar();

                if(empty($alertas)) {
                    $resultado = $procesador->guardar();

                    if($resultado) {
                        header('Location: /admin/processors/index?resultado=3154_rriaelbd');
                    }
                }
            }

            $router->render('administracion/procesador/create', [
                'procesador' => $procesador,
                'alertas' => $alertas,
            ]);
        }

        public static function update(Router $router){

            $router->render('administracion/procesador/update', [

            ]);
        }

        public static function delete(){
            $tipo = $_POST['tipo'];
            $id = $_POST['id_eliminar'];

            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if(!$id){
                header('Location: /error');
            }else {
                if( $tipo === 'procesador' && is_numeric($id)) {
                    $embarque = Procesador::find($id);
                    $resultado = $embarque->eliminar();
    
                    if( $resultado ){
                        header('Location: /admin/processors/index?messaje_report=3513');
                    }
                }else {
                    header('Location: /error');
                }
            }
        }

    }
<?php 

    namespace Controllers;

    use Model\Generacion;
    use Model\Laptop;
    use Model\Procesadores;
    use Model\Shipments;
    use MVC\Router;

    class ShipmentsController {

        public static function index(Router $router) {

            $embarques = Shipments::all();

            $router->render('administracion/shipments/index',[
                'embarques' => $embarques
            ]);
        }

        public static function createLaptop(Router $router) {

            $id = 'id';

            redirecciona($id, 'id');

            $embarque = new Laptop;

            $procesadores = Procesadores::all();

            $generaciones = Generacion::all();

            $alertas = [];

            if( $_SERVER['REQUEST_METHOD'] === 'POST') {
                $embarque = new Laptop($_POST);

                $alertas = $embarque->validar();

                if( empty($alertas) ) {
                    $resultado = $embarque->guardar();

                    if($resultado){
                        header("Location: /admin/shipments/create-laptop?id=" . $_POST['tituloId'] );
                    }
                }
            }

            $router->render('administracion/shipments/createlaptop',[
                'procesadores' => $procesadores,
                'embarque' => $embarque,
                'generaciones' => $generaciones,
                'alertas' => $alertas
            ]);
        }

        public static function create(Router $router){
            $embarque = new Shipments;

            $alertas = [];

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $embarque = new Shipments($_POST['embarque']);

                $alertas = $embarque->validar();

                if( empty($alertas)){
                    $resultado = $embarque->guardar();

                    if($resultado) {
                        header('Location: /admin/shipments/index');
                    }
                }
            }

            $router->render('administracion/shipments/create', [
                'embarque' => $embarque,
                'alertas' => $alertas
            ]);
        }

        public static function update(Router $router) {

            $router->render('administracion/shipments/update',[

            ]);
        }

        public static function search(Router $router) {
            $resultado = $_POST['numero_serie'];

            $laptops = Laptop::search('numero_serie', $resultado);

            $router->render('administracion/shipments/search',[
                'laptops' => $laptops,
            ]);
        }

        public static function detalles(Router $router) {

            $id = 'id';

            $id = redirecciona($id, 'id');

            $embarques = Shipments::find($id);

            $laptops = Laptop::consulta('tituloId', $id);
            
            $router->render('administracion/shipments/detalles', [
                'embarques' => $embarques,
                'laptops' => $laptops
            ]);
        }

        public static function delete() { 

            
        }


    }
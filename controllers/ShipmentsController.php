<?php 

    namespace Controllers;

    use Model\Embarque;
    use Model\Generacion;
    use Model\Laptop;
    use Model\Procesadores;
    use MVC\Router;

    class ShipmentsController {

        public static function index(Router $router) {

            $embarques = Embarque::all();

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
            $embarque = new Embarque;

            $alertas = [];

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $embarque = new Embarque($_POST['embarque']);

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

            $router->render('administracion/shipments/update');
        }

        public static function search(Router $router) {
            $result = $_POST['numero_serie'];

            $laptop = Laptop::search('numero_serie', $result);

            $router->render('administracion/shipments/search',[
                'laptop' => $laptop
            ]);
        }

        public static function detalles(Router $router) {

            $id = 'id';

            $id = redirecciona($id, 'id');

            $embarques = Embarque::find($id);

            $laptops = Laptop::consulta('tituloId', $id);
            
            $router->render('administracion/shipments/detalles', [
                'embarques' => $embarques,
                'laptops' => $laptops
            ]);
        }

        public static function delete() { 

            
        }


    }
<?php 

    namespace Controllers;

    use Model\Embarque;
    use Model\Generacion;
    use Model\Laptop;
    use Model\Procesadores;
    use MVC\Router;

    class EmbarquesController extends Controller {

        protected static $names = ['laptop'];

        public static function index(Router $router) {
            $mensaje = $_GET['messaje_report'] ?? null;
            $alertas = [];

            if( $mensaje === '3513'){
                $alertas = Laptop::setAlerta('alert-danger', 'Registro eliminado correctamente');
            }

            $embarques = Embarque::all();

            $alertas = Laptop::getAlertas();
            $router->render('administracion/shipments/index',[
                'embarques' => $embarques,
                'alertas' => $alertas,
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

            $router->render('administracion/shipments/update',[

            ]);
        }

        public static function search(Router $router) {
            $result = $_POST['numero_serie'];

            $laptops = Laptop::search('numero_serie', 'tituloId', $_POST['numero_serie'], $_POST['tituloId']);
            $router->render('administracion/shipments/search',[
                'laptops' => $laptops,
                'result' => $result
            ]);
        }

        public static function detalles(Router $router) {

            $id = 'id';

            $id = redirecciona($id, 'id');

            $embarques = Embarque::find($id);

            if( !$embarques) {
                header('Location: /error');
            }

            $laptops = Laptop::consulta('tituloId', $id);
            
            $router->render('administracion/shipments/detalles', [
                'embarques' => $embarques,
                'laptops' => $laptops
            ]);
        }

        public static function delete() { 
            $tipo = $_POST['tipo'];
            $id = $_POST['id_eliminar'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if( $tipo === 'laptop' && is_numeric($id)) {
                $laptop = Embarque::find($id);
                $resultado = $laptop->eliminar();

                if( $resultado ){
                    header('Location: /admin/shipments/index?messaje_report=3513');
                }
            }else {
                header('Location: /error');
            }
        }


    }
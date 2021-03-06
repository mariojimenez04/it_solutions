<?php 

    namespace Controllers;

    use Model\Embarque;
    use Model\Generacion;
    use Model\Laptop;
    use Model\Procesador;
    use MVC\Router;

    class EmbarquesController extends Controller {

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

            $alert = $_GET['alerta'] ?? null;

            $id = 'id';

            redirecciona($id, 'id');

            $embarque = new Laptop;

            $procesadores = Procesador::all();

            $alertas = [];

            if( $_SERVER['REQUEST_METHOD'] === 'POST') {
                $embarque = new Laptop($_POST);

                $alertas = $embarque->validar();

                if( empty($alertas) ) {
                    $resultado = $embarque->guardar();
                    if($resultado){
                        header("Location: /admin/shipments/create-laptop?id=" . $_POST['tituloId'] . "&alerta=3526" );
                    }
                }
            }
            $router->render('administracion/shipments/createlaptop',[
                'procesadores' => $procesadores,
                'embarque' => $embarque,
                'alertas' => $alertas,
                'alert' => $alert
            ]);
        }

        public static function updateLaptop(Router $router) {

            $alertas = [];
            $id = 'id';
            $id = redirecciona($id, 'id');

            $procesadores = Procesador::all();

            $embarque = Laptop::find($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $args = $_POST;

                $embarque->sincronizar($args);
                
                $alertas = $embarque->validarUpdate();

                if( empty($alertas)) {
                    $resultado = $embarque->guardar();

                    if($resultado){
                        header('Location: /admin/shipments/detalles?id=' . $_POST['tituloId'] . '&alert=alert_3515_eaaer');
                    }
                }
            }

            $router->render('administracion/shipments/updatelaptop', [
                'alertas' => $alertas,
                'embarque' => $embarque,
                'procesadores' => $procesadores,
            ]);
        }

        public static function deleteLaptop() {
            $tipo = $_POST['tipo'];
            $id = $_POST['id_eliminar'];

            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if(!$id){
                header('Location: /error');
            }else {
                if( $tipo === 'laptop' && is_numeric($id)) {
                    $laptop = Laptop::find($id);
                    $resultado = $laptop->eliminar();
    
                    if( $resultado ){
                        header('Location: /admin/shipments/index?messaje_report=3513');
                    }
                }else {
                    header('Location: /error');
                }
            }
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
            $search = $_POST['tituloId'];

            $laptop = Laptop::where('tituloId', $search);
            $laptops = Laptop::search('numero_serie', 'tituloId', $_POST['numero_serie'], $_POST['tituloId']);
            $router->render('administracion/shipments/search',[
                'laptop' => $laptop,
                'laptops' => $laptops,
                'result' => $result
            ]);
        }

        public static function detalles(Router $router) {
            $valor_1 = 0;
            $valor_2 = 1;

            $entregado = Laptop::conteo('entregado', 'entregado', $valor_2, 'tituloId', $_GET['id']);
            $no_entregado = Laptop::conteo('entregado', 'entregado', $valor_1, 'tituloId', $_GET['id']);

            $actualizado = $_GET['alert'] ?? null;

            $id = 'id';

            $id = redirecciona($id, 'id');

            $embarques = Embarque::find($id);

            if( !$embarques) {
                header('Location: /error');
            }

            $laptops = Laptop::consulta('tituloId', $id);
            
            $router->render('administracion/shipments/detalles', [
                'embarques' => $embarques,
                'laptops' => $laptops,
                'actualizado' => $actualizado,
                'entregado' => $entregado,
                'no_entregado' => $no_entregado,
            ]);
        }

        public static function delete() { 
            $tipo = $_POST['tipo'];
            $id = $_POST['id_eliminar'];

            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if(!$id){
                header('Location: /error');
            }else {
                if( $tipo === 'embarque' && is_numeric($id)) {
                    $embarque = Embarque::find($id);
                    $resultado = $embarque->eliminar();
    
                    if( $resultado ){
                        header('Location: /admin/shipments/index?messaje_report=3513');
                    }
                }else {
                    header('Location: /error');
                }
            }
        }


    }
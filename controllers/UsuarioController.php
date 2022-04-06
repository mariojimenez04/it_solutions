<?php 

    namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

    class UsuarioController {

        public static function login(Router $router) {

            $alertas = [];

            if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
                //Crear nueva instancia de POST
                $auth = new Usuario($_POST);
                $alertas = $auth->validate();

                if( empty($alertas) ) {
                    $usuario = Usuario::where('email', $auth->email);

                    if($usuario) {
                        
                        if ($usuario->comprobarPassword($auth->password)){
                            //Iniciar sesion del usuario
                            session_start();

                            $_SESSION['id'] = $usuario->id;
                            $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                            $_SESSION['email'] = $usuario->email;
                            $_SESSION['login'] = true;

                            header('Location: /admin/index');
                        }
                    }else {
                        Usuario::setAlerta('alert alert-danger', 'El usuario no existe');
                    }
                }
            }

            $alertas = Usuario::getAlertas();

            $router->render('auth/index', [
                'alertas' => $alertas,
            ]);
        }

        public static function register(Router $router) {
            $notificacion = $_GET['notification'] ?? null;

            $usuario = new Usuario($_POST);

            $alertas = [];

            if( $_SERVER['REQUEST_METHOD'] === 'POST'){
                $usuario->sincronizar($_POST);
                $alertas = $usuario->validarNuevoUsuario();

                if( empty($alertas) ) {
                    $resultado = $usuario->userExist();

                    if( $resultado->num_rows ){
                        $alertas = Usuario::getAlertas();
                    }else {
                        //No esta registrado
                        $usuario->hashPassword();

                        //Enviar Token
                        $usuario->crearToken();

                        //Enviar el email
                        $email = new Email($usuario->nombre, $usuario->apellido, $usuario->email, $usuario->creado_el, $usuario->token);
                        $email->enviarEmail();

                        $resultado = $usuario->guardar();
                        
                        if( $resultado ) {
                            header('Location: /admin/user/register?notification=1451');
                        }
                    }
                }

            }

            $router->render('auth/register', [
                'usuario' => $usuario,
                'alertas' => $alertas,
                'notificacion' => $notificacion
            ]);
        }

        public static function logout() {
            session_start();

            $_SESSION = [];

            header('Location: /');
        }

        public static function passwordIndex(Router $router) {

            $usuarios = Usuario::all();

            $router->render('auth/password/index',[
                'usuarios' => $usuarios
            ]);
        }

        public static function passwordEdit(Router $router) {

            $id = 'id' ?? null;

            $id = redirecciona($id, 'id', '/admin/index');

            $usuario = Usuario::find($id);

            if( !$usuario ) {
                header('Location: /error');
            }

            $alertas = [];

            if( $_SERVER["REQUEST_METHOD"] === "POST" ) {
                
            }

            $router->render('auth/password/edit', [
                'usuario' => $usuario
            ]);
        }

        public static function confirm(Router $router) {
            $alertas = [];

            $token = s($_GET['token']);

            $token = redirecciona($token, 'token');

            $usuario = Usuario::where('token', $token);

            if( empty( $usuario ) ) {
                #Mostrar mensaje de error
                Usuario::setAlerta('alert alert-danger', 'Token no valido');
            }else {
                #Mostrar mensaje de exito
                
                $usuario->confirmado = '1';
                $usuario->token = null;

                $usuario->guardar();

                Usuario::setAlerta('alert alert-success', 'Usuario confirmado exitosamente, puedes volver a inicio');
            }

            $alertas = Usuario::getAlertas();
            
            $router->render('auth/confirm', [
                'alertas' => $alertas
            ]);
        }

    }
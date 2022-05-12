<?php
    namespace Model;

    class Usuario extends ActiveRecord {
        protected static $tabla = 'users';
        protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'token', 'admin', 'confirmado', 'ultima_modificacion', 'modificado_por'];

        public $id;
        public $nombre;
        public $apellido;
        public $email;
        public $password;
        public $token;
        public $admin;
        public $confirmado;
        public $creado_por;

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->nombre = $args['nombre'] ?? '';
            $this->apellido = $args['apellido'] ?? '';
            $this->email = $args['email'] ?? '';
            $this->password = $args['password'] ?? '';
            $this->token = $args['token'] ?? '';
            $this->admin = $args['admin'] ?? 0;
            $this->confirmado = $args['confirmado'] ?? 0;
            $this->modificado_por = $_SESSION['nombre'] ?? '';
            $this->ultima_modificacion = date('Y-m-d H:i:s');
        }

        //Mensajes de validacion para la creacion de una cuenta
        public function validarNuevoUsuario() {

            if( !$this->nombre ) {
                self::$alertas['alert-danger'][] = 'El campo Nombre es obligatorio';
            }

            if( !$this->apellido ) {
                self::$alertas['alert-danger'][] = 'El campo Apellido es obligatorio';
            }

            if( !$this->email ) {
                self::$alertas['alert-danger'][] = 'El campo Email es obligatorio';
            }

            if( !$this->password ) {
                self::$alertas['alert-danger'][] = 'El campo Password es obligatorio';
            }

            if( strlen( $this->password) < 6) {
                self::$alertas['alert-danger'][] = 'El Campo Password debe tener al menos 6 caracteres';
            }

            return self::$alertas;
        }

        public function validate()
        {
            if( !$this->email ) {
                self::$alertas['alert-danger'][] = 'El campo Email es obligatorio';
            }

            if( !$this->password ) {
                self::$alertas['alert-danger'][] = 'El campo Password es obligatorio';
            }

            return self::$alertas;
        }

        public function userExist() {
            $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

            $resultado = self::$db->query($query);

            if( !$resultado->num_rows ) {
                self::$alertas['alert-danger'][] = 'El usuario no existe';
            }else {
                self::$alertas['alert-danger'][] = 'El usuario ya ha sido registrado';
            }

            return $resultado;
        }

        public function comprobarPassword($password) {

            $resultado = password_verify($password, $this->password);

                if( !$this->confirmado || !$resultado ) {
                    self::$alertas['alert alert-danger'][] = 'Password incorrecto';
                }else {
                    return true;
                }
        }

        public function autenticar() {
            session_start();

            $_SESSION['name'] = $this->nombre;
            $_SESSION['usuario'] = $this->email;
            $_SESSION['login'] = true;

            header('Location: /admin/index');
        }

        public function hashPassword() {
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        }

        public function crearToken() {
            $this->token = uniqid();
        }
    }
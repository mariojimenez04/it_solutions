<?php

    namespace Model;

    class Embarque extends ActiveRecord {
        protected static $columnasDB = ['id', 'titulo', 'descripcion_productos', 'usuarioId', 'ultima_modificacion', 'modificado_por'];
        protected static $tabla = 'titulo_embarque';

        public $id;
        public $titulo;
        public $descripcion_productos;

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->titulo = $args['titulo'] ?? '';
            $this->descripcion_productos = $args['descripcion_productos'] ?? '';
            $this->usuarioId = $_SESSION['id'] ?? null;
            $this->ultima_modificacion = date('Y-m-d H:i:s');
            $this->creado_por = $_SESSION['nombre'] ?? null;
        }

        public function validar()
        {
            if(!$this->titulo){
                self::$alertas['alert-danger'][] = 'El campo Titulo es obligatorio';
            }
            if(!$this->descripcion_productos){
                self::$alertas['alert-danger'][] = 'El campo Descripcion es obligatorio';
            }

            return self::$alertas;
        }
    }
<?php

    namespace Model;

    class Procesador extends ActiveRecord {

        protected static $columnasDB = ['id', 'procesadores', 'ultima_modificacion', 'modificado_por'];
        protected static $tabla = 'procesadores';

        public $id;
        public $procesadores;

        public function __construct($args = [])
        {
            
            $this->id = $args['id'] ?? null;
            $this->procesadores = $args['procesadores'] ?? '';
            $this->ultima_modificacion = date('Y-m-d H:i:s');
            $this->modificado_por = $_SESSION['nombre'];

        }

        public function validar()
        {
            
            if( !$this->procesadores ) {
                self::$alertas['alert-danger'][] = 'El campo Procesador es obligatorio';
            }
            
            return self::$alertas;
        }
    }
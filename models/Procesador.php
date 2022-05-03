<?php

    namespace Model;

    class Procesador extends ActiveRecord {

        protected static $columnasDB = ['id', 'procesadores', 'ultima_modificacion', 'modificado_por'];
        protected static $tabla = 'procesadores';

        public $id;
        public $procesador;

        public function __construct($args = [])
        {
            
            $this->id = $args['id'] ?? null;
            $this->procesador = $args['procesador'] ?? '';
            $this->registrado_el = date('Y-m-d H:i:s');
            $this->modificado_por = $_SESSION['nombre'];

        }

        public function validar()
        {
            
            if( !$this->procesador ) {
                self::$alertas['alert-danger'][] = 'El campo Procesador es obligatorio';
            }
            
            return self::$alertas;
        }
    }
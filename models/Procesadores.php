<?php

    namespace Model;

    class Procesadores extends ActiveRecord {

        protected static $database_columns = ['id', 'procesador'];
        protected static $tabla = 'procesadores';

        public $id;
        public $procesador;

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->procesador = $args['procesador'] ?? '';
        }
    }
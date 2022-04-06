<?php

    namespace Model;

    class Generacion extends ActiveRecord {

        protected static $database_columns = ['id', 'generacion'];
        protected static $tabla = 'generaciones';

        public $id;
        public $generacion;

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->generacion = $args['generacion'] ?? '';
        }
    }
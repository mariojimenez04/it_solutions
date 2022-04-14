<?php

    namespace Model;

    class Laptop extends ActiveRecord {
        protected static $columnasDB = ['id', 'id_identif', 'modelo', 'numero_serie', 'diagnostico_hp', 'acciones_it', 'procesador', 'tamano', 'color', 'capacidad_almacenamiento', 'ram', 'cantidad', 'status', 'observaciones', 'entregado', 'tituloId', 'creado_el', 'actualizado_el', 'registrado_por'];
        protected static $tabla = 'laptop_detalles';

        public $id;
        public $id_identif;
        public $modelo;
        public $numero_serie;
        public $diagnostico_hp;
        public $acciones_it;
        public $procesador;
        public $tamano;
        public $color;
        public $capacidad_almacenamiento;
        public $ram;
        public $cantidad;
        public $status;
        public $observaciones;
        public $entregado;
        public $tituloId;
        public $registrado_por;

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->id_identif = $args['id_identif'] ?? null;
            $this->modelo = $args['modelo'] ?? '';
            $this->numero_serie = $args['numero_serie'] ?? '';
            $this->diagnostico_hp = $args['diagnostico_hp'] ?? '';
            $this->acciones_it = $args['acciones_it'] ?? '';
            $this->procesador = $args['procesador'] ?? '';
            $this->tamano = $args['tamano'] ?? '';
            $this->color = $args['color'] ?? '';
            $this->capacidad_almacenamiento = $args['capacidad_almacenamiento'] ?? '';
            $this->ram = $args['ram'] ?? '';
            $this->cantidad = $args['cantidad'] ?? 1;
            $this->status = $args['status'] ?? 'N/A';
            $this->observaciones = $args['observaciones'] ?? 'N/A';
            $this->entregado = $args['entregado'] ?? 0;
            $this->tituloId = $args['tituloId'] ?? 1;
            $this->creado_el = date('Y-m-d H:i:s');
            $this->actualizado_el = date('Y-m-d H:i:s');
            $this->registrado_por = $_SESSION['nombre'];
        }

        public function nuevoEmbarque() {
            if( !$this->ram ) {
                self::$alertas['alert-success'][] = 'El campo RAM es obligatorio';
            }

            return self::$alertas;
        }

        public function validar()
        {

            if( !$this->modelo ) {
                self::$alertas['alert-danger'][] = 'El campo Modelo es obligatorio';
            }

            if( !$this->numero_serie ) {
                self::$alertas['alert-danger'][] = 'El campo Numero de Serie es obligatorio';
            }

            if( !$this->procesador ) {
                self::$alertas['alert-danger'][] = 'El campo Procesador es obligatorio';
            }

            if( !$this->tamano ) {
                self::$alertas['alert-danger'][] = 'El campo Tamaño es obligatorio';
            }

            if( !$this->color ) {
                self::$alertas['alert-danger'][] = 'El campo Color es obligatorio';
            }

            if( !$this->capacidad_almacenamiento ) {
                self::$alertas['alert-danger'][] = 'El campo Capacidad almacenamiento es obligatorio';
            }

            if( !$this->ram ) {
                self::$alertas['alert-danger'][] = 'El campo RAM es obligatorio';
            }

            if( !$this->tituloId ) {
                self::$alertas['alert-danger'][] = 'El campo TituloId es obligatorio';
            }

            return self::$alertas;

        }

    }
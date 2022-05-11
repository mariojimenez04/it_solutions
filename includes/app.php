<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env' );
$dotenv->safeLoad();

require 'funciones.php';
require 'database.php';

use Model\ActiveRecord;

ActiveRecord::setDB($db);
<?php 

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

//Escapar HTML
function s($html) {
    $s = htmlspecialchars($html);

    return $s;
}

function estaAutenticado() {
    session_start();
    
    if(!$_SESSION['login']) {
        header('Location: /login.php');
    }
}

function debuguear( $variable ) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Mostrar los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = '';

    switch ($codigo) {
        case 1:
            # code...
            $mensaje = 'Registro creado correctamente';
            break;
        case 2:
            # code...
            $mensaje = 'Registro actualizado correctamente';
            break;
        case 3:
            # code...
            $mensaje = 'Registro eliminado correctamente';
            break;
        default:
            # code...
            $mensaje = false;
            break;
    }
    
    return $mensaje;
}

function admin() : void{
    if(!$_SESSION['admin']){
        header('Location: /error');
    }
}

function redirecciona($valor, $get) {
    //$Valor toma lo que contiene el GET
    //$_GET Toma lo que tiene en en la variable superglobal
    $valor =  s($_GET["$get"]);

    if( $get === 'id' ) {
        $valor = filter_var($valor, FILTER_VALIDATE_INT);

        if( !$valor ) {
            header('Location: /error');
        }
    }else {
        if(!$valor) {
            header("Location: /error");
        }
    }
    
    return $valor;
}
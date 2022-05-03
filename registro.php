<?php 

    require 'includes/app.php';

    $db = conectarDb();

    $nombre = "Mario Alejandro";
    $apellido = "Jimenez";
    $email = "cuentas.alexjimenez@gmail.com";
    $password = "M4JT041096!";
    $admin = 1;
    $confirmado = 1;
    $creado_el = date('Y-m-d H:i:s');
    $modificado_por = 'Mario Alejandro Jimenez';

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);


    $query = "INSERT INTO users (nombre, apellido, email, password, admin, confirmado, ultima_modificacion, modificado_por) VALUES ('${nombre}', '${apellido}',  '${email}', '${passwordHash}', '${admin}', '${confirmado}', '${creado_el}', '${modificado_por}') ";

    mysqli_query($db, $query);


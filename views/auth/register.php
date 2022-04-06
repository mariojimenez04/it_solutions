<h2 class="text-center mb-5">Registrar Nuevo Usuario - Administrador</h2>

    <?php if($notificacion === '1451'): ?>
        <p class="text-center alert alert-success">Usuario registrado con exito</p>
    <?php endif; ?>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<form class="formulario" method="POST">

    <div class="container row row-cols-1 row-cols-md-2">

        <div class="col">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo s($usuario->nombre) ?>">
        </div>

        <div class="col">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo s($usuario->apellido) ?>">
        </div>

        <div class="col">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo s($usuario->email) ?>">
        </div>

        <div class="col">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

    </div>
    
    <input type="submit" class="mt-5 btn btn-success" value="Registrar nuevo usuario">
</form>
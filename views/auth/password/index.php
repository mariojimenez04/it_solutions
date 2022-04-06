<table class="table table-hover">
    <h2 class="text-center mb-5">Usuarios - Inicio</h2>
    <thead class="bg-success text-center">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Token</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario) :?>
            <tr class="text-center">
                <th scope="row">1</th>
                <td><?php echo s($usuario->nombre . " " . $usuario->apellido); ?></td>
                <td><?php echo s($usuario->email); ?></td>
                <td><a href="/admin/confirm/user?token=<?php echo s($usuario->token); ?>"><?php echo s($usuario->token); ?></a></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="id_eliminar" value="">
                        <input type="hidden" name="tipo" value="usuario">
                        <input type="submit" class="btn btn-danger mb-2 fw-bold w-100" value="Dar de baja">
                    </form>
                    
                        <a href="/admin/user/password/edit?id=<?php echo s($usuario->id); ?>" class="btn btn-orange mb-2 text-white fw-bold w-100">Editar contraseña</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
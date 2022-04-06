<h2 class="mt-5 fw-bold text-center">Cambiar contraseña de: <?php echo $usuario->nombre . " " . $usuario->apellido; ?> - Administrador</h2>

    <a href="/admin/user/password/index" class="btn btn-success">Regresar</a>

    <div class="container mt-5">
        <form action="" method="post" class="row">

            <div class="col-4">
                <label for="password" class="form-label">Cambiar password</label>
                <input type="password" name="password" id="password">

                <button type="submit" class="btn btn-success mt-5">Actualizar contraseña</button>
            </div>


        </form>
    </div>
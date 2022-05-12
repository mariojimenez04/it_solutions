<div class="centrado">

    <div class="estilo_1 shadow-lg">
        <h1 class="text-center1">IT Ofice Solutions</h1>

        <form method="POST" class="formulario">

        <?php
            foreach ( $alertas as $key => $mensajes ) :
                foreach ($mensajes as $mensaje):
        ?>
            <div class="alert <?php echo $key; ?>">
                <p class="text-center"><?php echo $mensaje; ?></p>
            </div>
        <?php
                endforeach;
            endforeach;
        ?>

            <div class="form-div my-4">
                <label class="form-label" for="email">Tu email</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>

            <div class="form-div my-4">
                <label class="form-label" for="password">Tu password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>

            <input type="submit" value="Iniciar sesion" class="btn-dark mt-4 fw-bold">

        </form>
    </div>

</div>
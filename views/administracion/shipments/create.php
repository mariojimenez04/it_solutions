<h2 class="text-center mb-5 mt-5">
    Crear nuevo registro - Embarques
</h2>

<?php include_once __DIR__ . '/../../templates/alertas.php'; ?>

<form action="" method="POST">

    <div class="row">
        
        <div class="col-5 m-3">

            <label for="titulo">Titulo</label>
            <input class="form-control"  type="text" id="titulo" name="embarque[titulo]" value="<?php echo s($embarque->titulo); ?>">

        </div>
        
        <div class="col-5 m-3">

            <label for="descripcion_productos">Descripcion</label>
            <input class="form-control"  type="text" id="descripcion_productos" name="embarque[descripcion_productos]" value="<?php echo s($embarque->descripcion_productos); ?>">

        </div>

    </div>

    <input class="btn btn-success" type="submit" value="Registrar nuevo Embarque">

</form>

<h2 class="text-center">Administracion - Procesadores</h2>

<?php include_once __DIR__ . '/../../templates/alertas.php'; ?>

<div class="d-flex">
    <a href="/admin/processors/index" class="btn btn-success">Volver</a>
</div>


<form action="" method="POST">

    <div class="row">
        
        <div class="col-5 m-3">

            <label for="procesador">Procesador</label>
            <input class="form-control"  type="text" id="procesador" name="procesador" value="<?php echo s($procesador->procesador); ?>">

        </div>

    </div>

    <input class="btn btn-success mt-5" type="submit" value="Registrar nuevo procesador">

</form>
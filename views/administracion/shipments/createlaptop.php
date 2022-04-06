<form method="POST">

    <h2 class="text-center mb-5 mt-5">
        Crear nuevo registro - Laptops
    </h2>

    <?php include_once __DIR__ . '/../../templates/alertas.php'; ?>

    <a href="/admin/shipments/index" class="btn btn-success">Volver</a>

    <div class="row">

        <div class="col-5 m-3">

            <label for="modelo">Modelo</label>
            <input class="form-control"  type="text" id="modelo" name="modelo" value="<?php echo s($embarque->modelo); ?>">

        </div>
        <div class="col-5 m-3">

            <label for="numero_serie">Numero de Serie</label>
            <input class="form-control"  type="text" name="numero_serie" id="numero_serie" value="<?php echo s($embarque->numero_serie); ?>">

        </div>
        <div class="col-5 m-3">

        <select class="form-select" name="procesador" id="">
            <option selected value="">--Seleccione--</option>
                <?php foreach( $procesadores as $procesador): ?>
                    <option 
                        <?php echo s($embarque->tituloId) === $procesador->id ? 'selected' : '' ?>
                        value="<?php echo s($procesador->procesador); ?>"
                    >
                    <?php echo s($procesador->procesador); ?>
                    </option>
                <?php endforeach; ?>
        </select>

        </div>
        <div class="col-5 m-3">

            <label for="tamano">Tamaño</label>
            <input class="form-control"  type="text" name="tamano" id="tamano" value="<?php echo s($embarque->tamano); ?>">

        </div>
        <div class="col-5 m-3">

            <label for="color">Color</label>
            <input class="form-control"  type="text" name="color" id="color" value="<?php echo s($embarque->color); ?>">

        </div>
        <div class="col-5 m-3">

            <label for="capacidad_almacenamiento">Capacidad almacenamiento</label>
            <input class="form-control"  type="text" name="capacidad_almacenamiento" id="capacidad_almacenamiento" value="<?php echo s($embarque->capacidad_almacenamiento); ?>">

        </div>
        <div class="col-5 m-3">

            <label for="ram">RAM</label>
            <input class="form-control"  type="text" name="ram" id="ram" value="<?php echo s($embarque->ram); ?>">

        </div>
        <div class="col-5 m-3">

            <label for="cantidad">Cantidad (por default es 1)</label>
            <input class="form-control"  type="text" name="cantidad" id="cantidad" value="<?php echo s($embarque->cantidad); ?>">

        </div>
        <div class="col-5 m-3">

            <label for="status">Status</label>
            <input class="form-control"  type="text" name="status" id="status" value="<?php echo s($embarque->status); ?>">

        </div>
        <div class="col-5 m-3">

            <label for="observaciones">Observaciones</label>
            <input class="form-control"  type="text" name="observaciones" id="observaciones" value="<?php echo s($embarque->observaciones); ?>">

        </div>
        <div class="col-5 m-3">

            <label for="entregado">Entregado (por default es negativo)</label>
            <input disabled class="form-control"  type="text" name="entregado" id="entregado">

        </div>

        <input type="hidden" name="tituloId" value="<?php echo s($_GET['id']) ?>">

    </div>

    <input type="submit" value="Crear registro" class="btn btn-success mt-5">

</form>
<div class="d-flex justify-content-between mb-5 mt-5">

    <div>
        <a href="/admin/index" class="btn btn-success">Volver</a>
    </div>
    
    <div class="d-flex justify-content-end gap-2">
        <div>
            <a class="btn btn-success" href="/admin/shipments/create">Registrar nuevo embarque</a>
        </div>

    </div>

</div>


<div class="container">
    <?php include_once __DIR__ . '/../../templates/alertas.php'; ?>
</div>

<table class="table table-hover">
    <h2 class="text-center mb-5">Embarques - Inicio</h2>
    <thead class="bg-success text-center">
        <tr>
        <th scope="col">id</th>
        <th scope="col">Embarque</th>
        <th scope="col">Tipo</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $embarques as $embarque): ?>
            <tr class="text-center">
                <th scope="row"><?php echo s($embarque->id); ?></th>
                <td><?php echo s($embarque->titulo); ?></td>
                <td><?php echo s($embarque->descripcion_productos); ?></td>
                <td>
                <?php if($_SESSION['admin'] === '1'): ?>
                    <form action="/admin/shipments/delete" method="POST">
                        <input type="hidden" name="id_eliminar" value="<?php echo s($embarque->id); ?>">
                        <input type="hidden" name="tipo" value="embarque">
                        <input type="submit" class="btn btn-danger mb-2 fw-bold w-100" value="Borrar">
                    </form>
                <?php endif; ?>
                        <a href="/admin/shipments/detalles?id=<?php echo $embarque->id; ?>" class="btn btn-orange mb-2 text-white fw-bold w-100">Ver Embarque - detalles</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
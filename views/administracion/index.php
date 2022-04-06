<h1 class="text-center">Panel de administracion</h1>

<div class="container">

    <table class="table table-hover mb-2">
        <h2 class="text-center mb-4">Embarque</h2>
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
                        <a href="/admin/shipments/detalles?id=<?php echo $embarque->id; ?>" class="btn btn-orange mb-2 text-white fw-bold w-100">Ver Embarque - detalles</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/admin/shipments/index" class="btn btn-success mb-5">Ver todos</a>

    <table class="table table-hover">
        <h2 class="text-center mb-4">Productos</h2>
        <thead class="bg-success text-center">
            <tr>
            <th scope="col">id</th>
            <th scope="col">Producto</th>
            <th scope="col">Tipo</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <th scope="row">1</th>
                <td>Accesorios</td>
                <td>Oficina(mouse, Teclados, audifonos)</td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="id_eliminar" value="">
                        <input type="hidden" name="tipo" value="laptop">
                        <input type="submit" class="btn btn-danger mb-2 fw-bold w-100" value="Borrar">
                    </form>
                    
                        <a href="/admin/edit/product/" class="btn btn-orange mb-2 text-white fw-bold w-100">Ver Productos</a>

                </td>
            </tr>
        </tbody>
    </table>

</div>
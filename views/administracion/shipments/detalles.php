<div class="d-flex justify-content-between mt-5">
    <div>
        <form action="/admin/shipments/search/id" class="d-flex" method="POST">

            <a href="/admin/shipments/create-laptop?id=<?php echo s($_GET['id']);  ?>" class="btn btn-success mx-3">Crear nuevo registro</a>
            
            <input type="hidden" name="tituloId" value="<?php echo s($_GET['id']); ?>">
            <input type="search" name="numero_serie" id="numero_serie" class="form-contol" aria-label="search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>

        </form>    
    </div>
    <div>
        <a target="_blank" href="/archive-excel-download?id=<?php echo s($embarques->id); ?>" class="btn btn-success">Exportar a excel</a>
    </div>
</div>

<table class="table table-hover">
    <h2 class="text-center mb-5">Embarques - <?php echo s($embarques->titulo); ?></h2>
    <thead class="bg-success text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Modelo</th>
            <th scope="col">No. Serie</th>
            <th scope="col">Diagnostico HP</th>
            <th scope="col">Acciones IT</th>
            <th scope="col">Procesador</th>
            <th scope="col">Tamaño</th>
            <th scope="col">Color</th>
            <th scope="col">Tamaño memoria</th>
            <th scope="col">RAM</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Status</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Entregado</th>
            <th scope="col">Registrado por</th>
            <th scope="col">Registrado el</th>
            <th scope="col">Accioness</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($laptops as $laptop): ?>
            <tr class="text-center">
                <td scope="row"><?php echo s($laptop->id_detalle); ?></td>
                <td><?php echo s($laptop->modelo); ?></td>
                <td><?php echo s($laptop->numero_serie); ?></td>
                <td><?php echo s($laptop->diagnostico_hp); ?></td>
                <td><?php echo s($laptop->acciones_it); ?></td>
                <td><?php echo s($laptop->procesador); ?></td>
                <td><?php echo s($laptop->tamano); ?></td>
                <td><?php echo s($laptop->color); ?></td>
                <td><?php echo s($laptop->capacidad_almacenamiento); ?></td>
                <td><?php echo s($laptop->ram); ?></td>
                <td><?php echo s($laptop->cantidad); ?></td>
                <td><?php echo s($laptop->status); ?></td>
                <td><?php echo s($laptop->observaciones); ?></td>
                <?php if($laptop->entregado === '0'): ?>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                        </svg>
                    </td>
                    <?php else : ?>
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </td>
                <?php endif; ?>
                <?php if($_SESSION['admin']): ?>
                    <td><?php echo s($laptop->registrado_por) ?></td>
                    <td><?php echo s($laptop->creado_el) ?></td>
                    <td>
                        <a class="w-100 btn btn-warning" href="/admin/shipments/update-laptop?id=<?php echo $laptop->id; ?>">Actualizar</a>

                        <form action="/servicios/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo $laptop->id; ?>">

                            <input type="submit" value="Borrar" class="mt-2 w-100 btn btn-danger">
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?> 
    </tbody>
</table>
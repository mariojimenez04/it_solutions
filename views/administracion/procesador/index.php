<div class="d-flex mt-5">
    <a href="/admin/index" class="btn btn-success">Volver</a>
    <a href="/admin/processors/create" class="btn btn-success ms-3">Registrar nuevo procesador</a>
</div>

<div class="container">
    <?php if( $actualizado === '3154_rriaelbd') : ?>
        <div class="alert alert-success">
            <p class="text-center">Registro creado correctamente</p>
        </div>
        <?php elseif($messaje_report === '3513'): ?>
            <div class="alert alert-success">
                <p class="text-center">Registro eliminado correctamente</p>
            </div>
    <?php endif; ?>
</div>

<table class="table table-hover">
    <h2 class="text-center mb-5 mt-5">Administracion - Procesadores</h2>
        <thead class="bg-success text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Procesador</th>
                <?php if($_SESSION['admin'] === '1'): ?>
                    <th scope="col">Registrado por</th>
                    <th scope="col">Registrado el</th>
                    <th scope="col">Accioness</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($procesadores as $procesador): ?>
                <tr class="text-center">
                    <td scope="row"><?php echo s($procesador->id); ?></td>
                    <td><?php echo s($procesador->procesadores); ?></td>
                    <?php if($_SESSION['admin'] === '1'): ?>
                        <td><?php echo s($procesador->modificado_por) ?></td>
                        <td><?php echo s($procesador->ultima_modificacion) ?></td>
                        <td>
                            <form action="/admin/processors/delete" method="POST">
                                <input type="hidden" name="id_eliminar" value="<?php echo $procesador->id; ?>">
                                <input type="hidden" name="tipo" value="procesador">
                                <input type="submit" value="Borrar" class="mt-2 w-100 btn btn-danger">
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?> 
        </tbody>
</table>
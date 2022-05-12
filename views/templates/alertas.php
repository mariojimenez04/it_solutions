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
<?php if ($cantidad == 0): ?>
    <option value="0">N/R</option>
    <?php
else:
    ?>
    <?php
    foreach ($usuarios as $fila) :
        if ($fila->tipo == 2):
            ?>
            <option value='<?= $fila->id_usuario; ?>'><?= $fila->nombre; ?> <?= $fila->apellido; ?></option>
        <?php
        endif;
    endforeach;
endif;
?>
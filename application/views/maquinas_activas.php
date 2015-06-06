<?php
    foreach ($maquinas as $fila) : 
            if ($fila->estado == 1):?>
    <option value='<?= $fila->num_maquina?>'><?= $fila->num_maquina; ?></option>
<?php endif;
endforeach; ?>
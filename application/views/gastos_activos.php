<?php
    foreach ($gastos as $fila) : 
            if ($fila->estado_cat_gasto == 1):?>
<option value='<?= $fila->id_categoria?>'><?= $fila->nombre_categoria; ?></option>
<?php endif;
endforeach; ?>
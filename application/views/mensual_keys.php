<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>MAQUINA</th>
                <th>KEY BASE</th>
                <th>KEY OUT</th>
                <th>TOTAL</th>
                <th>FECHA</th>
            </tr>
        </thead>
        <?php
        foreach ($mensual_keys as $fila):
            if ($fila->dia_key < 10):
                $fila->dia_key = "0" . $fila->dia_key;
            endif;
            if ($fila->mes_key < 10):
                $fila->mes_key = "0" . $fila->mes_key;
            endif;
            $fila->key_base = number_format($fila->key_base, 0, ",", ".");
            $fila->key_out = number_format($fila->key_out, 0, ",", ".");
            $fila->total_key = number_format($fila->total_key, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->id_key ?></td>
                    <td width="120"><?= $fila->num_maquina ?></td>
                    <td width="120">$<?= $fila->key_base ?></td>
                    <td width="120">$<?= $fila->key_out ?></td>
                    <td width="120">$<?= $fila->total_key ?></td>
                    <td width="120"><?= $fila->dia_key ?>/<?= $fila->mes_key ?></td>
                </tr>
            </tbody>
            <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>
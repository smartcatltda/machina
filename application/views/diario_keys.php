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
                <th>HORA</th>
            </tr>
        </thead>
        <?php
        foreach ($diario_keys as $fila):
            if ($fila->hora_key < 10):
                $fila->hora_key = "0" . $fila->hora_key;
            endif;
            if ($fila->min_key < 10):
                $fila->min_key = "0" . $fila->min_key;
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
                    <td width="120"><?= $fila->hora_key ?>:<?= $fila->min_key ?></td>
                </tr>
            </tbody>
        <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>
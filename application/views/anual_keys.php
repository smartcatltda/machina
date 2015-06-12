<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th colspan="4">RESUMEN ANUAL</th>
            </tr>
            <tr>
                <th>MAQUINA</th>
                <th>KEY IN</th>
                <th>KEY OUT</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <?php
        foreach ($anual_keys as $fila):
            $fila->key_in = number_format($fila->key_in, 0, ",", ".");
            $fila->key_out = number_format($fila->key_out, 0, ",", ".");
            $fila->total_key = number_format($fila->total_key, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->num_maquina ?></td>
                    <td width="120">$<?= $fila->key_in ?></td>
                    <td width="120">$<?= $fila->key_out ?></td>
                    <td width="120">$<?= $fila->total_key ?></td>
                </tr>
            </tbody>
            <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>
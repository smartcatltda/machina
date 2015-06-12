<?php if ($cantidad == 0): ?>
<div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>MONTO</th>
                <th>HORA</th>
            </tr>
        </thead>
        <?php
        foreach ($diario_aumentos as $fila):
            if ($fila->hora_aumento < 10):
                $fila->hora_aumento = "0" . $fila->hora_aumento;
            endif;
            if ($fila->min_aumento < 10):
                $fila->min_aumento = "0" . $fila->min_aumento;
            endif;
            $fila->monto_aumento = number_format($fila->monto_aumento, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->id_aumento ?></td>
                    <td width="120">$<?= $fila->monto_aumento ?></td>
                    <td width="120"><?= $fila->hora_aumento ?>:<?= $fila->min_aumento ?></td>
                </tr>
            </tbody>
        <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>
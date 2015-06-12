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
                <th>MES</th>
                <th>MONTO</th>
            </tr>
        </thead>
        <?php
        foreach ($anual_aumentos as $fila):
            if ($fila->mes_aumento < 10):
                $fila->mes_aumento = "0" . $fila->mes_aumento;
            endif;
            $fila->monto_aumento = number_format($fila->monto_aumento, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->mes_aumento ?></td>
                    <td width="120">$<?= $fila->monto_aumento ?></td>
                </tr>
            </tbody>
            <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>
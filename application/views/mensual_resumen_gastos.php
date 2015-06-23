<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th colspan="2">RESUMEN DEL MES</th>
            </tr>
            <tr>
                <th>CATEGORIA</th>
                <th>MONTO</th>
            </tr>
        </thead>
        <?php
        foreach ($mensual_resumen_gastos as $fila):
            $fila->monto_gasto = number_format($fila->monto_gasto, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->nombre_categoria ?></td>
                    <td width="120">$<?= $fila->monto_gasto ?></td>
                </tr>
            </tbody>
            <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>
<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>CATEGORIA</th>
                <th>USUARIO</th>
                <th>MONTO</th>
                <th>COMENTARIO</th>
            </tr>
        </thead>
        <?php
        foreach ($diario_gastos as $fila):
            $fila->monto_gasto = number_format($fila->monto_gasto, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->id_gastos ?></td>
                    <td width="120"><?= $fila->nombre_categoria ?></td>
                    <td width="120"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                    <td width="120">$<?= $fila->monto_gasto ?></td>
                    <td width="120"><?= $fila->obs_gasto ?></td>
                </tr>
            </tbody>
            <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>
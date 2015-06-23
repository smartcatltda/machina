<?php if ($cantidad == 0): ?>
<div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table border="2">
        <thead>
            <tr>
                <th colspan="5">RESUMEN SEMANAL - DIFERENCIAS AL CIERRE</th>
            </tr>
            <tr>
                <th>USUARIO</th>
                <th>DIFERENCIA</th>
            </tr>
        </thead>
        <?php
        foreach ($semanal_resumen_cierres as $fila):
            $fila->diferencia_caja = number_format($fila->diferencia_caja, 0, ",", ".");
            ?>
            <tbody>
                <tr align="center">
                    <td width="120"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                    <td width="120">$<?= $fila->diferencia_caja ?></td>
            </tbody>
        <?php
        endforeach;
    endif;
    ?>
</table>
<?php ?>
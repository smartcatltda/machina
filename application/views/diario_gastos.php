<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 800px; text-align: center;">
        <tr>
            <td>
                <table class="table-header" cellspacing="0" cellpadding="1" border="1" width="800">
                    <tr class="ui-widget-header" >
                        <th width="100">ID</th>
                        <th width="150">CATEGORIA</th>
                        <th width="150">USUARIO</th>
                        <th width="150">MONTO</th>
                        <th width="200">COMENTARIO</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:817px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="800">
                        <?php
                        foreach ($diario_gastos as $fila):
                            $fila->monto_gasto = number_format($fila->monto_gasto, 0, ",", ".");
                            ?>
                            <tr>
                                <td width="100"><?= $fila->id_gastos ?></td>
                                <td width="150"><?= $fila->nombre_categoria ?></td>
                                <td width="150"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                                <td width="150">$<?= $fila->monto_gasto ?></td>
                                <td width="200"><?= $fila->obs_gasto ?></td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </td>
        </tr>
    </table>
<?php
endif;
?>
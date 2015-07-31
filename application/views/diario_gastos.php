<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 1070px; text-align: center;">
        <tr>
            <td>
                <table class="table-header" cellspacing="0" cellpadding="1" border="1" width="1070">
                    <tr class="ui-widget-header" >
                        <th width="60">ID</th>
                        <th width="200">CATEGORIA</th>
                        <th width="300">USUARIO</th>
                        <th width="200">MONTO</th>
                        <th width="300">COMENTARIO</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:1087px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="1070">
                        <?php
                        foreach ($diario_gastos as $fila):
                            $fila->monto_gasto = number_format($fila->monto_gasto, 0, ",", ".");
                            ?>
                            <tr>
                                <td width="62"><?= $fila->id_gastos ?></td>
                                <td width="200"><?= $fila->nombre_categoria ?></td>
                                <td width="300"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                                <td width="200">$<?= $fila->monto_gasto ?></td>
                                <td width="300"><?= $fila->obs_gasto ?></td>
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
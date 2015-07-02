<?php if ($cantidad == 0): ?>
    <div>No hay datos que coincidan con los parametros seleccionados</div>
<?php else:
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 683px; text-align: center; ">
        <tr>
            <td>
                <table cellspacing="0" cellpadding="1" border="1" width="683">
                    <tr class="ui-widget-header" >
                        <th width="400">USUARIO</th>
                        <th width="250">DIFERENCIA</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:700px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="683">
                        <?php
                        foreach ($diario_resumen_cierres as $fila):
                            $fila->diferencia_caja = number_format($fila->diferencia_caja, 0, ",", ".");
                            ?>
                            <tr>
                                <td width="400"><?= $fila->nombre ?> <?= $fila->apellido ?></td>
                                <td width="250">$<?= $fila->diferencia_caja ?></td>
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
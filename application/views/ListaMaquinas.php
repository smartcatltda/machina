<?php if ($cantidad == 0): ?>
    <label>No se ha activado ninguna maquina!</label>
<?php else: ?>
    <table id="tabla_maquinas" cellspacing="0" cellpadding="0" border="0" style="border-radius: 10px; width: 683px; ">
        <tr>
            <td>
                <table cellspacing="0" cellpadding="1" border="1" width="683">
                    <tr class="ui-widget-header" >
                        <th width="169">N° MAQUINA</th>
                        <th>OBSERVACIONES</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="width:700px; height:315px; overflow:auto;">
                    <table class="table-content" cellspacing="0" cellpadding="1" border="1" width="683">
                        <?php
                        foreach ($maquinas as $fila):
                            ?>
                            <tr align="center">
                                <td width="100"><?= $fila->num_maquina ?></td>
                                <?php
                                if ($fila->obs == ""):
                                    $fila->obs = '-';
                                    ?>
                                    <td width="300"><?= $fila->obs ?></td>
                                    <?php
                                else:
                                    ?>
                                    <td width="300"><?= $fila->obs ?></td>                              
                                </tr>
                            <?php
                            endif;
                        endforeach;
                    endif;
                    ?>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php ?>

<div id="msg01" class="msj"></div>
<!--//Login-->
<div id="login" hidden>
    <div style="font-size: 20px;"><h1>Inicio de Sesión</h1></div>
    <hr style="width: 35%;"><br>
    <input class="user_icon" placeholder="Usuario" size="30" id="user" maxlength="30" required onkeypress="enter_user(event)" autofocus/><br>
    <input class="pass_icon" placeholder="Contraseña" type="password" size="30" id="pass" required onkeypress="capLock(event), enter_conectar(event)"/><br>
    <br>
    <button id="conectar">Conectar</button>
    <hr style="width: 35%;"><br>
    <h3 id="caplock" style="visibility:hidden">Bloqueo de Mayúscula Activado!</h3>
    <div id="alto_login"></div>
</div>

<div id="contenido" align="center" hidden>

    <!--//ADMIN-->
    <div id="admin" hidden>
        <!--HOME ADMIN-->
        <div id="home">
            <div class="home"></div>
        </div>
        <!--MANTENEDOR MAQUINAS-->
        <div id="maquinas">
            <div id="msj_man_maquinas" class="msj"></div>
            <div style="titulo"><h1>Administración de Maquinas</h1></div>
            <br>
            <div id="Man_maquinas">
                <table style="margin-left: 5%;">
                    <tr>
                        <td>N° Maquina: </td>
                        <td><select onchange="seleccionar_maquina()" class="rounded" id="man_nummaquina" style="width: 200px;"/></td>
                    <tr>
                        <td>Estado: </td>
                        <td>
                            <select class="rounded" id="man_estado" style="width: 200px;" >
                                <option value='1'>Activa</option>
                                <option value='0'>Inactiva</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Observaciones: </td>
                        <td><textarea maxlength="150" rows="10" cols="30" class="rounded" id="man_obs" style="width: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><button id="bteditarmaquina" style="width: 130px;">Editar</button></td>
                    </tr>
                </table>
                <br>
            </div>
            <div style="padding-right: 6%;" class="rounded" id="lista_maquinas"></div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <!--MANTENEDOR GASTOS-->  
        <div id="cat_gastos">
            <div id="msj_man_gastos" class="msj"></div>
            <div style="titulo"><h1>Administración de Gastos</h1></div>
            <div id="Man_gastos">
                <br>
                <table>
                    <tr>
                        <td><input hidden="true"readonly="readonly" id="id_cat_gastos" type="text" /></td>
                    <tr>
                    <tr>
                        <td>Nombre Gasto :</td>
                        <td><input maxlength="30" class="rounded" id="man_nombre_gasto" placeholder="Nombre Gasto" style="width: 200px;"/></td>
                    </tr>
                    <tr>
                        <td>Estado :</td>
                        <td>
                            <select class="rounded" id="man_estado_gasto" style="width: 200px;" >
                                <option value="" selected="">Seleccione</option>
                                <option value='1'>Activo</option>
                                <option value='2'>Inactivo</option>
                            </select>
                        </td>
                    </tr><tr></tr><tr></tr>
                    <tr>
                        <td>Descripción :</td>
                        <td><textarea required="" maxlength="150" placeholder="Descripción"rows="10" cols="30" class="rounded" id="man_desc_gasto" style="width: 250px;"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><button id="bteditargastos" style="width: 130px;">Editar</button>
                            <button id="btguardargasto" >Guardar</button></td>
                    </tr>
                </table>

            </div>
            <br>
            <div style="padding-right: 5%" class="rounded" id="lista_gastos"></div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <!--MANTENEDOR USUARIOS-->
        <div id="usuarios">
            <div id="msj_man_user" class="msj"></div>
            <div style="titulo"><h1>Administración de Usuarios</h1></div>
            <br>
            <div id="Man_usuarios">
                <table>
                    <tr>
                        <td><input hidden id="man_id" type="text" /></td>
                    <tr>
                    <tr>
                        <td style="width: 150px;">Usuario :</td>
                        <td><input maxlength="30" class="rounded" id="man_user" placeholder="Usuario" type="text" style="width: 200px;" maxlength="50" onkeypress="enter_manusuario(event)"/></td>
                    <tr>
                        <td>Contraseña :</td>
                        <td><input maxlength="20" class="rounded" id="man_pass" placeholder="Contraseña" type="password" style="width: 200px;" maxlength="50" onkeypress="enter_manpass(event)"/></td>
                        <td><input type="checkbox" id="checkpass"><label style="font-size: 11px; font-weight: bold;" for="checkpass">ver</label></td>
                    </tr>
                    <tr>
                        <td>Nombre :</td>
                        <td><input maxlength="30" class="rounded" id="man_nombre" placeholder="Nombre" type="text" style="width: 200px;" maxlength="20" onkeypress="enter_mannombre(event)" /></td>
                    </tr>
                    <tr>
                        <td>Apellido :</td>
                        <td><input maxlength="30" class="rounded" id="man_apellido" placeholder="Apellido" type="text" style="width: 200px;" maxlength="20" onkeypress="enter_manapellido(event)"/></td>
                    </tr>
                    <tr>
                        <td>Tipo :</td>
                        <td>
                            <select class="rounded" id="man_tipo" style="width: 200px;" >
                                <option value="" selected="">Seleccione</option>
                                <option value='2'>Cajero</option>
                                <option value='1'>Administrador</option>
                                <option value='0'>Inactivo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><button id="bteditaruser" style="width: 100px;">Editar</button>
                            <button id="btguardaruser" style="width: 100px;">Guardar</button></td>
                    </tr>
                </table>
            </div>
            <div style="padding-right: 5%" class="rounded" id="lista_usuarios" float="right"></div>
        </div>
        <!--ADMINISTRACION CAJA-->
        <div id="caja">
            <div id="msj_keys" class="msj"></div>
            <div style="titulo"><h1>Administración de Caja</h1></div>
            <br>
            <table style="width: 750px;">

                <tr>
                    <td></td>
                    <td>Maquina :</td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <select onchange="foco('ac_keybase')" class="rounded" id="ac_maq" style="width: 80px;" ></select>
                    </td>
                </tr>

                <tr>
                    <td style="width: 15px;"></td>
                    <td>Key Base :</td>
                    <td style="width: 20px;"></td>
                    <td style="width: 15px;"></td>
                    <td>Key Out :</td>
                    <td style="width: 20px;"></td>
                    <td style="width: 15px;"></td>
                    <td>Total Maquina:</td>
                    <td style="width: 20px;"></td>
                </tr>

                <tr>
                    <td>$</td>
                    <td><input class="rounded" id="ac_keybase" placeholder="Key Base" type="text" style="width: 160px;" 
                               maxlength="50" onkeypress="return validar_texto(event)" autofocus 
                               onkeydown="enter_keybase(event)" onkeyup="diferencia_keys(this);
                                       formatNumeros(this)"/></td>
                    <td></td>
                    <td>$</td>
                    <td><input class="rounded" id="ac_keyout" placeholder="Key Out" type="text" style="width: 160px;" 
                               maxlength="50" onkeypress="return validar_texto(event)" onkeyup="diferencia_keys(this);
                                       formatNumeros(this)"/></td>
                    <td></td>
                    <td>$</td>
                    <td><input class="rounded" id="ac_total" placeholder="0" type="text" style="width: 160px;" 
                               disabled="true" onload="formatNumeros(this)"/></td>
                    <td></td>
                    <td><button id="btregistrarkey" style="width: 140px;">Registrar</button></td>
                </tr>

                <tr>
                    <td></td>
                    <td> Total Key Base :</td>
                    <td colspan="2"></td>
                    <td> Total Key Out :</td>
                    <td colspan="2"></td>
                    <td> Total Acumulado :</td>
                </tr>

                <tr>
                    <td>$</td>
                    <td><input class="rounded" id="ac_totalbase" placeholder="0" type="text" style="width: 160px;" disabled="true" /></td>
                    <td></td>
                    <td>$</td>
                    <td><input class="rounded" id="ac_totalout" placeholder="0" type="text" style="width: 160px;" disabled="true" /></td>
                    <td></td>
                    <td>$</td>
                    <td><input class="rounded" id="ac_acumulado" placeholder="0" type="text" style="width: 160px;" disabled="true" /></td>
                    <td></td>
                    <td><button id="btreiniciarkeys" style="width: 140px;">Resetear</button></td>
                </tr>

                <tr style="height: 60px"></tr>
                <tr style="height: 60px">
                    <td colspan="8" style="font-size: 1.3em; font-weight: bold; ">Realizar Aumento</td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="2"> Nombre Cajero :</td>
                    <td></td>
                    <td> Monto :</td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="2">
                        <select onchange="foco('ac_aumento')" class="rounded" id="ac_usuarios" ></select>
                    </td>
                    <td>$</td>
                    <td><input class="rounded" id="ac_aumento" placeholder="Aumento" type="text" 
                               style="width: 160px;" maxlength="50" onkeypress="return validar_texto(event)" 
                               onkeyup="formatNumeros(this)" onchange="formatNumeros(this)"/></td>
                    <td colspan="4"></td>
                    <td><button id="btaumento" style="width: 140px;">Ingresar</button></td>
                </tr>

            </table>
        </div>
        <!--REPORTES-->
        <div id="estadisticas">
            <div id="msj_est" class="msj"></div>
            <div style="titulo"><h1>Estadísticas</h1></div>
            <br>
            <table class="table-header" style="border-radius: 8px;" border="2">
                <thead class="ui-widget-header" >
                    <tr>
                        <th rowspan="2">TIPO DE INFORME</th>
                        <th rowspan="2">RANGO DE TIEMPO</th>
                        <th rowspan="2">FECHA</th>
                        <th style="display: none;"  id="th_maquina"  rowspan="2">Máquina</th>
                    </tr>
                    <tr>
                    </tr>
                </thead>
                <tbody class="table-content">
                    <tr>
                        <td>
                            <select class="rounded" id="tipo_select" onchange="cargar_rangos(), cambiarTD()" style="width: 200px;">
                                <option value="k">Keys</option>
                                <option value="a">Aumentos</option>
                                <option value="p">Lista Pagos</option>
                                <option value="rp">Resumen Pagos</option>
                                <option value="g">Lista Gastos</option>
                                <option value="rg">Resumen Gastos</option>
                                <option value="c">Cierres de Caja</option>
                                <option value="rc">Resumen Cierres</option>
                            </select>
                        </td>
                        <td>
                            <select class="rounded" id="rango_select" onchange="bloquear_dp(), cambiarTD()" style="width: 200px;"></select>
                        </td>
                        <td><input type="text" id="estad_datepicker" class="rounded"></td>
                        <td id="td_maq_select" style="display: none;" ><select class="rounded" id="maq_select" style="width: 80px;"></td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tr>
                    <td style="width: 650px; text-align: right"><button id="btestad">Generar Informe</button></td>
                </tr>
            </table>
            <br>
            <div id="informe"></div>
            <div id="alto"></div>
        </div>
    </div>

    <!--CAJERO-->
    <div id="cajero" hidden>
        <!--HOME CAJERO-->
        <div id="homec">
            <div class="home"></div>
        </div>
        <!--CAJA-->
        <div id="cajac">
            <div id="msj_cajac" class="msj"></div>
            <div style="titulo"><h1>Caja</h1></div>
            <div style="titulo" id="titulo_caja" style="width: 900px;" ><h3>Ingreso de Pagos</h3></div>
            <br>
            <table style="width: 1000px;">
                <tr>
                    <td>Maquina :</td>
                    <td style="width: 150px;"></td>
                    <td style="padding-left: 2%;">Pago : $</td>
                </tr>
                <tr>
                    <td>
                        <select class="rounded" onchange="foco('c_pago')" id="c_maq" style="width: 150px;" ></select>
                    </td>
                    <td style="width: 150px;"></td>
                    <td align="center"><input class="rounded" id="c_pago" placeholder="pago" type="text" style="width: 290px;" onkeydown="enter_pago(event)" maxlength="50" onkeypress="return validar_texto(event)" onkeyup="formatNumeros(this)" onchange="formatNumeros(this)"/></td>
                    <td align="center"><input type="checkbox" id="checkpago" onclick="foco('c_pago')"><label style="font-size: 11px; font-weight: bold;" for="checkpago">Billette Tragado</label></td>
                    <td align="right"><button style="width: 150px;" id="btingresarpago" onkeypress="enter_ingresarpago(event)" >Ingresar</button></td>
                </tr>
            </table>
            <br>
            <div id="titulo_gasto" style="titulo" style="width: 900px;"><h3>Registro de Gastos</h3></div>
            <br>
            <table style="width: 1000px;">
                <tr>
                    <td style="width: 290px;">Categoría :</td><td style="width: 10px;"></td><td style="width: 290px;">Gasto :</td><td></td>
                </tr>
                <tr>
                    <td>
                        <select class="rounded" id="c_categorias" style="width: 290px;" ></select>
                    </td>
                    <td>$</td><td><input class="rounded" id="c_gasto" placeholder="gasto" type="text" style="width: 290px;" maxlength="50" onkeypress="return validar_texto(event)" onkeyup="formatNumeros(this)" onchange="formatNumeros(this)"/></td>
                    <td style="width: 150px;"></td><td style="width: 150px;"></td>
                </tr>
                <tr>
                    <td> Detalle :</td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td colspan="3"><input rows="2" type="text" placeholder="Detalle" class="rounded" id="c_detalle" style="width: 635px;"></td>
                    <td style="width: 150px;"></td>
                    <td align="right"><button id="btregistrargasto" style="width: 150px;">Registrar</button></td>
                </tr>
            </table>
            <br><br>
            <td></td>
            <tr></tr>
        </div>
        <!--EDITAR PAGO CAJA-->
        <div id="cierrecaja">
            <div id="msj_cierrecaja" class="msj"></div>
            <div style=""id="dialog-confirm" title="Confirmación">
                <p><span style="display: none; float:left; margin:0 7px 20px 0;"></span>Realmente Desea Modificar el Registro?</p>
            </div>
            <br>
            <div style="titulo"><h1>Editar Pagos</h1></div>
            <br><br>
            <table align="left" style="width: 400px; margin-left: 6%">
                <tr>
                    <td><input hidden="true" readonly="readonly" id="id_pago" type="text" /></td>
                </tr>
                <tr>
                    <td style="width: 50px;"></td>
                    <td>Maquina :</td>
                    <td></td>
                    <td><select class="rounded" id="c_maq_cierre" style="width: 210px;" /></select></td>
                </tr>
                <tr></tr><tr></tr>
                <tr></tr><tr></tr>
                <tr>
                    <td style="width: 50px;"></td>
                    <td>Pago :</td>
                    <td>$</td>
                    <td><input class="rounded" id="c_pago_cierre" placeholder="Pago" type="text" style="width: 210px;" maxlength="50" onkeypress="return validar_texto(event)" onkeyup="formatNumeros(this)"/></td>
                </tr>
                <tr></tr><tr></tr>
                <tr></tr><tr></tr>
                <tr>
                    <td style="width: 50px;"></td>
                    <td>Comentario:</td>
                    <td></td>
                    <td><textarea placeholder="Comentario" rows="4" cols="20" class="rounded" id="c_coment" style="width: 210px;"></textarea></td>
                </tr>
                <tr></tr><tr></tr>
                <tr></tr><tr></tr>
                <tr>
                    <td style="width: 50px;"></td>
                    <td></td>
                    <td></td>
                    <td align="right"><button style="width: 130px;" id="bteditarpago">Editar</button></td>
                </tr>
            </table>
            <div class="rounded" id="lista_pagos"></div>
            <br><br><br><br><br><br><br><br><br><br>
        </div>
        <!--    CUADRATURA CAJA-->
        <div id="cuadratura">
            <div style=""id="dialog-cuadratura" title="Advertencia">
                <p><span style="display: none; float:left; margin:0 7px 20px 0; text-justify: auto"></span>Una vez realizado el Cierre de Caja no podrá cambiar la información ingresada en el Total Caja.</p>
                <p>¿ Está seguro que desea continuar ?</p>          
            </div>
            <div style="titulo"><h1>Resumen Diario</h1></div>
            <div></div>
            <div class="rounded" id="lista_cuadratura"></div>
            <div id='bt_cuadratura'>
                <table>
                    <caption style="height: 50px; font-size: 24px; font-family: arial; font-weight: bold;">TOTAL CAJA</caption>
                    <thead align='center'>
                    <th>BILLETES</th>
                    <th></th>
                    <th>MONTO</th>
                    </thead>
                    <tbody>
                        <tr style="height: 15px;"></tr>
                        <tr align='center'>
                            <td>20.000 :</td>
                            <td style="width: 40px;"></td>
                            <td>$<input class="rounded" type="text" id="txt_20000" value="0" onkeyup="formatNumeros(this)" onclick="if (this.value == '0')
                                        this.value = ''" onblur = "if (this.value == '')
                                                    this.value = '0'" onkeypress="enter_b20(event)"/></td>
                        </tr><tr style="height: 10px;"></tr>
                        <tr align='center'>
                            <td>10.000 :</td>
                            <td style="width: 40px;"></td>
                            <td>$<input class="rounded" type="text" id="txt_10000" value="0" onkeyup="formatNumeros(this)" onclick="if (this.value == '0')
                                        this.value = ''" onblur = "if (this.value == '')
                                                    this.value = '0'" onkeypress="enter_b10(event)"/></td>
                        </tr><tr style="height: 10px;"></tr>
                        <tr align='center'>
                            <td>5.000 :</td>
                            <td style="width: 40px;"></td>
                            <td>$<input class="rounded" type="text" id="txt_5000" value="0" onkeyup="formatNumeros(this)" onclick="if (this.value == '0')
                                        this.value = ''" onblur = "if (this.value == '')
                                                    this.value = '0'" onkeypress="enter_b5(event)"/></td>
                        </tr><tr style="height: 10px;"></tr>
                        <tr align='center'>
                            <td>2.000 :</td>
                            <td style="width: 40px;"></td>
                            <td>$<input class="rounded" type="text" id="txt_2000" value="0" onkeyup="formatNumeros(this)" onclick="if (this.value == '0')
                                        this.value = ''" onblur = "if (this.value == '')
                                                    this.value = '0'" onkeypress="enter_b2(event)"/></td>
                        </tr><tr style="height: 10px;"></tr>
                        <tr align='center'>
                            <td>1.000 :</td>
                            <td style="width: 40px;"></td>
                            <td>$<input class="rounded" type="text" id="txt_1000" value="0" onkeyup="formatNumeros(this)" onclick="if (this.value == '0')
                                        this.value = ''" onblur = "if (this.value == '')
                                                    this.value = '0'" onkeypress="enter_b1(event)"/></td>
                        </tr><tr style="height: 10px;"></tr>
                        <tr align='center'>
                            <td>Monedas :</td>
                            <td style="width: 40px;"></td>
                            <td>$<input class="rounded" type="text" id="txt_monedas" value="0" onkeyup="formatNumeros(this)" onclick="if (this.value == '0')
                                        this.value = ''" onblur = "if (this.value == '')
                                                    this.value = '0'" onkeypress="enter_monedas(event)"/></td>
                        </tr><tr style="height: 15px;"></tr>
                        <tr align='center'>
                            <td colspan="3"><button class="rounded" style="width: 250px; height: 50px;" id="btcuadrar">Cierre Caja</button></td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </div>
    <!--PIE DE PAGINA-->
    <div id="nombrelogin"></div>
</div>



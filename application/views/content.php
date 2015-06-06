<div id="msg01"></div>

<div id="login" hidden>
    <div style="titulo"><h1>Inicio de Sesión</h1></div>
    <input class="ui-corner-all" placeholder="Usuario" size="30" id="user" maxlength="30" style="font-size: 20px;" required/ ><br>
    <input class="ui-corner-all" placeholder="Contraseña" type="password" size="30" id="pass" style="font-size: 20px;" required/><br>
    <button id="conectar">Conectar</button>
</div>

<div id="contenido" align="center" hidden>

    <div id="admin" hidden>

        <div id="home">
            <div class="home"></div>
        </div>

        <div id="maquinas">
            <div id="msj_man_maquinas"></div>
            <div style="titulo"><h1>Administración de Maquinas</h1></div>
            <br>
            <div id="Man_maquinas">
                <table>
                    <tr>
                        <td>Numero Maquina </td>
                        <td><select class="rounded" id="man_nummaquina" style="width: 200px;"/></td>
                    <tr>
                        <td>Estado </td>
                        <td>
                            <select class="rounded" id="man_estado" style="width: 200px;" >
                                <option value="" selected="">Seleccione</option>
                                <option value='1'>Activa</option>
                                <option value='2'>Inactiva</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Observaciones </td>
                        <td><textarea rows="10" cols="30" class="rounded" id="man_obs" style="width: 200px;"></textarea></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><button id="btguardarmaquina" >Guardar</button></td>
                    </tr>
                </table>
                <br>
                <button id="btseleccionarmaquina" style="width: 150px;">Seleccionar</button>
                <button id="bteditarmaquina" style="width: 100px;">Editar</button>
                <button id="bteliminarmaquina" style="width: 100px;">Eliminar</button>
            </div>
            <div class="rounded" id="lista_maquinas"></div>
        </div>

        <div id="cat_gastos">
            <div id="msj_man_gastos"></div>
            <div style="titulo"><h1>Administración de Gastos</h1></div>
            <div id="Man_gastos">
                <br>
                <table>
                    <tr>
                        <td><input hidden="true" id="id_cat_gastos" type="text" /></td>
<!--                        <td><input hidden="true" id="man_estado_gasto" type="text" /></td>-->
                    <tr>
                    <tr>
                        <td>Nombre Gasto :</td>
                        <td><input class="rounded" id="man_nombre_gasto" placeholder="Nombre Gasto" style="width: 200px;"/></td>
                    </tr>
                    <tr>
                        <td>Estado :</td>
                        <td>
                            <select class="rounded" id="man_estado_gasto" style="width: 200px;" >
                                <option value='1' selected="">Activo</option>
                                <option value='2'>Inactivo</option>
                            </select>
                        </td>
                    </tr><tr></tr><tr></tr>
                    <tr>
                        <td>Descripción :</td>
                        <td><textarea rows="10" cols="30" class="rounded" id="man_desc_gasto" style="width: 300px;"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><button id="btguardargasto" >Guardar</button></td>
                    </tr>
                </table>
                <br><br>
                <button id="btseleccionargastos" style="width: 150px;">Seleccionar</button>
                <button id="bteditargastos" style="width: 150px;">Editar</button>
                <button id="bteliminargastos" style="width: 15  0px;">Eliminar</button>
            </div>
            <div class="rounded" id="lista_gastos"></div>
        </div>

        <div id="usuarios">
            <div id="msj_man_user"></div>
            <div style="titulo"><h1>Administración de Usuarios</h1></div>
            <br>
            <div id="Man_usuarios">
                <table>
                    <tr>
                        <td><input hidden="true" id="man_id" type="text" /></td>
                    <tr>
                    <tr>
                        <td style="width: 150px;">Usuario :</td>
                        <td><input class="rounded" id="man_user" placeholder="Usuario" type="text" style="width: 200px;" maxlength="50" /></td>
                    <tr>
                        <td>Contraseña :</td>
                        <td><input class="rounded" id="man_pass" placeholder="Contraseña" type="password" style="width: 200px;" maxlength="50" /></td>
                    </tr>
                    <tr>
                        <td>Nombre :</td>
                        <td><input class="rounded" id="man_nombre" placeholder="Nombre" type="text" style="width: 200px;" maxlength="20" /></td>
                    </tr>
                    <tr>
                        <td>Apellido :</td>
                        <td><input class="rounded" id="man_apellido" placeholder="Apellido" type="text" style="width: 200px;" maxlength="20" /></td>
                    </tr>
                    <tr>
                        <td>Tipo :</td>
                        <td>
                            <select class="rounded" id="man_tipo" style="width: 200px;" >
                                <option value="" selected="">Seleccione</option>
                                <option value='2'>Cajero</option>
                                <option value='1'>Administrador</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><button id="btguardaruser" style="width: 100px;">Guardar</button></td>
                    </tr>
                </table>
                <br>
                <button id="btseleccionaruser" style="width: 150px;">Seleccionar</button>
                <button id="bteditaruser" style="width: 100px;">Editar</button>
                <button id="bteliminaruser" style="width: 100px;">Eliminar</button>
                <br>
                <br>  
            </div>
            <div class="rounded" id="lista_usuarios" float="right"></div>
        </div>

        <div id="caja">
            <div style="titulo"><h1>Administración de Caja</h1></div>
            <br>
            <table style="width: 800px;">
                <tr>
                    <td>Maquina :</td><td style="width: 10px;"></td><td>Key In :</td><td style="width: 10px;"></td><td>Key Out :</td><td style="width: 10px;"></td><td>Total Maquina:</td>
                </tr>
                <tr>
                    <td>
                        <select class="rounded" id="ac_maq" style="width: 160px;" ></select>
                    </td>
                    <td>$</td><td><input class="rounded" id="ac_keyin" placeholder="Key In" type="text" style="width: 260px;" maxlength="50" /></td>
                    <td>$</td><td><input class="rounded" id="ac_keyout" placeholder="Key Out" type="text" style="width: 260px;" maxlength="50" /></td>
                    <td>$</td><td><input class="rounded" id="ac_total" type="text" style="width: 260px;" disabled="true"/></td>
                    <td><button id="btregistrarkey" >Registrar</button></td>
                </tr>
                <tr>
                    <td></td><td></td><td> Total Key In :</td><td></td><td> Total Key Out :</td><td></td><td> Total Acumulado :</td>
                </tr>
                <tr>
                    <td></td>
                    <td>$</td><td><input class="rounded" id="ac_totalin" type="text" style="width: 260px;" disabled="true" /></td>
                    <td>$</td><td><input class="rounded" id="ac_atotalout" type="text" style="width: 260px;" disabled="true" /></td>
                    <td>$</td><td><input class="rounded" id="ac_acumulado" type="text" style="width: 260px;" disabled="true" /></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td> Ingrese Monto del Aumento :</td>
                </tr>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td>
                    <td>$</td><td><input class="rounded" id="ac_aumento" placeholder="Aumento" type="text" style="width: 260px;" maxlength="50" /></td>
                    <td><button id="btaumento">Ingresar</button></td>
                </tr>
            </table>
        </div>

        <div id="estadisticas">
            <div id="msj_estadisticas"></div>
            <div style="titulo"><h1>Estadísticas</h1></div>
            <br>

            <div id="alto"></div>
        </div>

    </div>

    <div id="cajero" hidden>
        <div id="homec">
            <div class="home"></div>
        </div>
        <div id="cajac">
            <div style="titulo"><h1>Caja</h1></div>
            <br>
            <div style="titulo" id="titulo_caja" style="width: 900px;"><h3>Ingreso de Pagos</h3></div>
            <br>
            <table style="width: 900px;">
                <tr>
                    <td>Maquina :</td><td></td><td style="width: 10px;"></td><td>Pago :</td><td></td><td></td>
                </tr>
                <tr>
                    <td>
                        <select class="rounded" id="c_maq" style="width: 150px;" ></select>
                    </td>
                    <td style="width: 150px;"></td>
                    <td>$</td><td><input class="rounded" id="c_pago" placeholder="pago" type="text" style="width: 290px;" maxlength="50" /></td>
                    <td style="width: 150px;"></td>
                    <td><button style="width: 150px;" id="btingresarpago" >Ingresar</button></td>
                </tr>
            </table>
            <br>
            <div id="titulo_gasto" style="titulo" style="width: 900px;"><h3>Registro de Gastos</h3></div>
            <br>
            <table style="width: 900px;">
                <tr>
                    <td style="width: 290px;">Categoría :</td><td style="width: 10px;"></td><td style="width: 290px;">Gasto :</td><td></td>
                </tr>
                <tr>
                    <td>
                        <select class="rounded" id="c_categorias" style="width: 290px;" ></select>
                    </td>
                    <td>$</td><td><input class="rounded" id="c_gasto" placeholder="gasto" type="text" style="width: 290px;" maxlength="50" /></td>
                    <td style="width: 150px;"></td><td style="width: 150px;"></td>
                </tr>
                <tr>
                    <td> Detalle :</td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td colspan="3"><input rows="2" type="text" class="rounded" id="c_detalle" style="width: 600px;"></textarea></td>
                    <td style="width: 150px;"></td>
                    <td><button id="btregistrargasto" style="width: 150px;">Registrar</button></td>
                </tr>
            </table>
            <br><br>

            <td></td>
            <tr></tr>
        </div>
        <div id="cierrecaja">
            <div id="msj_cierrecaja"></div>
            <div style="titulo"><h1>Cierre de Caja</h1></div>
            <br>

            <div id="alto"></div>
        </div>
    </div>
    <div id="nombrelogin"></div>
</div>



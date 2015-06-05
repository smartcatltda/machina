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
            home admin
            <div id="alto"></div>
        </div>
        <div id="maquinas">
            <div id="msj_man_maquinas"></div>
            <div style="titulo"><h1>Administración de Maquinas</h1></div>
            <br>
            <div id="Man_maquinas">
                <table>
                    <tr>
                        <td>Numero Maquina </td>
                        <td><input class="rounded" id="man_nummaquina" placeholder="Numero de Maquina" type="number" style="width: 200px;" maxlength="50" /></td>
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
            <div id="alto"></div>
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
            <div id="alto"></div>
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
                        <select class="rounded" id="ac_maq" style="width: 160px;" >
                            <!--estas opciones deberan ser cargadas de la lista de maquinas activas en el local-->
                            <option value='1'>01</option>
                            <option value='2'>02</option>
                            <option value='1'>03</option>
                            <option value='2'>04</option>
                            <option value='1'>05</option>
                            <option value='2'>06</option>
                            <option value='1'>07</option>
                            <option value='2'>08</option>
                        </select>
                    </td>
                    <td>$</td><td><input class="rounded" id="ac_keyin" placeholder="Key In" type="text" style="width: 260px;" maxlength="50" /></td>
                    <td>$</td><td><input class="rounded" id="ac_keyout" placeholder="Key Out" type="text" style="width: 260px;" maxlength="50" /></td>
                    <td>$</td><td><input class="rounded" id="ac_total" type="text" style="width: 260px;" disabled="true"/></td>
                    <td><button id="btregistrarkey" >Registrar</button></td>
                </tr>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td> Total Acumulado :</td>
                </tr>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td>
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

            <td></td>
            <tr></tr>
            <div id="alto"></div>
        </div>

        <div id="estadisticas">
            estadisticas para el admin
            <div id="alto"></div>
        </div>

    </div>
    <div id="cajero" hidden>
        <div id="homec">
            home cajero
            <div id="alto"></div>
        </div>
        <div id="cajac">
            caja cajero
            <div id="alto"></div>
        </div>
        <div id="estadisticasc">
            estadisticas cahero
            <div id="alto"></div>
        </div>
    </div>
    <div id="nombrelogin"></div>
</div>



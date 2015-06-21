<?php

class modelo extends CI_Model {

    function conectar($user, $pass) {
        $this->db->select('*');
        $this->db->where('user', $user);
        $this->db->where('pass', ($pass));
        return $this->db->get('usuario')->num_rows();
    }

    function permiso($user) {
        $this->db->select('*');
        $this->db->where('user', $user);
        return $this->db->get('usuario');
    }

//MANTENEDOR DE USUARIOS
    function mostrar_user() {
        $this->db->select('*');
        $this->db->from('usuario');
        return $this->db->get();
    }

    function guardar_user($nombre, $apellido, $user, $pass, $tipo) {
        $this->db->select('user');
        $this->db->where('user', $user);
        $cantidad = $this->db->get('usuario')->num_rows();
        if ($cantidad == 0):
            $data = array(
                "user" => $user,
                "pass" => $pass,
                "tipo" => $tipo,
                "nombre" => $nombre,
                "apellido" => $apellido,
            );
            $this->db->insert("usuario", $data);
            return 0;
        else:
            return 1;
        endif;
    }

    function ver($user) {
        $this->db->select('*');
        $this->db->where('user', $user);
        return $this->db->get('usuario');
    }

    function modificar_user($id, $nombre, $apellido, $user, $pass, $tipo) {
        $this->db->select('*');
        $this->db->where('user', $user);
        $datos = $this->db->get('usuario');
        if ($datos->num_rows() == 0):
            $this->db->select('*');
            $this->db->where('id_usuario', $id);
            $cantidad = $this->db->get('usuario')->num_rows();
            if ($cantidad > 0):
                $data = array(
                    "nombre" => $nombre,
                    "apellido" => $apellido,
                    "user" => $user,
                    "pass" => $pass,
                    "tipo" => $tipo,
                );
                $this->db->where('id_usuario', $id);
                $this->db->update('usuario', $data);
                return 0;
            else:
                return 1;
            endif;
        else:
            foreach ($datos->result() as $fila) {
                if ($fila->id_usuario == $id):
                    $data = array(
                        "nombre" => $nombre,
                        "apellido" => $apellido,
                        "user" => $user,
                        "pass" => $pass,
                        "tipo" => $tipo,
                    );
                    $this->db->where('id_usuario', $id);
                    $this->db->update('usuario', $data);
                    return 0;
                else:
                    return 2;
                endif;
            }
        endif;
    }

    //MANTENEDOR MAQUINAS
    function mostrar_maquinas() {
        $this->db->select('*');
        $this->db->from('maquina');
        return $this->db->get();
    }

    function ver_maquinas($num_maquina) {
        $this->db->select('*');
        $this->db->where('num_maquina', $num_maquina);
        return $this->db->get('maquina');
    }

    function modificar_maquina($num_maquina, $estado, $obs) {
        $this->db->select('*');
        $this->db->where('num_maquina', $num_maquina);
        $cantidad = $this->db->get('maquina')->num_rows();
        if ($cantidad > 0):
            $data = array(
                "num_maquina" => $num_maquina,
                "estado" => $estado,
                "obs" => $obs,
            );
            $this->db->where('num_maquina', $num_maquina);
            $this->db->update('maquina', $data);
            return 0;
        else:
            return 1;
        endif;
    }

//MANTENEDOR GASTOS
    function cargar_cat_gasto() {
        $this->db->select('*');
        $this->db->from('categoria_gastos');
        return $this->db->get();
    }

    function guardar_cat_gasto($nombre_gasto, $estado_cat_gasto, $desc) {
        $this->db->select('nombre_categoria');
        $this->db->where('nombre_categoria', $nombre_gasto);
        $cantidad = $this->db->get('categoria_gastos')->num_rows();
        if ($cantidad == 0):
            $data = array(
                "nombre_categoria" => $nombre_gasto,
                "estado_cat_gasto" => $estado_cat_gasto,
                "descripcion_categoria" => $desc,
            );
            $this->db->insert("categoria_gastos", $data);
            return 0;
        else:
            return 1;
        endif;
    }

    function ver_gastos($nombre_gasto) {
        $this->db->select('*');
        $this->db->where('nombre_categoria', $nombre_gasto);
        return $this->db->get('categoria_gastos');
    }

    function editar_gasto($id_gasto, $nombre_gasto, $estado_gasto, $desc) {
        $this->db->select('*');
        $this->db->where('nombre_categoria', $nombre_gasto);
        $datos = $this->db->get('categoria_gastos');
        if ($datos->num_rows() == 0):
            $this->db->select('*');
            $this->db->where('id_categoria', $id_gasto);
            $cantidad = $this->db->get('categoria_gastos')->num_rows();
            if ($cantidad > 0):
                $data = array(
                    "nombre_categoria" => $nombre_gasto,
                    "estado_cat_gasto" => $estado_gasto,
                    "descripcion_categoria" => $desc,
                );
                $this->db->where('id_categoria', $id_gasto);
                $this->db->update('categoria_gastos', $data);
                return 0;
            else:
                return 1;
            endif;
        else:
            foreach ($datos->result() as $fila) {
                if ($fila->id_categoria == $id_gasto):
                    $data = array(
                        "nombre_categoria" => $nombre_gasto,
                        "estado_cat_gasto" => $estado_gasto,
                        "descripcion_categoria" => $desc,
                    );
                    $this->db->where('id_categoria', $id_gasto);
                    $this->db->update('categoria_gastos', $data);
                    return 0;
                else:
                    return 2;
                endif;
            }
        endif;
    }

//ADMINISTRACION DE CAJA
    function registrar_key($num_maquina, $key_base, $key_out, $total_key, $hora, $min, $dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->where('num_maquina', $num_maquina);
        $this->db->where('dia_key', $dia);
        $this->db->where('mes_key', $mes);
        $this->db->where('ano_key', $ano);
        $cantidad = $this->db->get('key')->num_rows();
        if ($cantidad == 0):
            $data = array(
                "num_maquina" => $num_maquina,
                "key_base" => $key_base,
                "key_out" => $key_out,
                "total_key" => $total_key,
                "hora_key" => $hora,
                "min_key" => $min,
                "dia_key" => $dia,
                "mes_key" => $mes,
                "ano_key" => $ano,
            );
            $this->db->insert("key", $data);
            return 0;
        else:
            return 1;
        endif;
    }

    function ingresar_aumento($monto_aumento, $hora, $min, $dia, $mes, $ano) {
        $data = array(
            "monto_aumento" => $monto_aumento,
            "hora_aumento" => $hora,
            "min_aumento" => $min,
            "dia_aumento" => $dia,
            "mes_aumento" => $mes,
            "ano_aumento" => $ano,
            "cierre_aumento" => '0',
        );
        $this->db->insert("aumento", $data);
        return 0;
    }

//ESTADISTICAS ADMIN DIARIO
    function diario_keys($dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->where('dia_key', $dia);
        $this->db->where('mes_key', $mes);
        $this->db->where('ano_key', $ano);
        return $this->db->get('key');
    }

    function diario_aumentos($dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->where('dia_aumento', $dia);
        $this->db->where('mes_aumento', $mes);
        $this->db->where('ano_aumento', $ano);
        return $this->db->get('aumento');
    }

    function diario_pagos($dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->from('pago');
        $this->db->join('usuario', 'pago.id_usuario = usuario.id_usuario');
        $this->db->where('dia_pago', $dia);
        $this->db->where('mes_pago', $mes);
        $this->db->where('ano_pago', $ano);
        return $this->db->get();
    }

    function diario_gastos($dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->from('gastos');
        $this->db->join('usuario', 'gastos.id_usuario = usuario.id_usuario');
        $this->db->join('categoria_gastos', 'gastos.id_categoria = categoria_gastos.id_categoria');
        $this->db->where('dia_gasto', $dia);
        $this->db->where('mes_gasto', $mes);
        $this->db->where('ano_gasto', $ano);
        return $this->db->get();
    }

    function diario_cierres($dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->from('cuadratura_caja');
        $this->db->join('usuario', 'cuadratura_caja.id_usuario = usuario.id_usuario');
        $this->db->where('dia_cuadratura', $dia);
        $this->db->where('mes_cuadratura', $mes);
        $this->db->where('ano_cuadratura', $ano);
        return $this->db->get();
    }

    //ESTADISTICAS ADMIN MENSUAL
    function mensual_keys($mes, $ano) {
        $this->db->select('*');
        $this->db->where('mes_key', $mes);
        $this->db->where('ano_key', $ano);
        return $this->db->get('key');
    }

    function mensual_aumentos($mes, $ano) {
        $this->db->select('*');
        $this->db->where('mes_aumento', $mes);
        $this->db->where('ano_aumento', $ano);
        return $this->db->get('aumento');
    }

    function mensual_pagos($mes, $ano) {
        $this->db->select('num_maquina');
        $this->db->select_sum('monto_pago');
        $this->db->where('mes_pago', $mes);
        $this->db->where('ano_pago', $ano);
        $this->db->where('estado_pago', 0);
        $this->db->from('pago');
        $this->db->group_by('num_maquina');
        return $this->db->get();
    }

    function mensual_gastos($mes, $ano) {
        $this->db->select('nombre_categoria');
        $this->db->select_sum('monto_gasto');
        $this->db->from('gastos');
        $this->db->join('categoria_gastos', 'gastos.id_categoria = categoria_gastos.id_categoria');
        $this->db->where('mes_gasto', $mes);
        $this->db->where('ano_gasto', $ano);
        $this->db->group_by('nombre_categoria');
        return $this->db->get();
    }

    function mensual_cierres($mes, $ano) {
        $this->db->select('*');
        $this->db->from('cuadratura_caja');
        $this->db->join('usuario', 'cuadratura_caja.id_usuario = usuario.id_usuario');
        $this->db->where('mes_cuadratura', $mes);
        $this->db->where('ano_cuadratura', $ano);
        return $this->db->get();
    }

    //ESTADISTICAS ADMIN ANUAL
    function anual_keys($ano) {
        $this->db->select('num_maquina');
        $this->db->select_sum('key_base');
        $this->db->select_sum('key_out');
        $this->db->select_sum('total_key');
        $this->db->where('ano_key', $ano);
        $this->db->from('key');
        $this->db->group_by('num_maquina');
        return $this->db->get();
    }

    function anual_aumentos($ano) {
        $this->db->select('mes_aumento');
        $this->db->select_sum('monto_aumento');
        $this->db->where('ano_aumento', $ano);
        $this->db->from('aumento');
        $this->db->group_by('mes_aumento');
        return $this->db->get();
    }

    function anual_pagos($ano) {
        $this->db->select('num_maquina');
        $this->db->select_sum('monto_pago');
        $this->db->where('ano_pago', $ano);
        $this->db->where('estado_pago', 0);
        $this->db->from('pago');
        $this->db->group_by('num_maquina');
        return $this->db->get();
    }

    function anual_gastos($ano) {
        $this->db->select('nombre_categoria');
        $this->db->select_sum('monto_gasto');
        $this->db->from('gastos');
        $this->db->join('categoria_gastos', 'gastos.id_categoria = categoria_gastos.id_categoria');
        $this->db->where('ano_gasto', $ano);
        $this->db->group_by('nombre_categoria');
        return $this->db->get();
    }

    function anual_cierres($ano) {
        $this->db->select('mes_cuadratura');
        $this->db->select_avg('total_aumentos');
        $this->db->select_avg('total_pagos');
        $this->db->select_avg('caja_anterior');
        $this->db->select_avg('total_caja');
        $this->db->where('ano_cuadratura', $ano);
        $this->db->from('cuadratura_caja');
        $this->db->group_by('mes_cuadratura');
        return $this->db->get();
    }

//MANTENEDOR PAGO
    function guardar_pago($num_maquina, $monto_pago, $min, $horas, $dia, $mes, $ano, $id_user) {
        $data = array(
            "num_maquina" => $num_maquina,
            "monto_pago" => $monto_pago,
            "hora_pago" => $horas,
            "min_pago" => $min,
            "dia_pago" => $dia,
            "mes_pago" => $mes,
            "ano_pago" => $ano,
            "id_usuario" => $id_user,
            "cierre_pago" => '0',
        );
        $this->db->insert("pago", $data);
        return 0;
    }

    function guardar_cgasto($id_categoria, $monto_gasto, $detalle, $min, $horas, $dia, $mes, $ano, $id_user) {
        $data = array(
            "id_categoria" => $id_categoria,
            "monto_gasto" => $monto_gasto,
            "id_usuario" => $id_user,
            "obs_gasto" => $detalle,
            "hora_gasto" => $horas,
            "min_gasto" => $min,
            "dia_gasto" => $dia,
            "mes_gasto" => $mes,
            "ano_gasto" => $ano,
            "cierre_gasto" => '0',
        );
        $this->db->insert("gastos", $data);
        return 0;
    }

    function cargar_pagos($id_user, $dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->where('id_usuario', $id_user);
        $this->db->where('dia_pago', $dia);
        $this->db->where('mes_pago', $mes);
        $this->db->where('ano_pago', $ano);
        $this->db->where('estado_pago', '0');
        $this->db->from('pago');
        $this->db->order_by('id_pago', 'DESC');
        $this->db->limit(3);
        return $this->db->get();
    }

    function ver_pago($id_pago) {
        $this->db->select('*');
        $this->db->where('id_pago', $id_pago);
        return $this->db->get('pago');
    }

    function editar_pago($id_pago, $monto_pago, $coment, $num_maquina, $estado, $hora, $min, $dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->where('id_pago', $id_pago);
        $cantidad = $this->db->get('pago')->num_rows();
        $user = $this->session->userdata('id_user');
        $data = array(
            "num_maquina" => $num_maquina,
            "monto_pago" => $monto_pago,
            "hora_pago" => $hora,
            "min_pago" => $min,
            "dia_pago" => $dia,
            "mes_pago" => $mes,
            "ano_pago" => $ano,
            "estado_pago" => '0',
            "edit_pago" => $id_pago,
            "id_usuario" => $user,
        );
        $this->db->where('id_pago', $id_pago);
        $this->db->insert('pago', $data);

        $datos = array(
            "estado_pago" => $estado,
            "coment_edit" => $coment,
        );
        $this->db->where('id_pago', $id_pago);
        $this->db->update('pago', $datos);

        return 0;
    }

    function pagos_cuadratura() {
        $this->db->select('monto_pago');
        $this->db->where('cierre_pago', '0');
        return $this->db->get('pago');
    }

    function aumento_cuadratura() {
        $this->db->select('monto_aumento');
        $this->db->where('cierre_aumento', '0');
        return $this->db->get('aumento');
    }

    function gastos_cuadratura() {
        $this->db->select('monto_gasto');
        $this->db->where('cierre_gasto', '0');
        return $this->db->get('gastos');
    }

    function caja_anterior() {
        $this->db->select('total_caja');
        $this->db->from('cuadratura_caja');
        $this->db->order_by('id_caja', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    function guarda_cuadratura($total_caja, $total_aumentos, $total_pagos, $caja_anterior,$total_gastos, $dia, $mes, $ano, $min, $hora, $id_user, $b_20, $b_10, $b_5, $b_1, $monedas, $total_cajero, $diferencia) {
        $data = array(
            "total_aumentos" => $total_aumentos,
            "total_pagos" => $total_pagos,
            "total_gastos" => $total_gastos,
            "caja_anterior" => $caja_anterior,
            "total_caja" => $total_caja,
            "hora_cuadratura" => $hora,
            "min_cuadratura" => $min,
            "dia_cuadratura" => $dia,
            "mes_cuadratura" => $mes,
            "ano_cuadratura" => $ano,
            "id_usuario" => $id_user,
            "b_20000" => $b_20,
            "b_10000" => $b_10,
            "b_5000" => $b_5,
            "b_1000" => $b_1,
            "monedas" => $monedas,
            "total_cajero" => $total_cajero,
            "diferencia_caja" => $diferencia,
        );
        $this->db->insert("cuadratura_caja", $data);
        
        $dato = array(
            "cierre_aumento" => '1',
        );
        $this->db->where('cierre_aumento', '0');
        $this->db->update("aumento", $dato);

        $dat = array(
            "cierre_pago" => '1',
        );

        $this->db->where('cierre_pago', '0');
        $this->db->update("pago", $dat);
        
          $data = array(
            "cierre_gasto" => '1',
        );

        $this->db->where('cierre_gasto', '0');
        $this->db->update("gastos", $data);
    }

    function ver_cuadratura($id_user, $dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->where('dia_cuadratura', $dia);
        $this->db->where('mes_cuadratura', $mes);
        $this->db->where('ano_cuadratura', $ano);
        $this->db->where('id_usuario', $id_user);
        return $this->db->get('cuadratura_caja');
    }

}
?>


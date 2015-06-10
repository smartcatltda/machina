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

    function guardar_maquina($num_maquina, $estado, $obs) {
        $this->db->select('num_maquina');
        $this->db->where('num_maquina', $num_maquina);
        $cantidad = $this->db->get('maquina')->num_rows();
        if ($cantidad == 0):
            $data = array(
                "num_maquina" => $num_maquina,
                "estado" => $estado,
                "obs" => $obs,
            );
            $this->db->insert("maquina", $data);
            return 0;
        else:
            return 1;
        endif;
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
    function registrar_key($num_maquina, $key_in, $key_out, $total_key, $hora, $min, $dia, $mes, $ano) {
        $this->db->select('*');
        $this->db->where('num_maquina', $num_maquina);
        $this->db->where('dia_key', $dia);
        $this->db->where('mes_key', $mes);
        $this->db->where('ano_key', $ano);
        $cantidad = $this->db->get('key')->num_rows();
        if ($cantidad == 0):
            $data = array(
                "num_maquina" => $num_maquina,
                "key_in" => $key_in,
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
        $this->db->where('estado_pago','0');
        $this->db->from('pago');
        $this->db->order_by('id_pago','DESC');
        $this->db->limit(3);
        return $this->db->get();
    }

    function ver_pago($id_pago) {
        $this->db->select('*');
        $this->db->where('id_pago', $id_pago);
        return $this->db->get('pago');
    }

    function editar_pago($id_pago, $monto_pago, $hora, $min) {
        $this->db->select('*');
        $this->db->where('id_pago', $id_pago);
        $cantidad = $this->db->get('pago')->num_rows();
        if ($cantidad > 0):
            $data = array(
                "monto_pago" => $monto_pago,
                "hora_pago" => $hora,
                "min_pago" => $min,
            );
            $this->db->where('id_pago', $id_pago);
            $this->db->update('pago', $data);
            return 0;
        else:
            return 1;
        endif;
    }

}
?>


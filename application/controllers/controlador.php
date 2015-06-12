<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controlador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("modelo");
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('content');
        $this->load->view('footer');
    }

    function conectar() {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $valor = 0;
        $permiso = "";
        $nombre = "";
        $apellido = "";
        $id_user = "";
        $mensaje = "Usuario o Contraseña Incorrectos";
        $cookie = array('user' => '', 'permiso' => '', 'esta logeado' => false);
        if ($this->modelo->conectar($user, $pass) == 1) {
            $valor = 1;
            $permiso = $this->modelo->permiso($user)->result();
            foreach ($permiso as $fila) {
                $id_user = $fila->id_usuario;
                $permiso = $fila->tipo;
                $nombre = $fila->nombre;
                $apellido = $fila->apellido;
            }
            if ($permiso == 0) {
                $mensaje = "El usuario no tiene los permisos necesarios para acceder al sistema";
                $valor = 0;
            } else {
                $cookie = array('user' => $user, 'permiso' => $permiso, 'nombre' => $nombre, 'apellido' => $apellido, 'id_user' => $id_user, 'esta logeado' => true);
            }
            $this->session->set_userdata($cookie);
        }
        echo json_encode(array('valor' => $valor, 'user' => $user, 'permiso' => $permiso, 'nombre' => $nombre, 'apellido' => $apellido, 'id_user' => $id_user, 'mensaje' => $mensaje));
    }

    function verificalogin() {
        $valor = 0;
        $permiso = '';
        $nombre = '';
        $apellido = '';
        if ($this->session->userdata('esta logeado') == true) {
            $valor = 1;
            $permiso = $this->session->userdata('permiso');
            $nombre = $this->session->userdata('nombre');
            $apellido = $this->session->userdata('apellido');
        }
        echo json_encode(array('valor' => $valor, 'permiso' => $permiso, 'nombre' => $nombre, 'apellido' => $apellido));
    }

    function salir() {
        $valor = 0;
        $cookie = array('user' => '', 'permiso' => '', 'esta logeado' => false);
        $this->session->set_userdata($cookie);
        echo json_encode(array('valor' => $valor));
    }

//    MANTENEDOR USUARIOS
    function mostrar_user() {
        $datos = $this->modelo->mostrar_user();
        $data ['cantidad'] = $datos->num_rows();
        $data ['usuarios'] = $datos->result();
        $this->load->view('ListaUsuarios', $data);
    }

    function guardar_user() {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $tipo = $this->input->post('tipo');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $valor = 0;
        $msg = "Usuario Ya Registrado en el Sistema";
        if ($this->modelo->guardar_user($nombre, $apellido, $user, $pass, $tipo) == 0) {
            $msg = "Guardado Correctamente";
            $valor = 1;
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
    }

    function seleccionar_user() {
        $user = $this->input->post('user');
        $datos = $this->modelo->ver($user);
        $data = $datos->result();
        $contador = $datos->num_rows();
        if ($contador > 0) {
            foreach ($data as $fila) {
                $id = $fila->id_usuario;
                $user = $fila->user;
                $pass = $fila->pass;
                $tipo = $fila->tipo;
                $nombre = $fila->nombre;
                $apellido = $fila->apellido;
            }
            $valor = 0;
            echo json_encode(array("id" => $id, "valor" => $valor, "nombre" => $nombre, "apellido" => $apellido, "user" => $user, "pass" => $pass, "tipo" => $tipo));
        } else {
            $valor = 1;
            echo json_encode(array("valor" => $valor));
        }
    }

    function modificar_user() {
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $tipo = $this->input->post('tipo');
        $valor = 1;
        if ($this->modelo->modificar_user($id, $nombre, $apellido, $user, $pass, $tipo) == 0) {
            $valor = 0;
        } else {
            if ($this->modelo->modificar_user($id, $nombre, $apellido, $user, $pass, $tipo) == 2) {
                $valor = 2;
            }
        }
        echo json_encode(array("valor" => $valor));
    }

    //MANTENEDOR MAQUINAS
    function mostrar_maquinas() {
        $datos = $this->modelo->mostrar_maquinas();
        $data ['cantidad'] = $datos->num_rows();
        $data ['maquinas'] = $datos->result();
        $this->load->view('ListaMaquinas', $data);
    }

    function cargar_maquinas() {
        $datos["maquinas"] = $this->modelo->mostrar_maquinas()->result();
        $this->load->view("maquinas", $datos);
    }

    function cargar_maquinas_activas() {
        $datos["maquinas"] = $this->modelo->mostrar_maquinas()->result();
        $this->load->view("maquinas_activas", $datos);
    }

    function guardar_maquina() {
        $num_maquina = $this->input->post('num_maquina');
        $estado = $this->input->post('estado');
        $obs = $this->input->post('obs');
        $valor = 0;
        $msg = "Maquina Ya Registrada en el Sistema";
        if ($this->modelo->guardar_maquina($num_maquina, $estado, $obs) == 0) {
            $msg = "Maquina Guardada Correctamente";
            $valor = 1;
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
    }

    function seleccionar_maquina() {
        $num_maquina = $this->input->post('num_maquina');
        $datos = $this->modelo->ver_maquinas($num_maquina);
        $data = $datos->result();
        $contador = $datos->num_rows();
        if ($contador > 0) {
            foreach ($data as $fila) {
                $num_maquina = $fila->num_maquina;
                $estado = $fila->estado;
                $obs = $fila->obs;
            }
            $valor = 0;
            echo json_encode(array("valor" => $valor, "num_maquina" => $num_maquina, "estado" => $estado, "obs" => $obs));
        } else {
            $valor = 1;
            echo json_encode(array("valor" => $valor));
        }
    }

    function modificar_maquina() {
        $num_maquina = $this->input->post('num_maquina');
        $estado = $this->input->post('estado');
        $obs = $this->input->post('obs');
        $valor = 1;
        if ($this->modelo->modificar_maquina($num_maquina, $estado, $obs) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    //MANTENEDOR GASTOS
    function cargar_cat_gastos() {
        $datos = $this->modelo->cargar_cat_gasto();
        $data ['cantidad'] = $datos->num_rows();
        $data ['gastos'] = $datos->result();
        $this->load->view('ListaGastos', $data);
    }

    function guardar_cat_gasto() {
        $nombre_gasto = $this->input->post('nombre_gasto');
        $desc = $this->input->post('desc');
        $estado_gasto = $this->input->post('estado_gasto');
        $valor = 0;
        $msg = "Gasto Ya Registrado";
        if ($this->modelo->guardar_cat_gasto($nombre_gasto, $estado_gasto, $desc) == 0) {
            $msg = "Gasto Guardado Correctamente";
            $valor = 1;
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
    }

    function seleccionar_cat_gasto() {
        $nombre_gasto = $this->input->post('nombre_gasto');
        $datos = $this->modelo->ver_gastos($nombre_gasto);
        $data = $datos->result();
        $contador = $datos->num_rows();
        if ($contador > 0) {
            foreach ($data as $fila) {
                $id_cat_gasto = $fila->id_categoria;
                $nombre_gasto = $fila->nombre_categoria;
                $estado_cat_gasto = $fila->estado_cat_gasto;
                $desc = $fila->descripcion_categoria;
            }
            $valor = 0;
            echo json_encode(array("id_cat_gasto" => $id_cat_gasto, "nombre_gasto" => $nombre_gasto, "estado_cat_gasto" => $estado_cat_gasto, "desc" => $desc));
        } else {
            $valor = 1;
            echo json_encode(array("valor" => $valor));
        }
    }

    function editar_gasto() {
        $id_gasto = $this->input->post('id_gasto');
        $nombre_gasto = $this->input->post('nombre_gasto');
        $estado_gasto = $this->input->post('estado_gasto');
        $desc = $this->input->post('desc');
        $valor = 1;
        if ($this->modelo->editar_gasto($id_gasto, $nombre_gasto, $estado_gasto, $desc) == 0) {
            $valor = 0;
        } else {
            if ($this->modelo->editar_gasto($id_gasto, $nombre_gasto, $estado_gasto, $desc) == 2) {
                $valor = 2;
            }
        }
        echo json_encode(array("valor" => $valor));
    }

    function cargar_gastos_activos() {
        $datos["gastos"] = $this->modelo->cargar_cat_gasto()->result();
        $this->load->view("gastos_activos", $datos);
    }

//ADMINISTRACION DE CAJA
    function diferencia_keys() {
        $key_in = $this->input->post('key_in');
        $key_out = $this->input->post('key_out');
        $total = $key_in - $key_out;
        echo json_encode(array("total" => $total));
    }

    function sumatoria_keys() {
        $key_in = $this->input->post('key_in');
        $key_out = $this->input->post('key_out');
        $total_key = $this->input->post('total_key');
        $total_in = $this->input->post('total_in') + $key_in;
        $total_out = $this->input->post('total_out') + $key_out;
        $acumulado = $this->input->post('acumulado') + $total_key;

        echo json_encode(array("total_in" => $total_in, "total_out" => $total_out, "acumulado" => $acumulado));
    }

    function registrar_key() {
        $num_maquina = $this->input->post('num_maquina');
        $key_in = $this->input->post('key_in');
        $key_out = $this->input->post('key_out');
        $total_key = $this->input->post('total_key');
        $hora = $this->input->post('hora');
        $min = $this->input->post('min');
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        if ($this->modelo->registrar_key($num_maquina, $key_in, $key_out, $total_key, $hora, $min, $dia, $mes, $ano) == 0) {
            $msg = "Key Registrada Correctamente";
            $valor = 1;
        } else {
            $msg = "Hoy ya ha Ingresado las Keys de esta Maquina";
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
    }

    function ingresar_aumento() {
        $monto_aumento = $this->input->post('monto_aumento');
        $hora = $this->input->post('hora');
        $min = $this->input->post('min');
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        $valor = 0;
        if ($this->modelo->ingresar_aumento($monto_aumento, $hora, $min, $dia, $mes, $ano) == 0) {
            $msg = "Aumento Registrado Correctamente";
            $valor = 1;
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
    }

//ESTADISTICAS ADMIN
    function informe_diario() {
        $tipo = $this->input->post('tipo');
        $fecha = $this->input->post('fecha');
        list($mes, $dia, $ano) = explode("/", $fecha);
        if ($tipo == "k") {
            $datos["diario_keys"] = $this->modelo->diario_keys($dia, $mes, $ano)->result();
            $datos["cantidad"] = $this->modelo->diario_keys($dia, $mes, $ano)->num_rows();
            $this->load->view("diario_keys", $datos);
        } else {
            if ($tipo == "a") {
                $datos["diario_aumentos"] = $this->modelo->diario_aumentos($dia, $mes, $ano)->result();
                $datos["cantidad"] = $this->modelo->diario_aumentos($dia, $mes, $ano)->num_rows();
                $this->load->view("diario_aumentos", $datos);
            } else {
                if ($tipo == "p") {
                    $datos["diario_pagos"] = $this->modelo->diario_pagos($dia, $mes, $ano)->result();
                    $datos["cantidad"] = $this->modelo->diario_pagos($dia, $mes, $ano)->num_rows();
                    $this->load->view("diario_pagos", $datos);
                } else {
                    if ($tipo == "g") {
                        $datos["diario_gastos"] = $this->modelo->diario_gastos($dia, $mes, $ano)->result();
                        $datos["cantidad"] = $this->modelo->diario_gastos($dia, $mes, $ano)->num_rows();
                        $this->load->view("diario_gastos", $datos);
                    } else {

                        $datos["diario_cierres"] = $this->modelo->diario_cierres($dia, $mes, $ano)->result();
                        $datos["cantidad"] = $this->modelo->diario_cierres($dia, $mes, $ano)->num_rows();
                        $this->load->view("diario_cierres", $datos);
                    }
                }
            }
        }
    }

    function informe_mensual() {
        $tipo = $this->input->post('tipo');
        $fecha = $this->input->post('fecha');
        list($mes, $dia, $ano) = explode("/", $fecha);
        if ($tipo == "k") {
            $datos["mensual_keys"] = $this->modelo->mensual_keys($mes, $ano)->result();
            $datos["cantidad"] = $this->modelo->mensual_keys($mes, $ano)->num_rows();
            $this->load->view("mensual_keys", $datos);
        } else {
            if ($tipo == "a") {
                $datos["mensual_aumentos"] = $this->modelo->mensual_aumentos($mes, $ano)->result();
                $datos["cantidad"] = $this->modelo->mensual_aumentos($mes, $ano)->num_rows();
                $this->load->view("mensual_aumentos", $datos);
            } else {
                if ($tipo == "p") {
                    $datos["mensual_pagos"] = $this->modelo->mensual_pagos($mes, $ano)->result();
                    $datos["cantidad"] = $this->modelo->mensual_pagos($mes, $ano)->num_rows();
                    $this->load->view("mensual_pagos", $datos);
                } else {
                    if ($tipo == "g") {
                        $datos["mensual_gastos"] = $this->modelo->mensual_gastos($mes, $ano)->result();
                        $datos["cantidad"] = $this->modelo->mensual_gastos($mes, $ano)->num_rows();
                        $this->load->view("mensual_gastos", $datos);
                    } else {
                        $datos["mensual_cierres"] = $this->modelo->mensual_cierres($mes, $ano)->result();
                        $datos["cantidad"] = $this->modelo->mensual_cierres($mes, $ano)->num_rows();
                        $this->load->view("mensual_cierres", $datos);
                    }
                }
            }
        }
    }

    function informe_anual() {
        $tipo = $this->input->post('tipo');
        $fecha = $this->input->post('fecha');
        list($mes, $dia, $ano) = explode("/", $fecha);
        if ($tipo == "k") {
            $datos["anual_keys"] = $this->modelo->anual_keys($ano)->result();
            $datos["cantidad"] = $this->modelo->anual_keys($ano)->num_rows();
            $this->load->view("anual_keys", $datos);
        } else {
            if ($tipo == "a") {
                $datos["anual_aumentos"] = $this->modelo->anual_aumentos($ano)->result();
                $datos["cantidad"] = $this->modelo->anual_aumentos($ano)->num_rows();
                $this->load->view("anual_aumentos", $datos);
            } else {
                if ($tipo == "p") {
                    $datos["anual_pagos"] = $this->modelo->anual_pagos($ano)->result();
                    $datos["cantidad"] = $this->modelo->anual_pagos($ano)->num_rows();
                    $this->load->view("anual_pagos", $datos);
                } else {
                    if ($tipo == "g") {
                        $datos["anual_gastos"] = $this->modelo->anual_gastos($ano)->result();
                        $datos["cantidad"] = $this->modelo->anual_gastos($ano)->num_rows();
                        $this->load->view("anual_gastos", $datos);
                    } else {
                        $datos["anual_cierres"] = $this->modelo->anual_cierres($ano)->result();
                        $datos["cantidad"] = $this->modelo->anual_cierres($ano)->num_rows();
                        $this->load->view("anual_cierres", $datos);
                    }
                }
            }
        }
    }

//MANTENEDOR PAGO
    function guardar_pago() {
        $num_maquina = $this->input->post('num_maquina');
        $monto_pago = $this->input->post('monto_pago');
        $min = $this->input->post('min');
        $horas = $this->input->post('horas');
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        $id_user = $this->session->userdata('id_user');
        $valor = 0;
        if ($this->modelo->guardar_pago($num_maquina, $monto_pago, $min, $horas, $dia, $mes, $ano, $id_user) == 0) {
            $msg = "Pago Guardado Correctamente";
            $valor = 1;
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
    }

    function guardar_cgasto() {
        $id_categoria = $this->input->post('id_categoria');
        $monto_gasto = $this->input->post('monto_gasto');
        $detalle = $this->input->post('detalle');
        $min = $this->input->post('min');
        $horas = $this->input->post('horas');
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        $id_user = $this->session->userdata('id_user');
        $valor = 0;
        if ($this->modelo->guardar_cgasto($id_categoria, $monto_gasto, $detalle, $min, $horas, $dia, $mes, $ano, $id_user) == 0) {
            $msg = "Gasto Guardado Correctamente";
            $valor = 1;
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
    }

    function cargar_pagos() {
        $id_user = $this->session->userdata('id_user');
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        $datos['pagos'] = $this->modelo->cargar_pagos($id_user, $dia, $mes, $ano)->result();
        $datos['cantidad'] = $this->modelo->cargar_pagos($id_user, $dia, $mes, $ano)->num_rows();
        $this->load->view("ListaPagos", $datos);
    }

    function seleccionar_pago() {
        $id_pago = $this->input->post('id_pago');
        $datos = $this->modelo->ver_pago($id_pago);
        $data = $datos->result();
        foreach ($data as $fila) {
            $id_pago = $fila->id_pago;
            $num_maquina = $fila->num_maquina;
            $monto_pago = $fila->monto_pago;
        }
        echo json_encode(array("id_pago" => $id_pago, "num_maquina" => $num_maquina, "monto_pago" => $monto_pago));
    }

    function editar_pago() {
        $id_pago = $this->input->post('id_pago');
        $num_maquina = $this->input->post('num_maquina');
        $monto_pago = $this->input->post('monto_pago');
        $coment = $this->input->post('coment');
        $estado = 1;
        $hora = $this->input->post('horas');
        $min = $this->input->post('min');
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        if ($this->modelo->editar_pago($id_pago, $monto_pago, $coment, $num_maquina, $estado, $hora, $min, $dia, $mes, $ano) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

    function informe_cuadratura() {
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        $hora = $this->input->post('hora');
        $min = $this->input->post('min');
        $id_user = $this->session->userdata('id_user');

        if ($this->modelo->caja_anterior($dia, $mes, $ano, $id_user)->num_rows() == 0):
            $caja_anterior = 0;
        else:
            $arr = $this->modelo->caja_anterior($dia, $mes, $ano, $id_user)->result();
            $sum = 0;
            foreach ($arr as $fila) {
                $sum += intval($fila->total_caja);
            }
            $caja_anterior = $sum;
        endif;

        if ($this->modelo->aumento_cuadratura($dia, $mes, $ano)->num_rows() == 0):
            $total_aumentos = 0;
        else:
            $data = $this->modelo->aumento_cuadratura($dia, $mes, $ano)->result();
            foreach ($data as $fila) {
                $acum+=intval($fila->monto_aumento);
            }
            $total_aumentos = $acum;
        endif;

        if ($this->modelo->pagos_cuadratura($dia, $mes, $ano, $id_user)->num_rows() == 0):
            $total_pagos = 0;
        else:
            $dat = $this->modelo->pagos_cuadratura($dia, $mes, $ano, $id_user)->result();
            $suma = 0;
            foreach ($dat as $fila) {
                $suma+=intval($fila->monto_pago);
            }
            $total_pagos = $suma;
        endif;
        $total_caja = $caja_anterior + $total_aumentos - $total_pagos;
        $this->modelo->guarda_cuadratura($total_caja, $total_aumentos, $total_pagos, $caja_anterior, $dia, $mes, $ano, $min, $hora, $id_user);
        $datos['totales'] = $this->modelo->ver_cuadratura($id_user, $dia, $mes, $ano)->result();
        $this->load->view("ListaCuadratura", $datos);
    }

}

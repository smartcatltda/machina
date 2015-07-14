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
        $pass = md5($this->input->post('pass'));
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
                $mensaje = "EL usuario no cuenta con los permisos necesarios para acceder al Sistema";
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
        $cookie = array('user' => '', 'permiso' => '', 'nombre' => '', 'apellido' => '', 'id_user' => '', 'esta logeado' => false);
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
        $pass = md5($this->input->post('pass'));
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
//                $pass = $fila->pass;
                $tipo = $fila->tipo;
                $nombre = $fila->nombre;
                $apellido = $fila->apellido;
            }
            $valor = 0;
            echo json_encode(array("id" => $id, "valor" => $valor, "nombre" => $nombre, "apellido" => $apellido, "user" => $user, "tipo" => $tipo));
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
        if ($pass == "") {
            if ($this->modelo->modificar_user($id, $nombre, $apellido, $user, $tipo) == 0) {
                $valor = 0;
            } else {
                if ($this->modelo->modificar_user($id, $nombre, $apellido, $user, $tipo) == 2) {
                    $valor = 2;
                }
            }
        } else {
            if ($this->modelo->modificar_user_pass($id, $nombre, $apellido, $user, md5($pass), $tipo) == 0) {
                $valor = 0;
            } else {
                if ($this->modelo->modificar_user_pass($id, $nombre, $apellido, $user, md5($pass), $tipo) == 2) {
                    $valor = 2;
                }
            }
        }
        echo json_encode(array("valor" => $valor));
    }

    //MANTENEDOR MAQUINAS
    function mostrar_maquinas() {
        $datos = $this->modelo->mostrar_maquinas_activas();
        $data ['cantidad'] = $datos->num_rows();
        $data ['maquinas'] = $datos->result();
        $this->load->view('ListaMaquinas', $data);
    }

    function cargar_maquinas() {
        $datos["maquinas"] = $this->modelo->mostrar_maquinas()->result();
        $this->load->view("maquinas", $datos);
    }

    function cargar_maquinas_activas() {
        $datos["maquinas"] = $this->modelo->mostrar_maquinas_activas()->result();
        $this->load->view("maquinas_activas", $datos);
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

    function cargar_cajeros() {
        $datos["usuarios"] = $this->modelo->mostrar_user()->result();
        $datos["cantidad"] = $this->modelo->mostrar_user()->num_rows();
        $this->load->view("cajeros", $datos);
    }

    function diferencia_keys() {
        $key_base = $this->input->post('key_base');
        $key_out = $this->input->post('key_out');
        $total = $key_out - $key_base;
        echo json_encode(array("total" => $total));
    }

    function sumatoria_keys() {
        $key_base = $this->input->post('key_base');
        $key_out = $this->input->post('key_out');
        $total_key = $this->input->post('total_key');
        $total_base = $this->input->post('total_base') + $key_base;
        $total_out = $this->input->post('total_out') + $key_out;
        $acumulado = $this->input->post('acumulado') + $total_key;

        echo json_encode(array("total_base" => $total_base, "total_out" => $total_out, "acumulado" => $acumulado));
    }

    function registrar_key() {
        $num_maquina = $this->input->post('num_maquina');
        $key_base = $this->input->post('key_base');
        $key_out = $this->input->post('key_out');
        $total_key = $this->input->post('total_key');
        $hora = $this->input->post('hora');
        $min = $this->input->post('min');
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        if ($key_base > $key_out) {
            $msg = "El Key out no puede ser menor que el Key base";
            $valor = 0;
        } else {
            if ($this->modelo->registrar_key($num_maquina, $key_base, $key_out, $total_key, $hora, $min, $dia, $mes, $ano) == 0) {
                $msg = "Key Registrada Correctamente";
                $valor = 1;
            } else {
                $msg = "Hoy ya ha Ingresado las Keys de esta Maquina";
                $valor = 0;
            }
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
    }

    function ingresar_aumento() {
        $user = $this->input->post('user');
        $monto_aumento = $this->input->post('monto_aumento');
        $hora = $this->input->post('hora');
        $min = $this->input->post('min');
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        $valor = 0;
        if ($this->modelo->ingresar_aumento($user, $monto_aumento, $hora, $min, $dia, $mes, $ano) == 0) {
            $msg = "Aumento Registrado Correctamente";
            $valor = 1;
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
    }

//ESTADISTICAS ADMIN
    function informe_diario() {
        $tipo = $this->input->post('tipo');
        $fecha = $this->input->post('fecha');
        list($dia, $mes, $ano) = explode("/", $fecha);
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
                    if ($tipo == "rp") {
                        $datos["diario_resumen_pagos"] = $this->modelo->diario_resumen_pagos($dia, $mes, $ano)->result();
                        $datos["cantidad"] = $this->modelo->diario_resumen_pagos($dia, $mes, $ano)->num_rows();
                        $this->load->view("diario_resumen_pagos", $datos);
                    } else {
                        if ($tipo == "g") {
                            $datos["diario_gastos"] = $this->modelo->diario_gastos($dia, $mes, $ano)->result();
                            $datos["cantidad"] = $this->modelo->diario_gastos($dia, $mes, $ano)->num_rows();
                            $this->load->view("diario_gastos", $datos);
                        } else {
                            if ($tipo == "rg") {
                                $datos["diario_resumen_gastos"] = $this->modelo->diario_resumen_gastos($dia, $mes, $ano)->result();
                                $datos["cantidad"] = $this->modelo->diario_resumen_gastos($dia, $mes, $ano)->num_rows();
                                $this->load->view("diario_resumen_gastos", $datos);
                            } else {
                                if ($tipo == "c") {
                                    $datos["diario_cierres"] = $this->modelo->diario_cierres($dia, $mes, $ano)->result();
                                    $datos["cantidad"] = $this->modelo->diario_cierres($dia, $mes, $ano)->num_rows();
                                    $this->load->view("diario_cierres", $datos);
                                } else {
                                    $datos["diario_resumen_cierres"] = $this->modelo->diario_resumen_cierres($dia, $mes, $ano)->result();
                                    $datos["cantidad"] = $this->modelo->diario_resumen_cierres($dia, $mes, $ano)->num_rows();
                                    $this->load->view("diario_resumen_cierres", $datos);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function informe_mensual() {
        $tipo = $this->input->post('tipo');
        $fecha = $this->input->post('fecha');
        list($dia, $mes, $ano) = explode("/", $fecha);
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
                if ($tipo == "rp") {
                    $datos["mensual_resumen_pagos"] = $this->modelo->mensual_resumen_pagos($mes, $ano)->result();
                    $datos["cantidad"] = $this->modelo->mensual_resumen_pagos($mes, $ano)->num_rows();
                    $this->load->view("mensual_resumen_pagos", $datos);
                } else {
                    if ($tipo == "rg") {
                        $datos["mensual_resumen_gastos"] = $this->modelo->mensual_resumen_gastos($mes, $ano)->result();
                        $datos["cantidad"] = $this->modelo->mensual_resumen_gastos($mes, $ano)->num_rows();
                        $this->load->view("mensual_resumen_gastos", $datos);
                    } else {
                        if ($tipo == "c") {
                            $datos["mensual_cierres"] = $this->modelo->mensual_cierres($mes, $ano)->result();
                            $datos["cantidad"] = $this->modelo->mensual_cierres($mes, $ano)->num_rows();
                            $this->load->view("mensual_cierres", $datos);
                        } else {
                            $datos["mensual_resumen_cierres"] = $this->modelo->mensual_resumen_cierres($mes, $ano)->result();
                            $datos["cantidad"] = $this->modelo->mensual_resumen_cierres($mes, $ano)->num_rows();
                            $this->load->view("mensual_resumen_cierres", $datos);
                        }
                    }
                }
            }
        }
    }

    function informe_semanal() {
        $tipo = $this->input->post('tipo');
        $fecha1 = date('m-d-Y');
        $fecha2 = date('m-d-Y', strtotime('-1 day'));
        $fecha3 = date('m-d-Y', strtotime('-2 day'));
        $fecha4 = date('m-d-Y', strtotime('-3 day'));
        $fecha5 = date('m-d-Y', strtotime('-4 day'));
        $fecha6 = date('m-d-Y', strtotime('-5 day'));
        $fecha7 = date('m-d-Y', strtotime('-6 day'));
        list($mes1, $dia1, $ano1) = explode("-", $fecha1);
        list($mes2, $dia2, $ano2) = explode("-", $fecha2);
        list($mes3, $dia3, $ano3) = explode("-", $fecha3);
        list($mes4, $dia4, $ano4) = explode("-", $fecha4);
        list($mes5, $dia5, $ano5) = explode("-", $fecha5);
        list($mes6, $dia6, $ano6) = explode("-", $fecha6);
        list($mes7, $dia7, $ano7) = explode("-", $fecha7);
        if ($tipo == "rp") {
            $datos["semanal_resumen_pagos"] = $this->modelo->semanal_resumen_pagos($mes1, $dia1, $ano1, $mes2, $dia2, $ano2, $mes3, $dia3, $ano3, $mes4, $dia4, $ano4, $mes5, $dia5, $ano5, $mes6, $dia6, $ano6, $mes7, $dia7, $ano7)->result();
            $datos["cantidad"] = $this->modelo->semanal_resumen_pagos($mes1, $dia1, $ano1, $mes2, $dia2, $ano2, $mes3, $dia3, $ano3, $mes4, $dia4, $ano4, $mes5, $dia5, $ano5, $mes6, $dia6, $ano6, $mes7, $dia7, $ano7)->num_rows();
            $this->load->view("semanal_resumen_pagos", $datos);
        } else {
            if ($tipo == "rg") {
                $datos["semanal_resumen_gastos"] = $this->modelo->semanal_resumen_gastos($mes1, $dia1, $ano1, $mes2, $dia2, $ano2, $mes3, $dia3, $ano3, $mes4, $dia4, $ano4, $mes5, $dia5, $ano5, $mes6, $dia6, $ano6, $mes7, $dia7, $ano7)->result();
                $datos["cantidad"] = $this->modelo->semanal_resumen_gastos($mes1, $dia1, $ano1, $mes2, $dia2, $ano2, $mes3, $dia3, $ano3, $mes4, $dia4, $ano4, $mes5, $dia5, $ano5, $mes6, $dia6, $ano6, $mes7, $dia7, $ano7)->num_rows();
                $this->load->view("semanal_resumen_gastos", $datos);
            } else {
                $datos["semanal_resumen_cierres"] = $this->modelo->semanal_resumen_cierres($mes1, $dia1, $ano1, $mes2, $dia2, $ano2, $mes3, $dia3, $ano3, $mes4, $dia4, $ano4, $mes5, $dia5, $ano5, $mes6, $dia6, $ano6, $mes7, $dia7, $ano7)->result();
                $datos["cantidad"] = $this->modelo->semanal_resumen_cierres($mes1, $dia1, $ano1, $mes2, $dia2, $ano2, $mes3, $dia3, $ano3, $mes4, $dia4, $ano4, $mes5, $dia5, $ano5, $mes6, $dia6, $ano6, $mes7, $dia7, $ano7)->num_rows();
                $this->load->view("semanal_resumen_cierres", $datos);
            }
        }
    }

//MANTENEDOR PAGO
    function guardar_pago() {
        $num_maquina = $this->input->post('num_maquina');
        $monto_pago = $this->input->post('monto_pago');
        $b_tragado = $this->input->post('b_tragado');
        $min = $this->input->post('min');
        $horas = $this->input->post('horas');
        $dia = $this->input->post('dia');
        $mes = $this->input->post('mes') + 1;
        $ano = $this->input->post('ano');
        $id_user = $this->session->userdata('id_user');
        $valor = 0;
        if ($this->modelo->guardar_pago($num_maquina, $monto_pago, $min, $horas, $dia, $mes, $ano, $id_user, $b_tragado) == 0) {
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
        $b_20 = $this->input->post('b_20');
        $b_10 = $this->input->post('b_10');
        $b_5 = $this->input->post('b_5');
        $b_2 = $this->input->post('b_2');
        $b_1 = $this->input->post('b_1');
        $monedas = $this->input->post('monedas');
        $id_user = $this->session->userdata('id_user');
        if ($this->modelo->caja_anterior($id_user)->num_rows() == 0):
            $caja_anterior = 0;
        else:
            $arr = $this->modelo->caja_anterior($id_user)->result();
            $caja = 0;
            foreach ($arr as $fila) :
                $caja = intval($fila->total_cajero);
            endforeach;
            $caja_anterior = $caja;
        endif;

        if ($this->modelo->aumento_cuadratura($id_user)->num_rows() == 0):
            $total_aumentos = 0;
        else:
            $data = $this->modelo->aumento_cuadratura($id_user)->result();
            $acum = 0;
            foreach ($data as $fila) :
                $acum +=intval($fila->monto_aumento);
            endforeach;
            $total_aumentos = $acum;
        endif;

        if ($this->modelo->pagos_cuadratura($id_user)->num_rows() == 0):
            $total_pagos = 0;
        else:
            $dat = $this->modelo->pagos_cuadratura($id_user)->result();
            $suma = 0;
            foreach ($dat as $fila) :
                $suma+=intval($fila->monto_pago);
            endforeach;
            $total_pagos = $suma;
        endif;

        if ($this->modelo->gastos_cuadratura($id_user)->num_rows() == 0):
            $total_gastos = 0;
        else:
            $datas = $this->modelo->gastos_cuadratura($id_user)->result();
            $i = 0;
            foreach ($datas as $fila) :
                $i+=intval($fila->monto_gasto);
            endforeach;
            $total_gastos = $i;
        endif;

        $total_caja = $caja_anterior + $total_aumentos - $total_pagos - $total_gastos;
        $total_cajero = $b_20 + $b_10 + $b_5 + $b_2 + $b_1 + $monedas;
        $diferencia = $total_cajero - $total_caja;

        $this->modelo->guarda_cuadratura($total_caja, $total_aumentos, $total_pagos, $caja_anterior, $total_gastos, $dia, $mes, $ano, $min, $hora, $id_user, $b_20, $b_10, $b_5, $b_2, $b_1, $monedas, $total_cajero, $diferencia);
        $datos['totales'] = $this->modelo->ver_cuadratura($dia, $mes, $ano, $id_user)->result();
        $this->load->view("ListaCuadratura", $datos);
    }

}

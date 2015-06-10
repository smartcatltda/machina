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
        }else{
            $msg = "Hoy ya ha Ingresado las Keys de esta Maquina";
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor, "msg" => $msg));
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

}

/* End of file controlador.php */
/* Location: ./application/controllers/controlador.php */

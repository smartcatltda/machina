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
        $mensaje = "El usuario no existe en la Base de Datos";
        $cookie = array('user' => '', 'permiso' => '', 'esta logeado' => false);
        if ($this->modelo->conectar($user, $pass) == 1) {
            $valor = 1;
            $permiso = $this->modelo->permiso($user)->result();
            foreach ($permiso as $fila) {
                $permiso = $fila->tipo;
            }
            if ($permiso == 0) {
                $mensaje = "El usuario no tiene los permisos necesarios para acceder al sistema";
                $valor = 0;
            } else {
                $cookie = array('user' => $user, 'permiso' => $permiso, 'esta logeado' => true);
            }
            $this->session->set_userdata($cookie);
        }
        echo json_encode(array('valor' => $valor, 'user' => $user, 'permiso' => $permiso, 'mensaje' => $mensaje));
    }

    function verificalogin() {
        $valor = 0;
        $user = '';
        $permiso = '';
        if ($this->session->userdata('esta logeado') == true) {
            $valor = 1;
            $user = $this->session->userdata('user');
            $permiso = $this->session->userdata('permiso');
        }
        echo json_encode(array('valor' => $valor, 'user' => $user, 'permiso' => $permiso));
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

    function eliminar_user() {
        $user = $this->input->post('user');
        $valor = 1;
        if ($this->modelo->eliminar_user($user) == 0) {
            $valor = 0;
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

    function eliminar_maquina() {
        $id_maquina = $this->input->post('num_maquina');
        $valor = 1;
        if ($this->modelo->eliminar_maquina($id_maquina) == 0) {
            $valor = 0;
        }
        echo json_encode(array("valor" => $valor));
    }

}

/* End of file controlador.php */
/* Location: ./application/controllers/controlador.php */

<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
    parent::__construct();
		$this->load->model('login_model');
		$this->load->library(array('form_validation'));
    $this->load->library('session');
		$this->load->helper(array('url','form'));
		$this->load->database('default');

  }

	public function index()	{
    if($this->session->userdata('is_logued_in') == true){
      redirect(base_url().'welcome');
    }else{
				$data['token'] = $this->token();
        $data['titulo'] = 'Login';
        $data['page'] = 'login_view';
        $data['consulta'] = #;
        $this->load->view('container',$data);
        }
	}

    public function new_user() {
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {

                $this->form_validation->set_rules('user', 'Usuario', 'trim|required|min_length[2]|max_length[50]');
                $this->form_validation->set_rules('password', 'Contraseña', 'trim|required');

                //lanzamos mensajes de error si es que los hay
                if($this->form_validation->run() == FALSE) {
                    $this->index();
                }else{
                    $user = $this->input->post('user');
                    $password = sha1($this->input->post('password'));
                    $check_user = $this->login_model->login_user($user,$password);
                    if($check_user == TRUE)
                    {
                        $data = array(
                          'is_logued_in' 	=> 		TRUE,
                          'id_user'   	  => 		$check_user->id,
                          'full_name'	    =>		$check_user->full_name,
                          'user' 		      => 		$check_user->user,
                        );

                        $this->session->set_userdata($data);echo $this->session->userdata('full_name');
                        $this->index('welcome');
                    }
                }
        } else {
            redirect(base_url());
        }
    }

    public function registro()	{
        $data['token'] = $this->token();
        $data['titulo'] = 'Registro';
        $data['page'] = 'registro_view';
        $data['consulta'] = #;
        $this->load->view('container',$data);

	}


    public function registro_nuevo(){

        //verificacion de token para prevenir insersiones externas
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            //variables validacion de campos
            $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|matches[passconf]');//
            $this->form_validation->set_rules('passconf', 'Confirmar Contraseña', 'trim|required');

            //verificacion de campos
             if($this->form_validation->run() == FALSE) {
                    $this->registro();
                } else {

                //cargar a variables los input del formulario
                $usuario = $this->input->post('usuario');
                $correo = $this->input->post('correo');
                $password = sha1($this->input->post('password'));
                //$passconf = $this->input->post('passconf');
                $nivel_usuario = 1;

///////////////////////////////////////////////////////////////////////////////////////////////////////

        $query = $this->db->get_where('usuarios', array('usuario' => $usuario));
		if($query->num_rows() == 0)	{
            $query = $this->db->get_where('usuarios', array('correo' => $correo));
            if($query->num_rows() == 0)	{
                $this->db->insert('usuarios',array(
                    'usuario'=>$usuario,
                    'correo'=>$correo,
                    'password'=>$password,
                    'nivel_usuario'=>$nivel_usuario,
                ));
                $data['error']="Usuario registrado correctamente";
                redirect(base_url().'login');
            }else{
                $this->session->set_flashdata('error','La direccion de correo ya esta siendo usada');
                redirect(base_url().'login/registro');
            }
        }else{
            $this->session->set_flashdata('error','El nombre de usuario ya esta siendo usado.');
            redirect(base_url().'login/registro');
        }

///////////////////////////////////////////////////////////////////////////////////////////////////////


            }
        }else{
            echo "No valido el token <br>";
        }
	}


	public function token()	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}

	public function logout_ci()	{
		$this->session->sess_destroy();
		$this->index();
	}
}

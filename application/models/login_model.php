<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Login_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function login_user($user,$password)
	{
		$this->db->where('user',$user);
		$this->db->where('password',$password);
		$query = $this->db->get('users');
		if($query->num_rows() == 1) {
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
			redirect(base_url().'login','refresh');
		}
	}
}

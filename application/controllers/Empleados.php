<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

	 public function __construct() {
		  parent::__construct();
		  $this->load->model('db_model');
			$this->load->library(array('session','form_validation'));
			$this->load->helper(array('url','form'));
      $this->load->library('pagination');
	    if($this->session->userdata('is_logued_in') == false){
				redirect(base_url().'login');
			}
    }

		public function index(){
      $data['titulo'] = 'Login';
      $data['page'] = 'empleados_view';
        $this->db->order_by("id","desc");
        $this->db->limit(10);
      $data['consulta'] = $this->db->get('staff');
      $this->load->view('container',$data);
		}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct() {
		  parent::__construct();
		  $this->load->model('login_model');
			$this->load->library(array('session','form_validation'));
			$this->load->helper(array('url','form'));
	    if($this->session->userdata('is_logued_in') == false){
				redirect(base_url().'login');
			}
    }

		public function index(){
      $data['titulo'] = 'Login';
      $data['page'] = 'home_view';
      $data['consulta'] = #;
      $this->load->view('container',$data);
		}
}

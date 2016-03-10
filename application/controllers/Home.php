<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function __construct() {
		  parent::__construct();
		  $this->load->model('login_model');
			$this->load->library(array('session','form_validation'));
			$this->load->helper(array('url','form'));
	    if($this->session->userdata() == FALSE){
				redirect(base_url().'login');
			}
    }

		public function index()
		{
					if($this->session->userdata() == FALSE){
						redirect(base_url().'login');
					}else{
						redirect(base_url().'welcome');
					}
		}
		public function welcome()
		{
					echo "hola";
		}
}

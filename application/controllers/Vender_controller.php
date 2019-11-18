<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vender_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		if($this->session->userdata('estado')){
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout');
			$this->load->view('dashboard/dashboard_view/vender');
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}
		
	}

	
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Guayaquil');
class Dashboard_controller extends CI_Controller {

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
		$fecha=date('Y/m/d');
		$result1 = $this->report_model->consult_factura_general();		
		$result2 = $this->report_model->consult_factura_reciente();
		$result4 = $this->cierre_model->consult_factura($fecha);
		$result5 = $this->Producto_model->count_allCategoria();
		$result6 = $this->Producto_model->count_allProductos();
		$result7 = $this->Producto_model->mas_vendido();
		$result8 = $this->Producto_model->menos_vendido();
		
		if($this->session->userdata('estado')){

			$this->load->model('User_model');
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			//$this->load->view('dashboard/dashboard_view/caja');
			//Reporte
			
			$this->load->view('dashboard/dashboard_view/reporte/report',['data1'=>$result1,'data2'=>$result2,'data4'=>$result4,'cat'=>$result5,'pro'=>$result6,'mas'=>$result7,'menos'=>$result8]);
		
			//reporte
			$this->load->view('dashboard/footer_layout');    
		}else{
			redirect(base_url());
		}
		
	}


	function cajero(){
		if($this->session->userdata('estado')){

			$this->load->model('User_model');
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			$this->load->view('dashboard/bienvenida.php');
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}
	}

	function admin(){
		if($this->session->userdata('estado')){
			$this->load->model('User_model');
			$result = $this->User_model->list_us_all(); 
			
				//echo "<pre>";print_r($result);
				$this->load->view('dashboard/header_layout');
				$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());
				$this->load->view('dashboard/dashboard_view/user/list_user_adm',['data1'=>$result]);
				$this->load->view('dashboard/footer_layout');
			
			}else{
				redirect(base_url());
			}
	}




	
	
}
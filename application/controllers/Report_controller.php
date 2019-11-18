 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_controller extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('estado')){
			$this->load->view('dashboard/header_layout');

			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			//Reporte
		
			$this->load->view('dashboard/dashboard_view/reporte/report');
			
			//reporte
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}
		
    }

    function r_cliente(){
    	$result = $this->report_model->rep_cliente();
    	if($this->session->userdata('estado')){
			$this->load->view('dashboard/header_layout');

			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			//Reporte
		
			$this->load->view('dashboard/dashboard_view/reporte/report_view/report_clientes',['data1'=>$result]);
			
			//reporte
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}

    }
    function r_stock(){
    	$result = $this->report_model->list_stock();
    	if($this->session->userdata('estado')){
			$this->load->view('dashboard/header_layout');

			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			//Reporte
		
			$this->load->view('dashboard/dashboard_view/reporte/report_view/report_stock',['data1'=>$result]);
		
			//reporte
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}

    }
    function r_fac(){
    	$result = $this->report_model->list_facturas();
    	if($this->session->userdata('estado')){
			$this->load->view('dashboard/header_layout');

			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			//Reporte
		
			$this->load->view('dashboard/dashboard_view/reporte/report_view/report_fact',['data1'=>$result]);
		
			//reporte
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}

    }
    function r_detalle($id){
    	$result2 = $this->report_model->list_detalle($id);
    	if($this->session->userdata('estado')){
			$this->load->view('dashboard/header_layout');

			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			//Reporte
		
			$this->load->view('dashboard/dashboard_view/reporte/report_view/report_detalle',['data2'=>$result2]);
		
			//reporte
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}

    }
    



	
}
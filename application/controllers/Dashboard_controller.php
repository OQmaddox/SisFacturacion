<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/Guayaquil');
class Dashboard_controller extends CI_Controller
{

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
		if ($this->session->userdata('estado')) {
			$fecha = date('Y/m/d');
			$result1 = $this->report_model->consult_factura_general();
			$result2 = $this->report_model->consult_factura_reciente();
			$result4 = $this->cierre_model->consult_factura($fecha);
			$result5 = $this->Producto_model->count_allCategoria();
			$result6 = $this->Producto_model->count_allProductos();
			$result7 = $this->Producto_model->mas_vendido();
			$result8 = $this->Producto_model->menos_vendido();



			$this->load->model('User_model');
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout', $this->User_model->getDataUser());

			//$this->load->view('dashboard/dashboard_view/caja');
			//Reporte

			$this->load->view('dashboard/dashboard_view/reporte/report', ['data1' => $result1, 'data2' => $result2, 'data4' => $result4, 'cat' => $result5, 'pro' => $result6, 'mas' => $result7, 'menos' => $result8]);

			//reporte
			$this->load->view('dashboard/footer_layout');
		} else {
			redirect(base_url());
		}
	}


	function cajero()
	{
		if ($this->session->userdata('estado')) {

			$this->load->model('User_model');
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout', $this->User_model->getDataUser());

			$this->load->view('dashboard/bienvenida.php');
			$this->load->view('dashboard/footer_layout');
		} else {
			redirect(base_url());
		}
	}

	function admin()
	{
		if ($this->session->userdata('estado')) {
			$this->load->model('User_model');
			$result = $this->User_model->list_us_all();

			//echo "<pre>";print_r($result);
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout', $this->User_model->getDataUser());
			$this->load->view('dashboard/dashboard_view/user/list_user_adm', ['data1' => $result]);
			$this->load->view('dashboard/footer_layout');
		} else {
			redirect(base_url());
		}
	}


	function getDataChar()
	{
		$this->load->model('Report_model');
		$date = new \DateTime();
		$string = $date->format('Y-m-d');
		//$fecha.='';
		$fecha = explode('-', $string);
		$year = $fecha[0];
		$month = $fecha[1];
		$day = $fecha[2];
		$data = array();

		# Obtenemos el numero de la semana
		$semana = date("W", mktime(0, 0, 0, $month, $day, $year));

		# Obtenemos el día de la semana de la fecha dada
		$diaSemana = date("w", mktime(0, 0, 0, $month, $day, $year));

		# el 0 equivale al domingo...
		if ($diaSemana == 0)
			$diaSemana = 7;

		# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes SELECT sum(FAC_TOTAL) FROM tb_factura where FAC_FECHA BETWEEN '2019-11-21 00:00:00' and '2019-11-21 23:59:59'

		for ($i = 1; $i <= 6; $i++) {
			$dia = date("Y-m-d", mktime(0, 0, 0, $month, $day - $diaSemana + $i, $year));
			$diaI = $dia . ' 00:00:00';
			$diaF = $dia . ' 23:59:59';
			$res = $this->Report_model->getValueWeek($diaI, $diaF)[0]->total;
			$val = 0;
			if ($res !== null) {
				$val = $res + 0;
				array_push($data, $val);
			}else{
				array_push($data, null);
			}
			
		}
		# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
		$domingo = date("Y-m-d", mktime(0, 0, 0, $month, $day + (7 - $diaSemana), $year));
		$diaI = $domingo . ' 00:00:00';
		$diaF = $domingo . ' 23:59:59';
		$res = $this->Report_model->getValueWeek($diaI, $diaF)[0]->total;
		$val = 0;
		if ($res !== null) {
			$val = $res + 0;
			array_push($data, $val);
		}else{
			array_push($data, null);
		}
		echo json_encode($data);
	}

	function getdataMonth()
	{
		$this->load->model('Report_model');
		$date = new \DateTime();
		$string = $date->format('Y-m-d');
		//$fecha.='';
		$fecha = explode('-', $string);
		$year = $fecha[0];
		$month = $fecha[1];
		$day = $fecha[2];
		$data = array();
		$result = $this->Report_model->getValueMonth($year);
		foreach ($result as $row) {
			//$fe = explode('-', $row->FAC_FECHA);
			array_push($data,$row->TOTAL);
		}
		echo json_encode($data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Guayaquil');
class User_controller extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('estado')){

			$result = $this->User_model->list_us();
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			$this->load->view('dashboard/dashboard_view/user/list_user',['data1'=>$result]);
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}
		
    }
	function add_user(){	
		$this->load->view('dashboard/header_layout');

		$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());
		$result['tb_perfiles'] = $this->User_model->list_profile();
		$result2['tb_empresa'] = $this->User_model->list_empresa();
		$this->load->view('dashboard/dashboard_view/user/add_user_form',['result'=>$result,'result2'=>$result2]);
		$this->load->view('dashboard/footer_layout'); 

	}

	function insert_user(){	
		if ($this->form_validation->run('user') == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());
			$result['tb_perfiles'] = $this->User_model->list_profile();

			$this->load->view('dashboard/dashboard_view/user/add_user_form',['result'=>$result]);
			$this->load->view('dashboard/footer_layout');
		}
		else
		{

			$empresa = $this->input->post('empresa');

			$perfil = $this->input->post('perfil');
			$cedula = $this->input->post('cedula');
			$nombres = $this->input->post('nombres');
			$apellidos = $this->input->post('apellidos');
			$genero = $this->input->post('genero');
			$celular = $this->input->post('celular');
			$correo = $this->input->post('correo');
			$contraseña = $this->input->post('contraseña');
			$estado=1;
			$date = date('Y:m:d H:i:s');
			$id_empresa=null;
			

			$data = array(
				'ID_EMPRESA'=>$empresa,

				'ID_PERFIL'=>$perfil,
				'USU_CEDULA'=>$cedula,
				'USU_NOMBRE'=>$nombres,
				'USU_APELLIDO'=>$apellidos,
				'USU_GENERO'=>$genero,
				'USU_CELULAR'=>$celular,
				'USU_CORREO'=>$correo,
				'USU_PASSWORD'=>md5($contraseña),
				'USU_ESTADO'=>$estado,

				'USE_FEC_CRE'=>$date
			);

			$result = $this->User_model->insert_user($data);
			echo ($result);
			if ($result){
				$this->session->set_flashdata('login_error','Se registro correctamente');
				return redirect('Dashboard_controller/admin');

			}else{
				$this->session->set_flashdata('login_error','No se Registro el producto Existe un error qry');
				return redirect('Dashboard_controller/admin');

			}
			
		}
		
	}
	function list_user(){

		$result = $this->User_model->list_us();
		if($result){
			//echo "<pre>";print_r($result);
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			$this->load->view('dashboard/dashboard_view/user/list_user',['data1'=>$result]);
			$this->load->view('dashboard/footer_layout');
		}else{
			$this->load->view('dashboard/header_layout');

			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			$this->load->view('dashboard/dashboard_view/user/list_user',['data1'=>$result]);
			$this->load->view('dashboard/footer_layout');
		}
	}
	function edit_user($id){

		$data = $this->User_model->edit_us($id);
		
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());
			$result['tb_perfiles'] = $this->User_model->list_profile();

			$this->load->view('dashboard/dashboard_view/user/edit_user',['data'=>$data,'result'=>$result]);
			$this->load->view('dashboard/footer_layout');
		//print_r($result);
	}
	function update_user($id){
		if ($this->form_validation->run('user') == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');
			$this->load->view('dashboard/header_layout');

			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());
			$result['tb_perfiles'] = $this->User_model->list_profile();

			$this->load->view('dashboard/dashboard_view/user/edit_user',['result'=>$result]);
			$this->load->view('dashboard/footer_layout');
		}
		else
		{


			$perfil = $this->input->post('perfil');
			$cedula = $this->input->post('cedula');
			$nombres = $this->input->post('nombres');
			$apellidos = $this->input->post('apellidos');
			$genero = $this->input->post('genero');
			$celular = $this->input->post('celular');
			$correo = $this->input->post('correo');
			//$contraseña = $this->input->post('contraseña');
			$estado=$this->input->post('est');
			$date = date('d:m:y h:m:s');

			$data = array(
				'ID_PERFIL'=>$perfil,
				'USU_CEDULA'=>$cedula,
				'USU_NOMBRE'=>$nombres,
				'USU_APELLIDO'=>$apellidos,
				'USU_GENERO'=>$genero,
				'USU_CELULAR'=>$celular,
				'USU_CORREO'=>$correo,
				//'USU_PASSWORD'=>md5($contraseña),
				'USU_ESTADO'=>$estado,
				'USE_FEC_CRE'=>$date
			); 

			$result = $this->User_model->update_us($data,$id);
			echo ($result);
			if ($result){
				if ($this->session->userdata('id_perfil')==3) {
					$this->session->set_flashdata('login_error','Se edito correctamente');
					return redirect('Dashboard_controller/admin');
				} else {
					$this->session->set_flashdata('login_error','Se edito correctamente');
					return redirect('User_controller/list_user');
				}
				
				

			}else{
				if ($this->session->userdata('id_perfil')==3) {
					$this->session->set_flashdata('login_error','Se edito correctamente');
					return redirect('Dashboard_controller/admin');
				} else {
					$this->session->set_flashdata('login_error','No se edito el producto Existe un error qry');
					return redirect('User_controller/list_user');
				}
				

			}
			
		}
	}

	function delete_user($id){ 
		$result = $this->User_model->delete_us($id);
		if($result){
			if ($this->session->userdata('id_perfil')==3) {
				$this->session->set_flashdata('login_error','El registro ha sido borrado Existosamente');
				return redirect('Dashboard_controller/admin');
			} else {
				$this->session->set_flashdata('login_error','El registro ha sido borrado Existosamente');
				return redirect('User_controller/list_user');
			}
			

		}
	}
	function getCliente(){
		
		$data=$this->input->post();

		$query=$this->USser_model->getCliente($data['cedula']);

		foreach($query->result() as $row){
			$dat=array(
				'nombre'=>$row->CLI_NOMBRE,
				'cedula'=>$row->CLI_CEDULA,
				'direccion'=>$row->CLI_DIRECCION,
				'telefono'=>$row->CLI_TELEFONO,
				'puntos'=>$row->CLI_PUNTOS,


			);
		}
		echo json_encode($dat);
	}
	
	
}

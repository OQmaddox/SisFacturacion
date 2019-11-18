<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_controller extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('estado')){
			$this->load->model('empresa_model');
			$result = $this->empresa_model->list_emp(); 
				$this->load->view('dashboard/header_layout');
				$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());
				$this->load->view('dashboard/dashboard_view/empresa/list_empresa',['data1'=>$result]);
				$this->load->view('dashboard/footer_layout');
			
			}else{
				redirect(base_url());
			}
		
	}
	function add_emp(){	
		$this->load->view('dashboard/header_layout');
		$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());
		$result['tb_perfiles'] = $this->User_model->list_profile();
		$result2['tb_empresa'] = $this->User_model->list_empresa();
		$this->load->view('dashboard/dashboard_view/empresa/add_emp_form',['result'=>$result,'result2'=>$result2]);
		$this->load->view('dashboard/footer_layout'); 
	}

	function insert_emp(){	
		

			$empresa = $this->input->post('nombre');
			$estado=1;
			$date = date('Y:m:d H:i:s');
			

			$data = array(
				'EMP_NOMBRE'=>$empresa,
				'EMP_ESTADO'=>$estado,
				'EMP_CREACION'=>$date
			
			);

			$result = $this->Empresa_model->insert_emp($data);
			echo ($result);
			if ($result){
				$this->session->set_flashdata('login_error','Se registro correctamente');
				return redirect('Empresa_controller');

			}else{
				$this->session->set_flashdata('login_error','No se Registro el producto Existe un error qry');
				return redirect('Empresa_controller');
			}
			
		}

		function edit_emp($id){
		
			$data = $this->Empresa_model->edit_em($id);
			
				$this->load->view('dashboard/header_layout');
				$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());
				$this->load->view('dashboard/dashboard_view/empresa/edit_emp',['data'=>$data]);
				$this->load->view('dashboard/footer_layout');
			//print_r($data);die;
		}

		function update_emp($id){	
				$empresa = $this->input->post('nombre');
				
				$estado=$this->input->post('est');
				
	
				$data = array(
					'EMP_NOMBRE'=>$empresa,
					'EMP_ESTADO'=>$estado
				); 
	
				$result = $this->Empresa_model->update_em($data,$id);
				echo ($result);
				if ($result){
					
						$this->session->set_flashdata('login_error','Se edito correctamente');
						return redirect('Empresa_controller');
				
				}else{
				
						$this->session->set_flashdata('login_error','No se edito el producto Existe un error qry');
						return redirect('Empresa_controller');
									
				}
		}
		function delete_emp($id){ 
			$result = $this->Empresa_model->delete_em($id);
			if($result){				
				$this->session->set_flashdata('login_error','El registro ha sido borrado Existosamente');
				return redirect('Empresa_controller');				
			}
		}
		 
	

	
	
}
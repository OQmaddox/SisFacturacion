<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

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
		
    }
    public function validation(){

        $this->load->model('User_model');
        $user=$this->input->post('user');
        $password=$this->input->post('password');
        $res=$this->User_model->login(trim($user),trim($password));
      
        if($res['estado']){
            $estado=$res['data']->USU_ESTADO; 
            $emp_estado=$res['data']->EMP_ESTADO; 
            if ($estado == 1) {
                if ($emp_estado == 1) {
                    $data=array(
                        'id_usuario'=>$res['data']->ID_USUARIO,
                        'id_empresa'=>$res['data']->ID_EMPRESA,
                        'usu_nombre'=>$res['data']->USU_NOMBRE, 
                        'usu_apellido'=>$res['data']->USU_APELLIDO,
                        'usu_cedula'=>$res['data']->USU_CEDULA,
                        'id_perfil'=>$res['data']->ID_PERFIL,
                        'usu_estado'=>$res['data']->USU_ESTADO,
                        'per_nombre'=>$res['data']->PER_NOMBRE,
                        'emp_nombre'=>$res['data']->EMP_NOMBRE,
                            'estado'=>TRUE,
                            'estado_caja'=>false
                        );
                        $this->session->set_userdata($data);
                        if($res['data']->ID_PERFIL==1){
                            redirect(base_url()."index.php/Dashboard_controller");
                        }else if($res['data']->ID_PERFIL==2){
                            redirect(base_url()."index.php/Dashboard_controller/cajero");
                        }else if($res['data']->ID_PERFIL==3){
                            redirect(base_url()."index.php/Dashboard_controller/admin");
                        }   

                } else {
                    $this->session->set_flashdata('login_error','Su empresa se encuentra Deshabilitada. Comuniquese con Administracion.');
                redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('login_error','Su usuario se encuentra deshabilitado. Comuniquese con su administrador.');
                redirect(base_url());
            }          

        }else{
            $this->session->set_flashdata('login_error','Usuario o clave incorrectos Intenta de nuevo');
            redirect(base_url());
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        
        redirect(base_url());

    }

	
	
}

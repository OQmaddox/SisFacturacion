<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/Guayaquil');
class Proveedores_controller extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('estado')) {

            $this->load->model('Proveedor_model');
            $resultProve = $this->Proveedor_model->getAllProveedores();
            $data['proveedores']=$resultProve;
            $this->load->view('dashboard/header_layout');
            $this->load->view('dashboard/menu_layout', $this->User_model->getDataUser());

            $this->load->view('dashboard/dashboard_view/proveedores',$data);
            $this->load->view('dashboard/footer_layout');
        } else {
            redirect(base_url());
        }
    }
    public function addproveedor()
    {
        $this->load->model('Proveedor_model');
        $date = date('Y:m:d H:i:s');
        $data = array(
            'PRV_PEMPRESA' => $this->input->post('prove_empresa'),
            'PRV_EMAIL' => $this->input->post('prove_email'),
            'PRV_NOMBRES' => $this->input->post('prove_representante'),
            'PRV_DIRECCION' => $this->input->post('prove_direccion'),
            'PRV_TELEFONO' => $this->input->post('prove_celular'),
            'PRV_CEDULA' => $this->input->post('prove_cedula'),
            'PRV_FECHA' => $date,
            'ID_EMPRESA' => $this->session->userdata('id_empresa')
        );
        $va = $this->Proveedor_model->insertProveedor($data);
        echo json_encode($va);
    }
    public function getProveedor(){
        $this->load->model('Proveedor_model');
        $id=$this->input->post('id');
        $dat=$this->Proveedor_model->getProveedor($id);
        echo json_encode($dat);
    }
    public function editproveedor(){
        $this->load->model('Proveedor_model');
        $data = array(
            'PRV_PEMPRESA' => $this->input->post('prove_empresa_edit'),
            'PRV_EMAIL' => $this->input->post('prove_email_edit'),
            'PRV_NOMBRES' => $this->input->post('prove_representante_edit'),
            'PRV_DIRECCION' => $this->input->post('prove_direccion_edit'),
            'PRV_TELEFONO' => $this->input->post('prove_celular_edit'),
            'PRV_CEDULA' => $this->input->post('prove_cedula_edit')
        );
        $res=$this->Proveedor_model->editProveedor($this->input->post('prove_id'),$data);
        echo json_encode($res);
    }

    public function deleteProveedor(){
        $this->load->model('Proveedor_model');
        $id=$this->input->post('id');
        $res=$this->Proveedor_model->deleteProveedor($id);
        echo json_encode($res);
    }
}

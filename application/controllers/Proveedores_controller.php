<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Guayaquil');
class Proveedores_controller extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('estado')){

            $result = $this->User_model->list_us();
            $this->load->view('dashboard/header_layout');
            $this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

            $this->load->view('dashboard/dashboard_view/proveedores');
            $this->load->view('dashboard/footer_layout');
        }else{
            redirect(base_url());
        }
        
    }
    function list_cierre(){ 
        if($this->session->userdata('estado')){
            $this->load->view('dashboard/header_layout');

            $this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

            //Reporte   
            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_ventas');
            //reporte
            $this->load->view('dashboard/footer_layout');
        }else{
            redirect(base_url());
        }
    }
    function list_cierre2(){ 

        $result = $this->User_model->list_us();
        if($this->session->userdata('estado')){
            $this->load->view('dashboard/header_layout');
            $this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

            //Reporte   
            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_ventas2',['data1'=>$result]);
            //reporte
            $this->load->view('dashboard/footer_layout');
        }else{
            redirect(base_url());
        }
    }
    function list_cierre_ventas(){  
        $fe = $this->input->post('fecha');
        $result1 = $this->cierre_model->consult_caja($fe);
        $result2 = $this->cierre_model->consult_factura($fe);
        $result3 = $this->cierre_model->consult_accion_caja($fe);
        if($this->session->userdata('estado')){
            $this->load->view('dashboard/header_layout');

            $this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

            //Reporte

            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_ventas_diar',['data1'=>$result1,'data2'=>$result2,'data3'=>$result3]);
            
            //reporte
            $this->load->view('dashboard/footer_layout');
        }else{
            redirect(base_url());
        }
    }
    function list_cierre_ventas2(){  
        $fe = $this->input->post('fecha');
        $user = $this->input->post('user');
        $result1 = $this->cierre_model->consult_caja_user($fe,$user);
        $result2 = $this->cierre_model->consult_factura_user($fe,$user);
        $result3 = $this->cierre_model->consult_accion_caja_user($fe,$user);
        if($this->session->userdata('estado')){
            $this->load->view('dashboard/header_layout');

            $this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());


            //Reporte

            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_ventas_diar2',['data1'=>$result1,'data2'=>$result2,'data3'=>$result3]);
            
            //reporte
            $this->load->view('dashboard/footer_layout');
        }else{
            redirect(base_url());
        }
    }
    function list_cierre_prod_ventas(){ 
        $fe = $this->input->post('fecha');
        $result1 = $this->cierre_model->consult_prod($fe);
        
        if($this->session->userdata('estado')){
            $this->load->view('dashboard/header_layout');

            $this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

                //Reporte
            
            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_prod_ventas_diar',['data1'=>$result1]);
            
                //reporte
            $this->load->view('dashboard/footer_layout');
        }else{
            redirect(base_url());
        }
    }
    function list_prod_cierre(){    
        if($this->session->userdata('estado')){
            $this->load->view('dashboard/header_layout');

            $this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

        //Reporte
            
            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_prod_ventas');

        //reporte
            $this->load->view('dashboard/footer_layout');
        }else{
            redirect(base_url());
        }
        
    }
//cierre por factura
    function list_fact_cierre(){    
        if($this->session->userdata('estado')){
            $this->load->view('dashboard/header_layout');

            $this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

    //Reporte
            
            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_fact_ventas');
            
    //reporte
            $this->load->view('dashboard/footer_layout');
        }else{
            redirect(base_url());
        }

    }
    function list_cierre_fact_ventas(){ 
        $fe = $this->input->post('fecha');
        $result1 = $this->cierre_model->list_facturas($fe);

        if($this->session->userdata('estado')){
            $this->load->view('dashboard/header_layout');

            $this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

        //Reporte
            
            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_fact_ventas_diar',['data1'=>$result1]);
            
        //reporte
            $this->load->view('dashboard/footer_layout');
        }else{
            redirect(base_url());
        } 
    }
    function r_detalle_fac($id){
        $result1 = $this->report_model->consult_cliente_all($id);
        $result2 = $this->report_model->list_detalle($id);
        if($this->session->userdata('estado')){
            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_detalle2',['data1'=>$result1,'data2'=>$result2]);         
    //reporte
            
        }else{
            redirect(base_url());
        }

    }
    function r_detalle_impr($id){
        $result1 = $this->report_model->consult_cliente_all($id);
        $result2 = $this->report_model->list_detalle($id);
        if($this->session->userdata('estado')){
            $this->load->view('dashboard/dashboard_view/reporte/report_view/report_detalle3',['data1'=>$result1,'data2'=>$result2]);         
    //reporte
            
        }else{
            redirect(base_url());
        }

    }


    
    
}
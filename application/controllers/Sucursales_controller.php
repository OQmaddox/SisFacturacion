<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursales_controller extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->library("EscPos.php");
		

	}
	
	public function index()
	{
		if($this->session->userdata('estado')){
            $data['tabla_sucursales']=$this->tablaSucursales();

            $this->load->model('User_model');
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			$this->load->view('dashboard/dashboard_view/sucursales',$data);
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}
		
    }

    function imprimir_comprobante(){

		try {
			//$connector = new Escpos\PrintConnectors\FilePrintConnector("COM3");
			$connector = new Escpos\PrintConnectors\WindowsPrintConnector("BTP-M300USB");
			$printer = new Escpos\Printer($connector);

			$printer -> text("Hello World!\n");
			$printer -> cut();

			/* Close printer */
			$printer -> close();
		} catch (Exception $e) {
			echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
		}
	}
    public function guardarSucursal(){
        $data=$this->input->post();
        $array = array(
            'ID_SUCURSAL'=>null,
            'SUC_NOMBRE' => $data['sucursal_nombre'],
            'SUC_DIRECCION' => $data['sucursal_direccion'],
            'SUC_TELEFONO' => $data['sucursal_telefono']
        );
        $this->db->insert('tb_sucursales', $array);
        echo $this->tablaSucursales();
    }
    //cargar datos de la tabla
    public function tablaSucursales(){
        $this->load->model('sucursales_model');
        $data=$this->sucursales_model->allSucursales();
        $code='<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>';
        foreach($data->result() as $row){
            $code.='<tr>';
            $code.='<th>'.$row->ID_SUCURSAL.'</th>';
            $code.='<td>'.$row->SUC_NOMBRE.'</td>';
            $code.='<td>'.$row->SUC_DIRECCION.'</td>';
            $code.='<td>'.$row->SUC_TELEFONO.'</td>';
            $code.='<td>
            <button type="button" class="btn btn-info btn-sm fas fa-edit" onclick="editSucursalModel('.$row->ID_SUCURSAL.')"></button>
            <button type="button" class="btn btn-info btn-sm fas fa-trash" onclick="deleteSucursal('.$row->ID_SUCURSAL.')"></button>
            </td>';
            $code.='</tr>';
            
        }
        return $code.='</tbody>';
    }
    //borrar la sucursal
    public function deleteSucursal(){
        $data=$this->input->post();
        $this->db->where('ID_SUCURSAL',$data['id_sucursal']);
        $this->db->delete('tb_sucursales');
        return $this->tablaSucursales();
    }

    //buscar sucursal
    public function buscarSucursal(){
        $data=$this->input->post();
        $id_sucursal=$data['id_sucursal'];
        $this->load->model('sucursales_model');
        $data=$this->sucursales_model->getSucursal($id_sucursal);
        foreach($data->result() as $row){
            $id_sucursal=$row->ID_SUCURSAL;
            $suc_nombre=$row->SUC_NOMBRE;
            $suc_direccion=$row->SUC_DIRECCION;
            $suc_telefono=$row->SUC_TELEFONO;
        }
        $data=array(
            'ID_SUCURSAL'=>$id_sucursal,
            'SUC_NOMBRE'=>$suc_nombre,
            'SUC_DIRECCION'=>$suc_direccion,
            'SUC_TELEFONO'=>$suc_telefono
        );
        echo json_encode($data);
    }
    //editar sucursal
    public function editSucursal(){
        $data=$this->input->post();
        $array = array(
            'ID_SUCURSAL'=>$data['id_sucursal'],
            'SUC_NOMBRE' => $data['sucursal_nombre'],
            'SUC_DIRECCION' => $data['sucursal_direccion'],
            'SUC_TELEFONO' => $data['sucursal_telefono']
        );
        $this->db->where('ID_SUCURSAL', $data['id_sucursal']);
        $this->db->update('tb_sucursales', $array);
        $data=array(
            'estado'=>true,
            'code'=>$this->tablaSucursales()
        );
        echo json_encode($data);
    }

    public function imprimir1(){
        //$data=$this->input->post();       
        $this->Sucursales_model->imprimir();    
    }

    
	
}
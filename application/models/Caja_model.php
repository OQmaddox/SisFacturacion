<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Caja_model extends CI_Model{

    public function __constructor(){
        parent::__constructor();

    }

    //metodo para buscar cliente
    public function buscarCliente($cedula){
        $query = $this->db->query("SELECT * FROM tb_cliente WHERE CLI_CEDULA='".trim($cedula)."' AND ID_EMPRESA=".$this->session->userdata('id_empresa'));
        

        return $query;
    }
    //guardar dato cliente
    public function guardarCliente($cedula,$nombre,$direccion,$telefono){
        $array=array(
            'CLI_CEDULA'=>$cedula,
            'CLI_NOMBRE'=>$nombre,
            'CLI_DIRECCION'=>$direccion,
            'CLI_TELEFONO'=>$telefono,
            'ID_EMPRESA'=>$this->session->userdata('id_empresa')

        );
        $this->db->insert('tb_cliente', $array);
        //buscar cliente para la id
        $data=$this->buscarCliente($cedula);
        foreach($data->result() as $row){
			$val=true;
			$cedula=$row->CLI_CEDULA;
			$apellido=$row->CLI_APELLIDO;
			$nombre=$row->CLI_NOMBRE;
			$telefono=$row->CLI_TELEFONO;
			$direccion=$row->CLI_DIRECCION;
			$id_cliente=$row->ID_CLIENTE;
			
        }
        return $id_cliente;

    }
    //ingresar datos a la factura
    public function guardarFactura($data,$id_cliente){
        date_default_timezone_set('America/Guayaquil');
        $array=array(
            'ID_USUARIO'=>$this->session->userdata('id_usuario'),
            'ID_CLIENTE'=>$id_cliente,
            'FAC_NUM'=>0,
            'FAC_FECHA'=>date('Y:m:d H:i:s'),
            'FAC_SUBTOTAL'=>$data['subtotal'],
            'FAC_IMPUESTO'=>12,
            'FAC_TOTAL'=>$data['total'],
            'ID_EMPRESA'=>$this->session->userdata('id_empresa')
        );
        $this->db->insert('tb_factura', $array);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    //ingresar el detalle factura
    public function ingresarDetalleFactura($arreglo,$id_factura){
        for($i=0; $i<count($arreglo);$i++){
            $fila=array(
                'ID_PRODUCTO'=>$arreglo[$i][0],
                'ID_FACTURA'=>$id_factura,
                'MOV_CANT'=>$arreglo[$i][2],
                'MOV_VALOR'=>$arreglo[$i][3],
                'MOV_TOTAL'=>$arreglo[$i][4],
                'ID_EMPRESA'=>$this->session->userdata('id_empresa')
            );
            $this->restarProductoStock($arreglo[$i][0],intval($arreglo[$i][2]));
            $this->db->insert('tb_detalle_fac', $fila);

        }
        return true;
    }
    //funcion descontar de stock
    public function restarProductoStock($id_producto,$cantidad){
        $query=$this->db->get_where( 'tb_producto' ,  array ( 'ID_PRODUCTO'  =>  $id_producto ));
		foreach($query->result() as $row){
			$pro_cantidad=$row->PRO_STOCK;
        }
        $pro_cantidad=intval($pro_cantidad);
        $nuevo_cantidad=$pro_cantidad-$cantidad;
        
        $this->db->where('ID_PRODUCTO', $id_producto);
        $this->db->update('tb_producto', array(
            'PRO_STOCK'=>$nuevo_cantidad
        ));
       
    }

}
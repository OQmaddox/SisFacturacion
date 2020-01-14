<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model{

	public function __constructor(){
		parent::__constructor();

	}
	function rep_cliente(){
        $qry = $this->db->select('ID_CLIENTE,CLI_NOMBRE,CLI_APELLIDO,CLI_CEDULA,CLI_TELEFONO,CLI_DIRECCION')
        ->where('ID_EMPRESA',$this->session->userdata('id_empresa'))
		->get('tb_cliente');
		return $qry->result();
	}

	 
      function list_stock(){
        
        $query = $this->db->query("SELECT * FROM tb_producto, tb_categoria WHERE tb_categoria.ID_CATEGORIA=tb_producto.ID_CATEGORIA AND tb_producto.ID_EMPRESA=".$this->session->userdata('id_empresa'));     

        return $query->result();
    }
    function edit_rec($id){
		$qry = $this->db->select('items.id as item_id,brands.id as b_id,item_name,img,price,cat.id as c_id,cat_name,brand_name,des')
						->from('items','brands','cat')
						->where('items.id',$id)
						->join('brands','items.brand_id = brands.id','left')
						->join('cat','items.cat_id = cat.id','left')
						->get();
				return $qry->result();
	}

     function list_facturas(){
        //$qry = $this->db 
       $qry = $this->db->select('tb_factura.ID_FACTURA as factura_id,tb_cliente.ID_CLIENTE as cliente_id,tb_usuario.ID_USUARIO as usuario_id,USU_NOMBRE,USU_APELLIDO,CLI_NOMBRE,CLI_APELLIDO, FAC_FECHA, FAC_TOTAL')
        ->from('tb_factura','tb_usuario','tb_cliente')
        ->join('tb_cliente','tb_factura.ID_CLIENTE = tb_cliente.ID_CLIENTE','left')
        ->join('tb_usuario','tb_factura.ID_USUARIO = tb_usuario.ID_USUARIO','left')
        ->get();
        return $qry->result();
    }
	function list_detalle($id){ 
        //$qry = $this->db 
       $qry = $this->db->select('tb_detalle_fac.MOV_ID as detalle_id,tb_producto.ID_PRODUCTO as producto_id,PRO_NOMBRE,MOV_CANT,MOV_VALOR,MOV_TOTAL')
        ->from('tb_detalle_fac','tb_producto')
        ->where('tb_detalle_fac.ID_FACTURA',$id)
        ->join('tb_producto','tb_detalle_fac.ID_PRODUCTO = tb_producto.ID_PRODUCTO','left')
        ->get();
        return $qry->result();
    }

   function consult_factura_general(){

        $query = $this->db->query("SELECT SUM(FAC_TOTAL) as FAC_TOTAL2 FROM tb_factura WHERE tb_factura.ID_EMPRESA=".$this->session->userdata('id_empresa')." ");     
        return $query->result();
    }
    function consult_factura_reciente(){


        $query = $this->db->query("SELECT ID_FACTURA,USU_NOMBRE,FAC_FECHA,FAC_SUBTOTAL,FAC_TOTAL FROM tb_factura, tb_usuario WHERE tb_factura.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_factura.ID_USUARIO = tb_usuario.ID_USUARIO order by tb_factura.FAC_FECHA DESC LIMIT 6");     

        return $query->result();
    }
    function consult_cliente_all($id_fac){

        $query = $this->db->query("SELECT * FROM tb_factura, tb_cliente WHERE tb_factura.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_cliente.ID_CLIENTE= tb_factura.ID_CLIENTE AND tb_factura.ID_FACTURA ='".$id_fac."'");     
        return $query->row();
    }
    //consulta de valores semanales
    function getValueWeek($fechaI,$fechaF){
        $query= $this->db->query("SELECT sum(FAC_TOTAL) as total FROM tb_factura where tb_factura.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND FAC_FECHA BETWEEN '$fechaI'  and '$fechaF'");
        return $query->result();
    }
    //consulta de valores mensuales

    function getValueMonth($year){
        $query= $this->db->query("SELECT FAC_FECHA,SUM(FAC_TOTAL) as TOTAL FROM tb_factura WHERE tb_factura.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND YEAR(FAC_FECHA)=$year GROUP by MONTH(FAC_FECHA)");
        return $query->result();
    }

}
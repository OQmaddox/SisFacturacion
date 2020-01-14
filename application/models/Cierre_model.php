<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cierre_model extends CI_Model{

    public function __constructor(){
        parent::__constructor();

    }

    function consult_caja($fecha){

        $query = $this->db->query("SELECT USU_NOMBRE,CAJ_APERTURA_V,CAJ_FECHA_A,CAJ_CIERRE_V,CAJ_FECHA_C,CAJ_ESTADO FROM tb_caja, tb_usuario WHERE tb_caja.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_caja.ID_USUARIO=tb_usuario.ID_USUARIO AND Date(CAJ_FECHA_A)='".$fecha."'");     
        return $query->result();
    }
      function consult_factura($fecha){

        $query = $this->db->query("SELECT ID_FACTURA,USU_NOMBRE,ID_CLIENTE,FAC_NUM,FAC_FECHA,FAC_SUBTOTAL,FAC_IMPUESTO,FAC_TOTAL,SUM(FAC_TOTAL) as FAC_TOTAL1 FROM tb_factura, tb_usuario WHERE tb_factura.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_factura.ID_USUARIO=tb_usuario.ID_USUARIO AND Date(FAC_FECHA)='".$fecha."' group by tb_factura.ID_USUARIO");     
        return $query->result();
    }
    
    function consult_accion_caja($fecha){

        $query = $this->db->query("SELECT USU_NOMBRE,ACC_MOTIVO,ACC_DESCRIPCION,ACC_FECHA,ACC_MONTO FROM tb_accion_caja,tb_usuario WHERE tb_accion_caja.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_accion_caja.ID_USUARIO=tb_usuario.ID_USUARIO AND Date(ACC_FECHA)='".$fecha."'");     
        return $query->result();
    }

    //Consulta stock por producto
    function consult_prod($fecha){

        $query = $this->db->query("SELECT SUM(tb_detalle_fac.MOV_CANT) AS CANT,tb_producto.PRO_NOMBRE as PROD_NOM FROM tb_detalle_fac,tb_factura,tb_producto WHERE tb_factura.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_factura.ID_FACTURA = tb_detalle_fac.ID_FACTURA and tb_producto.ID_PRODUCTO=tb_detalle_fac.ID_PRODUCTO AND DATE(tb_factura.FAC_FECHA)= '".$fecha."' order by tb_producto.PRO_NOMBRE");     
        return $query->result();
    }
    function list_facturas($fecha){
        //$qry = $this->db 
       $qry = $this->db->select('tb_factura.ID_FACTURA as factura_id,tb_cliente.ID_CLIENTE as cliente_id,tb_usuario.ID_USUARIO as usuario_id,USU_NOMBRE,USU_APELLIDO,CLI_NOMBRE,CLI_APELLIDO, FAC_FECHA, FAC_TOTAL')
        ->from('tb_factura','tb_usuario','tb_cliente')
        ->where('Date(FAC_FECHA)',$fecha)
        ->where('tb_factura.ID_EMPRESA',$this->session->userdata('id_empresa'))
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

    function consult_caja_user($fecha,$user){

        $query = $this->db->query("SELECT USU_NOMBRE,CAJ_APERTURA_V,CAJ_FECHA_A,CAJ_CIERRE_V,CAJ_FECHA_C,CAJ_ESTADO FROM tb_caja, tb_usuario WHERE tb_caja.ID_USUARIO=tb_usuario.ID_USUARIO AND Date(CAJ_FECHA_A)='".$fecha."' AND tb_usuario.ID_USUARIO ='".$user."' AND tb_usuario.ID_EMPRESA=".$this->session->userdata('id_empresa'));     
        return $query->result();
    }
      function consult_factura_user($fecha,$user){

        $query = $this->db->query("SELECT ID_FACTURA,USU_NOMBRE,ID_CLIENTE,FAC_NUM,FAC_FECHA,FAC_SUBTOTAL,FAC_IMPUESTO,FAC_TOTAL,SUM(FAC_TOTAL) as FAC_TOTAL1 FROM tb_factura, tb_usuario WHERE  tb_usuario.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_factura.ID_USUARIO=tb_usuario.ID_USUARIO AND Date(FAC_FECHA)='".$fecha."'AND tb_usuario.ID_USUARIO ='".$user."'  group by tb_factura.ID_USUARIO ");     
        return $query->result();
    }
    
    function consult_accion_caja_user($fecha,$user){

        $query = $this->db->query("SELECT USU_NOMBRE,ACC_MOTIVO,ACC_DESCRIPCION,ACC_FECHA,ACC_MONTO FROM tb_accion_caja,tb_usuario WHERE  tb_usuario.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_accion_caja.ID_USUARIO=tb_usuario.ID_USUARIO AND Date(ACC_FECHA)='".$fecha."' AND tb_usuario.ID_USUARIO ='".$user."'");     
        return $query->result();
    }


  

   
   

}
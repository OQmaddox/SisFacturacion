<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model{

    public function __constructor(){
        parent::__constructor();

    }
    public function guardarCategoria(){
        $data=$this->input->post();
        echo true;
    }

    //obtener todas las sucursales
    public function count_allCategoria(){
        
        $query = $this->db->query("SELECT count(*) as categoria FROM tb_categoria where ID_EMPRESA=".$this->session->userdata('id_empresa'));
        
        return $query->row();
    }

    public function count_allProductos(){
        
        $query = $this->db->query("SELECT count(*) as producto FROM tb_producto where ID_EMPRESA=".$this->session->userdata('id_empresa'));
        
        return $query->row();
    }

    //obtener todas las sucursales
    public function allCategoria(){
        
        $query = $this->db->query("SELECT * FROM tb_categoria where ID_EMPRESA=".$this->session->userdata('id_empresa'));
        
        return $query;
    }
     //obtener todas las sucursales
     public function allProductos($id_productos){
        
        $query = $this->db->query("SELECT * FROM tb_producto WHERE ID_CATEGORIA=".$id_productos." AND ID_EMPRESA=".$this->session->userdata('id_empresa'));
        
        return $query;
    }
    //obtener todas las sucursales
    public function allProductosPorNombre($nombre){
        
        $query = $this->db->query("SELECT * FROM tb_producto WHERE ID_EMPRESA=".$this->session->userdata('id_empresa')." AND PRO_NOMBRE LIKE '%".$nombre."%'");
        
        return $query;
    }
    public function getCategoria($id_categoria){
        
        $query = $this->db->query("SELECT * FROM tb_categoria WHERE ID_CATEGORIA=".$id_categoria." AND  ID_EMPRESA=".$this->session->userdata('id_empresa'));
        
        
        return $query;
    }
        //obtener todas una succursal
    public function getProducto($id_producto){
            
        $query = $this->db->query("SELECT * FROM tb_producto WHERE ID_PRODUCTO=".$id_producto." AND  ID_EMPRESA=".$this->session->userdata('id_empresa'));
        
        return $query;
    }
    //get stock
    public function getProductoStock($id_producto){
            
        $query = $this->db->query("SELECT * FROM tb_producto WHERE ID_PRODUCTO=".$id_producto." AND  ID_EMPRESA=".$this->session->userdata('id_empresa'));
        foreach($query->result() as $row){
            $stock=$row->PRO_STOCK;
        }
        return $stock;
    }
    //get stock
    public function getAllProductos(){
            
        $query = $this->db->query("SELECT * FROM tb_producto where ID_EMPRESA=".$this->session->userdata('id_empresa'));
        
        return $query;
    }

    //obtener todas una succursal
    public function getProductoCodBarra($cod_barra){
        
        $query = $this->db->query("SELECT * FROM tb_producto WHERE PRO_CODBARRA=".$cod_barra." AND ID_EMPRESA=".$this->session->userdata('id_empresa') );
        
        return $query;
    }

    function mas_vendido(){

        $query = $this->db->query("SELECT count(tb_detalle_fac.ID_PRODUCTO) as cantidad,tb_detalle_fac.ID_PRODUCTO,PRO_NOMBRE,PRO_PRECIOA,PRO_STOCK FROM tb_detalle_fac, tb_producto WHERE tb_producto.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_detalle_fac.ID_PRODUCTO=tb_producto.ID_PRODUCTO  GROUP BY tb_detalle_fac.ID_PRODUCTO ORDER BY COUNT(tb_detalle_fac.ID_PRODUCTO) DESC LIMIT 5");     
        return $query->result();
    }

    function menos_vendido(){

        $query = $this->db->query("SELECT count(tb_detalle_fac.ID_PRODUCTO) as cantidad,tb_detalle_fac.ID_PRODUCTO,PRO_NOMBRE,PRO_PRECIOA,PRO_STOCK FROM tb_detalle_fac, tb_producto WHERE tb_producto.ID_EMPRESA=".$this->session->userdata('id_empresa')." AND tb_detalle_fac.ID_PRODUCTO=tb_producto.ID_PRODUCTO  GROUP BY tb_detalle_fac.ID_PRODUCTO ORDER BY COUNT(tb_detalle_fac.ID_PRODUCTO) ASC LIMIT 5");     
        return $query->result();
    }


}
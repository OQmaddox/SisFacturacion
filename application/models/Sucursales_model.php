<?php
   
   //require __DIR__ . '/../../autoload.php';
   use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
   use Mike42\Escpos\CapabilityProfile;
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursales_model extends CI_Model{

    public function __constructor(){
        parent::__constructor();

    }

    public function imprimir(){

            //$connector = new WindowsPrintConnector("BTP-M300USB");
        try {
              
            $profile = CapabilityProfile::load("simple");
            $connector = new WindowsPrintConnector("smb://DESKTOP-J5Q7BF3/BTP-M300USB");
            $printer = new Printer($connector, $profile);
            $printer -> text("Hello World!\n");
            $printer -> cut();
            $printer -> close();
        } finally {
            $printer -> close();
        }
      
    }

    public function guardarSucursal(){
        $data=$this->input->post();
        echo 'asd';
    }

    //obtener todas las sucursales
    public function allSucursales(){
        
        $query = $this->db->query("SELECT * FROM tb_sucursales");
        
        return $query;
    }

    //obtener todas una succursal
    public function getSucursal($id_sucursal){
            
        $query = $this->db->query("SELECT * FROM tb_sucursales WHERE ID_SUCURSAL=".$id_sucursal);
        
        return $query;
    }

}
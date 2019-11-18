<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model{

   
    function list_emp(){

        $query = $this->db->query("SELECT * FROM tb_empresa");     
        return $query->result();
    }
    function insert_emp($data){
        //$this->load->database();
        $qry = $this->db->insert('tb_empresa',$data);
        return $qry;
    }
    function edit_em($id){
        $query = $this->db->query("SELECT * FROM tb_empresa WHERE tb_empresa.ID_EMPRESA = '".$id."'");
        return $query->result();
    }
    function update_em($data,$id){
        $qry = $this->db
                    ->where('ID_EMPRESA',$id)
                    ->update('tb_empresa',$data);

            return $qry;
    }
    function delete_em($id){
        $qry = $this->db
                    ->delete('tb_empresa',['ID_EMPRESA'=>$id]);
                return $qry;

    }
    

}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    public function __constructor(){
        parent::__constructor();

    }

    public function login($user,$pass){
        $passmd5=md5($pass);

        $query = $this->db->query("SELECT * FROM tb_usuario,tb_perfiles,tb_empresa WHERE tb_usuario.ID_PERFIL=tb_perfiles.ID_PERFIL AND tb_empresa.ID_EMPRESA= tb_usuario.ID_EMPRESA AND USU_CORREO='$user' and USU_PASSWORD='$passmd5'");

        $data;
        foreach ($query->result() as $row)
        {
            //if($user==$row->usu_correo && $passmd5==$row->usu_password){
                $data=$row;
                
                return array(
                    'estado'=>true,
                    'data'=>$row  
                );
            //}
                
        }
        return array(
            'estado'=>false,
            'dataUser'=>null
        );
        
    }

    //regresar datos del usuario
    public function getDataUser(){
        $data['usu_nombre']=$this->session->userdata('usu_nombre');
        $data['usu_apellido']=$this->session->userdata('usu_apellido');
        $data['usu_cedula']=$this->session->userdata('usu_cedula');
        if($this->session->userdata('id_perfil')==1){//administrador
            $data['usu_perfil']='ADMINISTRADOR';
        }else{
            $data['usu_perfil']='CAJERO';
        }
        if($this->session->userdata('usu_estado')==1){
            $data['usu_estado']="activo";
        }else{
            $data['usu_estado']="inactivo";
        }
        return $data;
			
			
			
    }
    function insert_user($data){
        //$this->load->database();
        $qry = $this->db->insert('tb_usuario',$data);
        return $qry;
    }
    function list_profile(){
        //$qry = $this->db 
        $qry = $this->db->select('ID_PERFIL,PER_NOMBRE')
                    ->get('tb_perfiles');
                return $qry->result();
    }
    function list_us(){

        $qry = $this->db->select('tb_usuario.ID_USUARIO as tb_usuario_id,tb_perfiles.ID_PERFIL as tb_perfiles_id ,ID_USUARIO,USU_NOMBRE,USU_APELLIDO,USU_CEDULA,USU_CELULAR,USU_CORREO,USU_GENERO,USU_FOTO,USU_PASSWORD,PER_NOMBRE,USU_ESTADO,USE_FEC_CRE')
        ->from('tb_usuario','tb_perfiles')
        ->where('tb_usuario.ID_EMPRESA='.$this->session->userdata('id_empresa'))
        ->join('tb_perfiles','tb_usuario.ID_PERFIL = tb_perfiles.ID_PERFIL','left')
        ->get();     
        return $qry->result();
    }
    function list_us_all(){
        $query = $this->db->query("SELECT * FROM tb_usuario,tb_perfiles,tb_empresa WHERE tb_usuario.ID_PERFIL=tb_perfiles.ID_PERFIL AND tb_empresa.ID_EMPRESA=tb_usuario.ID_EMPRESA");
        return $query->result();
       

    }
    function edit_us($id){
        $qry = $this->db->select('tb_usuario.ID_USUARIO as tb_usuario_id,tb_perfiles.ID_PERFIL as tb_perfiles_id ,USU_NOMBRE,USU_APELLIDO,USU_CEDULA,USU_CELULAR,USU_CORREO,USU_GENERO,USU_FOTO,USU_PASSWORD,PER_NOMBRE,USU_ESTADO,USE_FEC_CRE')
        ->from('tb_usuario','tb_perfiles')
        ->where('tb_usuario.ID_USUARIO',$id)
        ->join('tb_perfiles','tb_usuario.ID_PERFIL = tb_perfiles.ID_PERFIL','left')
        ->get();
        return $qry->result();
    }
    function update_us($data,$id){
        $qry = $this->db
                    ->where('ID_USUARIO',$id)
                    ->update('tb_usuario',$data);

            return $qry;
    }
    function delete_us($id){
        $qry = $this->db
                    ->delete('tb_usuario',['ID_USUARIO'=>$id]);
                return $qry;

    }
    function getCliente($id){
        $query = $this->db->query("SELECT * FROM tb_cliente WHERE CLI_CEDULA='".$id."' AND ID_EMPRESA=".$this->session->userdata('id_empresa'));
        return $query;
    }


    function list_empresa(){
        $query = $this->db->query("SELECT * FROM tb_empresa");
        return $query->result();
    }


}
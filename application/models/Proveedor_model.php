<?php defined('BASEPATH') or exit('No direct script access allowed');

class Proveedor_model extends CI_Model
{

    public function __constructor()
    {
        parent::__constructor();
    }
    public function insertProveedor($data)
    {
        $this->db->insert('tb_proveedores', $data);
    }
    public function getAllProveedores()
    {
        $query = $this->db->query("SELECT * FROM tb_proveedores where ID_EMPRESA=" . $this->session->userdata('id_empresa') . " order by PRV_ID DESC ");
        return $query;
    }
    public function getProveedor($id)
    {
        $query = $this->db->query("SELECT * FROM tb_proveedores WHERE PRV_ID=" . $id);
        return $query->result();
    }
    public function editProveedor($id, $data)
    {
        $qry = $this->db
            ->where('PRV_ID', $id)
            ->update('tb_proveedores', $data);

        return $qry;
    }
    public function deleteProveedor($id)
    {
        $qry = $this->db
            ->delete('tb_proveedores', ['PRV_ID' => $id]);
        return $qry;
    }
}

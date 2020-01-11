<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock_controller extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        if ($this->session->userdata('estado')) {

            $this->load->model('User_model');
            $data['tabla_categoria'] = $this->tablaCategoria();
            $this->load->view('dashboard/header_layout');
            $this->load->view('dashboard/menu_layout', $this->User_model->getDataUser());

            $this->load->view('dashboard/dashboard_view/stock', $data);
            $this->load->view('dashboard/footer_layout');
        } else {
            redirect(base_url());
        }
    }
    public function tablaStock()
    {
        if ($this->session->userdata('estado')) {
            $this->load->model('User_model');
            $this->load->model('Producto_model');

            $data['tabla_categoria'] = $this->tablaCategoria();
            $data['tabla_productos'] = $this->Producto_model->get_all_productos();
            $this->load->view('dashboard/header_layout');
            $this->load->view('dashboard/menu_layout', $this->User_model->getDataUser());

            $this->load->view('dashboard/dashboard_view/stock_general',$data);
            $this->load->view('dashboard/footer_layout');
        } else {
            redirect(base_url());
        }
    }

    public function tablaCategoria()
    {
        $this->load->model('producto_model');
        $data = $this->producto_model->allCategoria();
        $code = '
        <div class="table-responsive ">
        <table class="table table-borderless">
        <thead>
            <tr>
               <!-- <th>#</th> --!>
                <th>Nombre</th>
               
            </tr>
        </thead>
        <tbody>';
        foreach ($data->result() as $row) {
            $code .= '<tr>';
            // $code.='<th>'.$row->ID_CATEGORIA.'</th>';
            $code .= '<td><button class="btn btn-link" onclick="verProductosStock(' . $row->ID_CATEGORIA . ')">' . $row->CAT_NOMBRE . '</button></td>';

            $code .= '</tr>';
        }
        return $code .= '</tbody></table></div>';
    }

    //ver lista productos ajax
    public function llamarTablaProductos()
    {
        $data = $this->input->post();
        $id_categoria = $data['id_categoria'];
        $this->load->model('producto_model');
        $dato = $this->verTablaProductos($id_categoria);
        $query = $this->producto_model->getCategoria($id_categoria);
        foreach ($query->result() as $row) {
            $nombre = $row->CAT_NOMBRE;
        }
        $data = array(
            'code' => $dato,
            'nombre_categoria' => $nombre
        );
        echo json_encode($data);
    }

    //ver lista de productos
    public function verTablaProductos($id_categoria)
    {

        $data = $this->producto_model->allProductos($id_categoria);
        $code = ' <input class="form-control" id="myInput" type="text" placeholder="Buscar .." onkeyup="myFunction()">
        <br>
        <table class="table table-borderless">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Accion</th>
                <th style="display: none;">cod</th>
            </tr>
        </thead>
        <tbody id="table_body">';
        foreach ($data->result() as $row) {
            $code .= '<tr>';

            $code .= '<td>' . $row->PRO_NOMBRE . '</td>';
            $code .= '<td>' . $row->PRO_STOCK . '</td>';
            $code .= '<td>
            <button type="button" class="btn btn-info btn-sm fas fa-edit" onclick="editStockModel(' . $row->ID_PRODUCTO . ')"></button>
            </td>';
            $code .= '<td style="display: none;">' . $row->PRO_CODBARRA . '</td>';
            $code .= '</tr>';
        }
        return $code;
    }
    public function editStock()
    {
        $data = $this->input->post();
        $id_categoria = $data['id_categoria'];
        $this->load->model('producto_model');
        $stock = $this->producto_model->getProductoStock($data['id_producto']);
        $stock = $stock + $data['stock'];
        $array = array(
            'ID_PRODUCTO' => $data['id_producto'],
            'PRO_STOCK' => $stock
        );
        $this->db->where('ID_PRODUCTO', $data['id_producto']);
        $this->db->update('tb_producto', $array);


        //$dato = $this->verTablaProductos($id_categoria);
        $dato=$this->getAllTableProducts();
        $query = $this->producto_model->getCategoria($id_categoria);
        foreach ($query->result() as $row) {
            $nombre = $row->CAT_NOMBRE;
        }
        $data = array(
            'code' => $dato,
            'nombre_categoria' => $nombre
        );
        echo json_encode($data);
    }
    public function getAllTableProducts(){
        $this->load->model('Producto_model');
        $dat = $this->Producto_model->get_all_productos();
        $code='';
        foreach($dat->result() as $row){
            $code.='<tr>';
            $code.='<td>'.$row->PRO_NOMBRE.'</td>';
            $code.='<td>'.$row->PRO_CODBARRA.'</td>';
            $code.='<td>'.$row->PRO_STOCK.'</td>';
            $code.='<td>$'.$row->PRO_PRECIOA.'</td>';
            $code.='<td>
            <button type="button" class="btn btn-info btn-sm fas fa-edit" onclick="editStockModel('.$row->ID_PRODUCTO.',\''.base_url().'\')"></button>
            </td>';
            $code.='</tr>';

        }
        return $code;


    }
}

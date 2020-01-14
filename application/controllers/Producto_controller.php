<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_controller extends CI_Controller {

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
		if($this->session->userdata('estado')){
            $data['tabla_categoria']=$this->tablaCategoria();

            $this->load->model('User_model');
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			$this->load->view('dashboard/dashboard_view/producto',$data);
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}
		
    }
    public function guardarCategoria(){
        $data=$this->input->post();
        $array = array(
            'ID_CATEGORIA'=>null,
            'CAT_NOMBRE' => $data['categoria_nombre'],
            'CAT_DESCRIPCION' => $data['categoria_descripcion'],
            'ID_EMPRESA'=> $this->session->userdata('id_empresa')
        );
        $this->db->insert('tb_categoria', $array);
        echo $this->tablaCategoria();
    }
    //cargar datos de la tabla
    public function tablaCategoria(){
        $this->load->model('producto_model');
        $data=$this->producto_model->allCategoria();
        $code='<div class="table-responsive ">
        <table class="table table-borderless">
        <thead>
            <tr>
               <!-- <th>#</th>--!>
                <th>Categoría</th>
                
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>';
        foreach($data->result() as $row){
            $code.='<tr>';
           // $code.='<th>'.$row->ID_CATEGORIA.'</th>';
            $code.='<td><button class="btn btn-link" onclick="verProductos('.$row->ID_CATEGORIA.')">'.$row->CAT_NOMBRE.'</button></td>';
            
            $code.='<td>
            <button type="button" class="btn btn-info btn-sm fas fa-edit" onclick="editCategoriaModel('.$row->ID_CATEGORIA.')"></button>
            <button type="button" class="btn btn-danger btn-sm fas fa-trash" onclick="deleteCategoria('.$row->ID_CATEGORIA.')"></button>
            </td>';
            $code.='</tr>';
            
        }
        return $code.='</tbody></table></div>';
    }
    //ver lista productos ajax
    public function llamarTablaProductos(){
        $data=$this->input->post();
        $id_categoria=$data['id_categoria'];
        $this->load->model('producto_model');
        $dato=$this->verTablaProductos($id_categoria);
        $query=$this->producto_model->getCategoria($id_categoria);
        foreach($query->result() as $row){
            $nombre=$row->CAT_NOMBRE;
        }
        $data=array(
            'code'=>$dato,
            'nombre_categoria'=>$nombre
        );
        echo json_encode($data);
    }
    //ver lista de productos
    public function verTablaProductos($id_categoria){  
        
        $data=$this->producto_model->allProductos($id_categoria);
        $code='<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add_producto">Nuevo producto</button>
        <div class="shadow p-3 mb-5 bg-white rounded">
  <input class="form-control" id="myInput" type="text" placeholder="Buscar .." onkeyup="myFunction()">
  <br>
  <div class="table-responsive ">
    <table class="table table-borderless" id="dataTable" >
        <thead>
            <tr>
               
                <th>Producto</th>
                <th>Precio</th>
                <th>Accion</th>
                <th style="display: none;">cod</th>
            </tr>
        </thead> 
        <tbody id="table_body">';
        foreach($data->result() as $row){
            $code.='<tr>'; 
            //$code.='<th>'.$row->ID_PRODUCTO.'</th>';
            $code.='<td>'.$row->PRO_NOMBRE.'</td>';
            $code.='<td>'.$row->PRO_PRECIOA.'</td>';
            $code.='<td>
            <button type="button" class="btn btn-info btn-sm fas fa-edit" onclick="editProductoModel('.$row->ID_PRODUCTO.')"></button>
            <button type="button" class="btn btn-danger btn-sm fas fa-trash" onclick="deleteProducto('.$row->ID_PRODUCTO.')"></button>
            </td>';
            $code.='<td style="display: none;">'.$row->PRO_CODBARRA.'</td>';
            $code.='</tr>';
            
        }
        $code.='</tbody>
        </table>
        </div></div>';
        
        return $code;
        
    }
    //guardar producto
    public function guardarProducto(){
        $data=$this->input->post();

        $array = array(
            'ID_PRODUCTO'=>null,
            'ID_CATEGORIA' => $data['id_categoria'],
            'PRO_NOMBRE' => $data['nombre_producto'],
            'PRO_CODBARRA' => $data['codbarra_producto'],
            'PRO_PRECIOA' => $data['precio_producto_a'],
            'PRO_PRECIOB' => $data['precio_producto_b'],
            'PRO_PRECIOC' => $data['precio_producto_c'],
            'PRO_IMPUESTO' => $data['impuesto_producto'],
            'PRO_STOCK' => $data['stock_producto'],
            'PRO_STOCKM' => $data['stockm_producto'],
            'PRO_DESCRIPCION' => $data['descripcion_producto'],
            'PRO_ESTADO' => $data['estado_producto'],
            'ID_EMPRESA'=> $this->session->userdata('id_empresa')
        );
        $this->db->insert('tb_producto', $array);

        $this->load->model('producto_model');
        $dato=$this->verTablaProductos($data['id_categoria']);
        $query=$this->producto_model->getCategoria($data['id_categoria']);
        foreach($query->result() as $row){
            $nombre=$row->CAT_NOMBRE;
        }
        $data=array(
            'code'=>$dato,
            'nombre_categoria'=>$nombre
        );
        echo json_encode($data);
        
    }

    //borrar la sucursal
    public function deleteProducto(){
        $data=$this->input->post();
        $this->db->where('ID_PRODUCTO',$data['id_producto']);
        $this->db->delete('tb_producto');
         $this->load->model('producto_model');
        $dato=$this->verTablaProductos($data['id_categoria']);
        $query=$this->producto_model->getCategoria($data['id_categoria']);
        foreach($query->result() as $row){
            $nombre=$row->CAT_NOMBRE;
        }
        $data=array(
            'code'=>$dato,
            'nombre_categoria'=>$nombre
        );
        echo json_encode($data);
    }
    //buscar producto
    public function buscarProducto(){
        $data=$this->input->post();
        $id_producto=$data['id_producto'];
        $this->load->model('producto_model');
        $data=$this->producto_model->getProducto($id_producto);
        foreach($data->result() as $row){
            $id_producto=$row->ID_PRODUCTO;
            $id_categoria=$row->ID_CATEGORIA;
            $pro_nombre=$row->PRO_NOMBRE;
            $pro_codbarra=$row->PRO_CODBARRA;
            $pro_precio_a=$row->PRO_PRECIOA;
            $pro_precio_b=$row->PRO_PRECIOB;
            $pro_precio_c=$row->PRO_PRECIOC;
            $pro_impuesto=$row->PRO_IMPUESTO;
            $por_stock=$row->PRO_STOCK;
            $pro_stockm=$row->PRO_STOCKM;
            $pro_descripcion=$row->PRO_DESCRIPCION;
            $pro_estado=$row->PRO_ESTADO;
        }
        if($pro_estado==1){
            $pro_estado=true;
        }else{
            $pro_estado=false;
        }
        $data=array(
            'id_producto'=>$id_producto,
            'id_categoria'=>$id_categoria,
            'pro_nombre'=>$pro_nombre,
            'pro_codbarra'=>$pro_codbarra,
            'pro_precio_a'=>$pro_precio_a,
            'pro_precio_b'=>$pro_precio_b,
            'pro_precio_c'=>$pro_precio_c,
            'pro_impuesto'=>$pro_impuesto,
            'por_stock'=>$por_stock,
            'pro_stockm'=>$pro_stockm,
            'pro_descripcion'=>$pro_descripcion,
            'pro_estado'=>$pro_estado
        );
        echo json_encode($data);
    }

    //editar producto
    public function editProducto(){
        $data=$this->input->post();
        $array = array(
            'ID_PRODUCTO'=>$data['id_producto'],
            'PRO_NOMBRE' => $data['nombre_producto'],
            'PRO_CODBARRA' => $data['codbarra_producto'],
            'PRO_PRECIOA' => $data['precio_producto_a'],
            'PRO_PRECIOB' => $data['precio_producto_b'],
            'PRO_PRECIOC' => $data['precio_producto_c'],
            'PRO_IMPUESTO' => $data['impuesto_producto'],
            'PRO_STOCK' => $data['stock_producto'],
            'PRO_STOCKM' => $data['stockm_producto'],
            'PRO_DESCRIPCION' => $data['descripcion_producto'],
            'PRO_ESTADO' => $data['estado_producto']
        );
        $this->db->where('ID_PRODUCTO', $data['id_producto']);
        $this->db->update('tb_producto', $array);
        $this->load->model('producto_model');
        $dato=$this->verTablaProductos($data['id_categoria']);
        $query=$this->producto_model->getCategoria($data['id_categoria']);
        foreach($query->result() as $row){
            $nombre=$row->CAT_NOMBRE;
        }
        $data=array(
            'code'=>$dato,
            'nombre_categoria'=>$nombre
        );
        $data=array(
            'code'=>$dato,
            'nombre_categoria'=>'asd'
        );
        echo json_encode($data);
    }
	
	public function buscarCategoria(){
        $data=$this->input->post();
        $id_categoria=$data['id_categoria'];
        $this->load->model('producto_model');
        $data=$this->producto_model->getCategoria($id_categoria);

        foreach($data->result() as $row){
            $id_categoria=$row->ID_CATEGORIA;
            $cat_nombre=$row->CAT_NOMBRE;
            $cat_descripcion=$row->CAT_DESCRIPCION;
            
        }
       
        $data=array(
            'id_categoria'=>$id_categoria,
            'cat_nombre'=>$cat_nombre,
            'cat_descripcion'=>$cat_descripcion
            
        );
        echo json_encode($data);
    }

    
    //editar producto
    public function editCategoria(){
        $data=$this->input->post();
        $array = array(
            'ID_CATEGORIA'=>$data['id_categoria'],
            'CAT_NOMBRE' => $data['categoria_nombre'],
            'CAT_DESCRIPCION' => $data['categoria_descripcion']

        );
        $this->db->where('ID_CATEGORIA', $data['id_categoria']);
        $this->db->update('tb_categoria', $array);

        echo $this->tablaCategoria();
    }
    //buscar producto por codigo de barra
    public function buscarProductoCodBarra(){
        $data=$this->input->post();
        $cod_barra=$data['cod_barra'];
        $this->load->model('producto_model');
        $data=$this->producto_model->getProductoCodBarra($cod_barra);
        foreach($data->result() as $row){
            $id_producto=$row->ID_PRODUCTO;
            $id_categoria=$row->ID_CATEGORIA;
            $pro_nombre=$row->PRO_NOMBRE;
            $pro_codbarra=$row->PRO_CODBARRA;
            $pro_precio_a=$row->PRO_PRECIOA;
            $pro_precio_b=$row->PRO_PRECIOB;
            $pro_precio_c=$row->PRO_PRECIOC;
            $pro_impuesto=$row->PRO_IMPUESTO;
            $por_stock=$row->PRO_STOCK;
            $pro_stockm=$row->PRO_STOCKM;
            $pro_descripcion=$row->PRO_DESCRIPCION;
            $pro_estado=$row->PRO_ESTADO;
        }
        if($pro_estado==1){
            $pro_estado=true;
        }else{
            $pro_estado=false;
        }
        $data=array(
            'id_producto'=>$id_producto,
            'id_categoria'=>$id_categoria,
            'pro_nombre'=>$pro_nombre,
            'pro_codbarra'=>$pro_codbarra,
            'pro_precio_a'=>$pro_precio_a,
            'pro_precio_b'=>$pro_precio_b,
            'pro_precio_c'=>$pro_precio_c,
            'pro_impuesto'=>$pro_impuesto,
            'por_stock'=>$por_stock,
            'pro_stockm'=>$pro_stockm,
            'pro_descripcion'=>$pro_descripcion,
            'pro_estado'=>$pro_estado
        );
        echo json_encode($data);
    }
    //borrar la categoria
    public function deleteCategoria(){
        $data=$this->input->post();
        $this->db->where('ID_CATEGORIA',$data['id_categoria']);
        $this->db->delete('tb_categoria');
        $this->load->model('producto_model');
        //$dato=$this->verTablaProductos($data['id_categoria']);
        
        $data=array(
            'code'=>$this->tablaCategoria()
        //    'nombre_categoria'=>$nombre
        );
        echo json_encode($data);
    }
    public function verificarCodBarra(){
        $data=$this->input->post();
        $query= $this->db->query("SELECT * FROM tb_producto WHERE PRO_CODBARRA='".$data['codbarra']."' AND ID_EMPRESA=".$this->session->userdata('id_empresa'));
        foreach($query->result() as $row){
            echo true;
        }
        echo false;

    }

}
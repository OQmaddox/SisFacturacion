<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caja_controller extends CI_Controller {

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

			$this->load->model('User_model');
			
			
			$this->load->view('dashboard/header_layout');
			$this->load->view('dashboard/menu_layout',$this->User_model->getDataUser());

			if($this->session->userdata('caja_estado')){
				$data['lista_categoria']=$this->cargarCategoriaVista();
				$data['lista_productos']=$this->cargarProductosVista();
				$this->load->view('dashboard/dashboard_view/caja',$data);
			}else{	
				$this->load->view('dashboard/dashboard_view/caja_vacia');	
			}
			
			$this->load->view('dashboard/footer_layout');
		}else{
			redirect(base_url());
		}
		
	}

	//funcion para cargar los productos
	function cargarProductosVista(){
		$this->load->model('producto_model');
		$query=$this->producto_model->getAllProductos();
		$codeTotal;
		$header='<div class="row my-custom-scrollbar-product">';
		$header1='<div class="row">';
		$code='';
		$count=0;
		foreach($query->result() as $row){
			$count++;
			if($row->PRO_STOCKM>$row->PRO_STOCK && $row->PRO_STOCK>0){
				$code.='<div class="card " style="width: 7rem;">
				<button class="btn btn-warning o" onclick="calculoProducto('.$row->ID_PRODUCTO.')">
				'.$row->PRO_PRECIOA.'<br>
				'.$row->PRO_NOMBRE.'
				
				</button>
				</div>';
			}else if($row->PRO_STOCK<=0){
				$code.='<div class="card " style="width: 7rem;">
				<button class="btn btn-danger o" onclick="calculoProducto('.$row->ID_PRODUCTO.')" disabled>
				'.$row->PRO_PRECIOA.'<br>
				'.$row->PRO_NOMBRE.'
				
				</button>
				</div>';
			}else{
				$code.='<div class="card " style="width: 7rem;">
				<button class="btn btn btn-primary o" onclick="calculoProducto('.$row->ID_PRODUCTO.')">
				'.$row->PRO_PRECIOA.'<br>
				'.$row->PRO_NOMBRE.'
				
				</button>
				</div>';
			}
		}
		$footer='</div>';
		if($count>29){
			$codeTotal=$header.$code.$footer;
		}else{
			$codeTotal=$header1.$code.$footer;
		}
		
		return $codeTotal;
	}

	//funcion cargar las categorias
	function cargarCategoriaVista(){
		$this->load->model('producto_model');
        $data=$this->producto_model->allCategoria();
		$code='<div class="scrollmenu">';
        foreach($data->result() as $row){
           
			
            $code.='<button type="button" class="btn btn-outline-dark btn-sm" onclick="verListaProductos('.$row->ID_CATEGORIA.')">'.$row->CAT_NOMBRE.'</button>';
            
            
        }
        return $code.='</div>';
		
       
	}

	//funcion para cargar los productos
	function cargarProductosVistaPorCategoria(){
		$data=$this->input->post();
		$id_categoria=$data['id_categoria'];
		$this->load->model('producto_model');
		if($id_categoria==0){
			echo $this->cargarProductosVista();
		}else{
			$query=$this->producto_model->allProductos($id_categoria);
			$codeTotal;
			$header='<div class="row my-custom-scrollbar-product">';
			$header1='<div class="row">';
			$code='';
			$count=0;
			foreach($query->result() as $row){
				$count++;

				if($row->PRO_STOCKM>$row->PRO_STOCK && $row->PRO_STOCK>0){
					$code.='<div class="card " style="width: 7rem;">
					<button class="btn btn-warning o" onclick="calculoProducto('.$row->ID_PRODUCTO.')">
					'.$row->PRO_PRECIOA.'<br>
					'.$row->PRO_NOMBRE.'
					
					</button>
					</div>';
				}else if($row->PRO_STOCK<=0){
					$code.='<div class="card " style="width: 7rem;">
					<button class="btn btn-danger o" onclick="calculoProducto('.$row->ID_PRODUCTO.')" disabled>
					'.$row->PRO_PRECIOA.'<br>
					'.$row->PRO_NOMBRE.'
					
					</button>
					</div>';
				}else{
					$code.='<div class="card " style="width: 7rem;">
					<button class="btn btn btn-primary o" onclick="calculoProducto('.$row->ID_PRODUCTO.')">
					'.$row->PRO_PRECIOA.'<br>
					'.$row->PRO_NOMBRE.'
					
					</button>
					</div>';
				}

				
			}
			$footer='</div>';
			if($count>29){
				$codeTotal=$header.$code.$footer;
			}else{
				$codeTotal=$header1.$code.$footer;
			}
			
			echo $codeTotal;

		}
		
	}
	//cobrar productos
	function cobrarProductos(){
		$this->load->model('caja_model');
		$data=$this->input->post();
		$arreglo=$data['arreglo'];
		$total=$data['total'];
		$subtotal=$data['subtotal'];
		$cedula=$data['cedula'];
		$nombre=$data['nombre'];
		$direccion=$data['direccion'];
		$telefono=$data['telefono'];
		$dataCliente=$this->buscarCliente(trim($cedula));
		
		if($dataCliente['val']){
			//existe no insertar cliente
			$id_cliente=$dataCliente['id_cliente'];
		}else{
			//insertar cliente
			$id_cliente=$this->caja_model->guardarCliente($cedula,$nombre,$direccion,$telefono);
		}
		//ingresar factura
		$id_factura=$this->caja_model->guardarFactura($data,$id_cliente);
		//ingresar detalle factura
		$val=$this->caja_model->ingresarDetalleFactura($arreglo,$id_factura);
		
		echo $id_factura;
	}
	//buscar cliente
	public function buscarCliente($cedula){
		$this->load->model('caja_model');
		$query=$this->caja_model->buscarCliente($cedula);
		$val=false;
		$cedula="";
		$apellido="";
		$nombre="";
		$telefono="";
		$direccion="";
		$id_cliente="";
        foreach($query->result() as $row){
			$val=true;
			$cedula=$row->CLI_CEDULA;
			$apellido=$row->CLI_APELLIDO;
			$nombre=$row->CLI_NOMBRE;
			$telefono=$row->CLI_TELEFONO;
			$direccion=$row->CLI_DIRECCION;
			$id_cliente=$row->ID_CLIENTE;
			
		}
		$data=array(
			'cedula'=>$cedula,
			'apellido'=>$apellido,
			'nombre'=>$nombre,
			'telefono'=>$telefono,
			'direccion'=>$direccion,
			'id_cliente'=>$id_cliente,
			'val'=>$val
		);
		return $data;
	}
	//guardar accion caja
	public function guardarAccionCaja(){
		$data=$this->input->post();
		date_default_timezone_set('America/Guayaquil');
		$array=array(
			'ID_USUARIO'=>$this->session->userdata('id_usuario'),
			'ACC_MOTIVO'=>$data['motivo_caja'],
			'ACC_DESCRIPCION'=>$data['descripcion_caja'],
			'ACC_FECHA'=>date('Y:m:d H:i:s'),
			'ACC_MONTO'=>$data['monto_caja'],
			'ID_EMPRESA'=>$this->session->userdata('id_empresa')

		);
		$this->db->insert('tb_accion_caja', $array);
		echo true;
	}
	//inicio de caja
	public function reguistroInicioCaja(){
		$data=$this->input->post();
		date_default_timezone_set('America/Guayaquil');
		$array=array(
			'ID_USUARIO'=>$this->session->userdata('id_usuario'),
			'CAJ_APERTURA_V'=>$data['monto_caja'],
			'CAJ_FECHA_A'=>$data['descripcion_caja'],
			'CAJ_FECHA_A'=>date('Y:m:d H:i:s'),
			'ID_EMPRESA'=>$this->session->userdata('id_empresa')

		);
		$this->db->insert('tb_caja', $array);
		$insert_id = $this->db->insert_id();
		$this->session->set_userdata('caja_estado', true);
		$this->session->set_userdata('id_caja', $insert_id);
		
		echo true;
	}
	//obtener los datos para el cierre de caja
	public function getDataCierre(){
		if($this->session->userdata('id_caja')!=null){
			$query = $this->db->query("SELECT * FROM tb_caja WHERE ID_CAJA=".$this->session->userdata('id_caja')."");
			$valor_apertura="";
			$fecha_apertura="";
			foreach($query->result() as $row){
				$valor_apertura=$row->CAJ_APERTURA_V;
				$fecha_apertura=$row->CAJ_FECHA_A;
			}
			$array=array(
				'apertura_v'=>$valor_apertura,
				'fecha'=>$fecha_apertura,
				'id_caja'=>$this->session->userdata('id_caja'),
				'caja_estado'=>$this->session->userdata('caja_estado')
			);
		}else{
			$array=array(
				
				'caja_estado'=>false
			);
		}
	
		

		echo json_encode($array);
	}
	//guardatos en el cierre
	public function guardarDataCierre(){
		$data=$this->input->post();
		date_default_timezone_set('America/Guayaquil');
		$array=array(
			'CAJ_CIERRE_V'=>$data['valor'],
			'CAJ_FECHA_C'=>date('Y:m:d H:i:s')

		);
		$this->db->where('ID_CAJA', $this->session->userdata('id_caja'));
		$this->db->update('tb_caja',$array);
		$this->session->set_userdata('caja_estado', false);
		echo false;
		
	}


	//funcion para cargar los productos
	function buscarProductosNombre(){
		$data=$this->input->post();
		$nombre=$data['nombre'];
		$this->load->model('producto_model');
		if($nombre=='-1'){
			echo $this->cargarProductosVista();
		}else{
			$query=$this->producto_model->allProductosPorNombre($nombre);
			$codeTotal;
			$header='<div class="row my-custom-scrollbar-product">';
			$header1='<div class="row">';
			$code='';
			$count=0;
			foreach($query->result() as $row){
				$count++;

				if($row->PRO_STOCKM>$row->PRO_STOCK && $row->PRO_STOCK>0){
					$code.='<div class="card " style="width: 7rem;">
					<button class="btn btn-warning o" onclick="calculoProducto('.$row->ID_PRODUCTO.')">
					'.$row->PRO_PRECIOA.'<br>
					'.$row->PRO_NOMBRE.'
					
					</button>
					</div>';
				}else if($row->PRO_STOCK<=0){
					$code.='<div class="card " style="width: 7rem;">
					<button class="btn btn-danger o" onclick="calculoProducto('.$row->ID_PRODUCTO.')" disabled>
					'.$row->PRO_PRECIOA.'<br>
					'.$row->PRO_NOMBRE.'
					
					</button>
					</div>';
				}else{
					$code.='<div class="card " style="width: 7rem;">
					<button class="btn btn btn-primary o" onclick="calculoProducto('.$row->ID_PRODUCTO.')">
					'.$row->PRO_PRECIOA.'<br>
					'.$row->PRO_NOMBRE.'
					
					</button>
					</div>';
				}

				
			}
			$footer='</div>';
			if($count>29){
				$codeTotal=$header.$code.$footer;
			}else{
				$codeTotal=$header1.$code.$footer;
			}
			
			echo $codeTotal;

		}
		
	}
}
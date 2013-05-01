<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Admin_modelo', '', true);

		if($this->session->userdata('loggedIn'))
		{
			
		}else
		{
			redirect('login', 'location');
		}
	}


	public function index()
	{   
		$resultado          = $this->Admin_modelo->listado();
		$data['resultados'] = $resultado;
		$data['pagina']     = 'admin_gestor';

		$this->load->view('_template.php',$data);
	}

	public function registro_agregar()
	{   
		$data['pagina'] = 	'registro_agregar';
		$this->load->view('_template.php',$data);
	}


	public function guardar_registro()
	{   
		$this->multi_upload();
		$datos['clave']   = $this->input->post('clave');
		$datos['fecha']   = $this->input->post('fecha');
		$datos['cliente'] = $this->input->post('cliente');
		$datos['lugar']   = $this->input->post('lugar');

		$this->Admin_modelo->registro_guardar($datos);
		
		$data['pagina']     = 'admin_gestor';
		$this->load->view('_template.php',$data);
	}

	public function usuario_guardar()
	{	

		$usuario = $this->input->post('usuario');
		$usuario = $this->input->post('password');

		switch( $this->input->post('cmdForm') ) 
		{
		case "Crear Usuario": 
			echo "guardar";
		break;
		case "Cancelar":  
			echo  "cancel";
		break;
		}

	}

	public function multi_upload()
	{   
		set_time_limit(0);
		$this->load->helper('file');
		
		$badera_error		= false;
		$nombre_archivos 	= array();
		
		if(isset($_FILES['archivo']['name'][0]) && ($_FILES['archivo']['name'][0] != ''))
		{ 
			$config['upload_path'] 		= './uploads/';
			$config['allowed_types'] 	= 'jpg|jpeg';
			$config['max_size']			= '5000';
			$this->load->library('upload', $config);
		
			$field_name 		= "archivo";
			$numero_archivos	= sizeof($_FILES['archivo']['name']);
			
			$error				= '';
			// echo $numero_archivos;
			
			for($i=0;$i<$numero_archivos;$i++)
			{
				if ( ! $this->upload->do_upload_multiples($field_name,$i))
				{
					$arreglo_error = array('error' => $this->upload->display_errors('',''));
					$error = $arreglo_error['error'];
					$badera_error = true;
					break;
				}
				else
				{
					$data = array('upload_data' => $this->upload->data($field_name));
					$nombre_archivos[] = $data['upload_data'][ 'file_name'];
				}
			}
		}
		
		if($badera_error)
		{
			
			foreach($nombre_archivos as $nombre)
				unlink('./uploads/'.$nombre);
			redirect('admin/error');
			exit();
		}

		
		$descripcion = $this->input->post('descripcion');
//remplazo de enters por <br> 	
		$descripcion = str_replace("\n","<br>", $descripcion); 
		if(!empty($nombre_archivos))
		{
			$descripcion.= '<br><br>Archivos adjuntos:<br>';
			foreach($nombre_archivos as $nombre)
			{
				$descripcion.= '<a href="'.base_url().'uploads/'.$nombre.'">'.$nombre.'</a><br>';
			}
			$descripcion.= '<br>';
		}
		
		
		redirect('admin/index/');
		

	}

	public function error()
	{

		echo "error";
		die();
	}

}
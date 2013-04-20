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
		var_dump($resultado);


		$this->load->view('_template.php',$data);
	}

	public function registro_agregar()
	{   
		$data['pagina'] = 	'registro_agregar';
		$this->load->view('_template.php',$data);
	}


	public function agregar()
	{   
		$data['pagina'] = 	'admin_gestor';
		$this->load->view('_template.php',$data);
	}
	public function usuario_agregar()
	{
		$data['pagina'] = 	'usuario_agregar';
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
}
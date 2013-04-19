<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');

		if($this->session->userdata('loggedIn'))
		{
			
		}else
		{

			redirect('login', 'location');
		}
	}


	public function index()
	{   
		$data['pagina'] = 	'registro_agregar';
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
}
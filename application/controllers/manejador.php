<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manejador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}


	public function index()
	{
		
		$this->load->view('comercial');
	}

	public function clave()
	{
		echo $this->input->post('clave');

		$this->load->view('seleccion_vista');
	}



}
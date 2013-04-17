<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}


	public function index()
	{
		
		$this->load->view('_template');
	}

	public function clientes()
	{
		$this->load->view('clientes_gestor');
	}


}
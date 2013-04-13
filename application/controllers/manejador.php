<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manejador extends CI_Controller {

	
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('comercial');
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_modelo', '', true);
	}

	public function index()
	{
		if($this->session->userdata('loggedIn'))
		{
			redirect('admin', 'location');
		}

		$this->load->helper(array('form'));
		$this->load->view('login_vista');
	}
	
	public function do_login()
	{
		if($this->session->userdata('loggedIn'))
		{
			redirect('admin', 'location');
		}
		
		// $this->load->library('form_validation');
		// $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		// if($this->form_validation->run() == false)
		// {
		// 	$this->load->view('login/login_view');
		// 	return;
		// }
		
		// $usuario  = $this->input->post('usuario');
		// $password = $this->input->post('password');
		
		// $resultado = $this->Login_modelo->login($usuario, $password);
		
		// if($resultado)
		// {
		// 	$auth = array();
		// 	$auth['nombre']     	  = $resultado->nombre;
		// 	$auth['id_usuario'] 	  = $resultado->id_usuario;
		// 	$auth['id_perfil']        = $resultado->id_perfil;
		// 	$auth['sello']		= $this->Seguridad_modelo->sellar_sesion($auth);
			
		// 	$this->session->set_userdata("loggedIn", $auth);
		// 	redirect('dashboard', 'location');
		// }
		// else
		// {
		// 	$this->session->set_flashdata('mensajeError', 'Los datos de ingreso son incorrectos');
		// 	redirect('login/login', 'location');
		// }
		$data="yes";
		$this->session->set_userdata("loggedIn", $data);

		redirect('admin', 'location');
	}
	
	function logout(){
		$this->session->unset_userdata('loggedIn');
		$this->session->sess_destroy();
		redirect('login', 'location');
	}

}

?>
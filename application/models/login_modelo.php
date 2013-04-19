<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_modelo extends CI_Model{

	public function login($usuario, $password)
	{
		$this->db->select('id_usuario, nombre, usuario, id_perfil, email');
		$this->db->from('usuarios');
		$this->db->where('usuario = ' . "'" . $this->db->escape_str( $usuario ) . "'");
		$this->db->where('password = ' . "'" . MD5($password) . "'");
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	public function validar_permiso($id_perfil, $clave)
	{
		$sql   = "SELECT a.id_permiso
				  FROM rel_perfiles_permisos AS a 
				  INNER JOIN perfiles AS b ON a.id_perfil = b.id_perfil 
				  INNER JOIN perfiles_permisos AS c ON a.id_permiso = c.id_permiso
				  WHERE a.id_perfil = '".$id_perfil."' AND codigo = '$clave'";	
		$query = $this->db->query($sql);
		
		return $query->num_rows();
	}

}

?>
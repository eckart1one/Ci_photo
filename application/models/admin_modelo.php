<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_modelo extends CI_Model{

	public function listado()
	{
		// $this->db->select('nip');
		// $this->db->from('usuarios');
		// $this->db->where('nip = ' . "'" . $this->db->escape_str( $usuario ) . "'");
		// $this->db->where('password = ' . "'" . MD5($password) . "'");
		// $this->db->limit(1);
		$this->db->from('cuentas');
		$query = $this->db->get();
		return $query->result();
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

	public function agregar_usuario($usuario, $password)
	{
		$this->db->select('nip');
		$this->db->from('usuarios');
		$this->db->where('nip = ' . "'" . $this->db->escape_str( $usuario ) . "'");
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

}

?>
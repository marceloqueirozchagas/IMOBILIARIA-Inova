<?php
	class Usuarios_model extends CI_Model
	{
		public function Login($Login, $Senha)
		{
			$this->db->where('Login', $Login);
			$this->db->where('Senha', $Senha);
			$query = $this->db->get('usuarios');
			return $query->row();
		}
	}
?>
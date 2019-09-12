<?php
class Finalidade_model extends CI_Model
{
	public function ObterLista()
	{
		$query = $this->db->get('finalidade');
		return $query->result();
	}
}
?>
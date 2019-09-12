<?php
class TipoImovel_model extends CI_Model
{
	public function ObterLista()
	{
		$query = $this->db->get('tipoimovel');
		return $query->result();
	}
}
?>
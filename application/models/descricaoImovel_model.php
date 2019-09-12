<?php
class DescricaoImovel_model extends CI_Model
{
	public function ObterLista($TipoDescricao)
	{
		$query = $this->db->get_where('descricaoimovel', array('TipoDescricao' => $TipoDescricao));
		return $query->result();
	}
}
?>
<?php
class ImovelDescricao_model extends CI_Model
{
	public function Inserir($ImovelDescricao = array())
	{
		$query = $this->db->insert('imoveldescricao', $ImovelDescricao);
	}
	
	public function ObterLista($CodigoImovel)
	{
		$query = $this->db->get_where('imoveldescricao', array('CodigoImovel'  => $CodigoImovel));
		return $query->result();
	}
}
?>
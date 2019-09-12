<?php
class Cidades_model extends CI_Model
{
	function ObterCidades($EstadoID)
	{
		return $this->db->select('cidades.CidadeID, cidades.Nome')
						->from('cidades')
						->join('estados', 'cidades.EstadoID = estados.EstadoID')
						->where( array('estados.EstadoID' => $EstadoID) )
						->get()->result();
	}
}
?>
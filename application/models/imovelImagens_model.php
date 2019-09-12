<?php
class ImovelImagens_model extends CI_Model
{
	public function Inserir($ImovelImagens = array())
	{
		$this->db->insert('imovelimagens', $ImovelImagens);
	}	
	
	public function ObterLista($CodigoImovel)
	{
		$this->db->order_by("Ordem", "asc");
		$query = $this->db->get_where('imovelimagens',array('CodigoImovel' => $CodigoImovel));
		return $query->result();
	}
	
	public function Excluir($CodigoImovel, $NomeImagem)
	{
		$this->db->where('CodigoImovel',$CodigoImovel);
		$this->db->where('NomeImagem', $NomeImagem);
		$this->db->delete('imovelimagens');
	}
}
?>
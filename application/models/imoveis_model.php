<?php
class Imoveis_model extends CI_Model
{	
	public function GerarCodigoImovel($tipo)
	{
		$mes = date('m');
		$ano = date('y');
		$numero = 1;
		$ultimo = "";
		
		$query = $this->db->get('imoveis');
		$ultimo = $query->last_row('array');
		$ultimo = $ultimo['ImovelID'];

		if ($ultimo != "")
			$numero =  $ultimo + 1;
			
		if ($numero < 10)
			$numero = '0'.$numero;

		$codigoImovel = $tipo.$mes.$ano.$numero; 
		

		return $codigoImovel;
	}
	
	public function Inserir($Imoveis = array())
	{
		$query = $this->db->insert('imoveis', $Imoveis);
	}
	
	public function Alterar($Condominios = array(), $CondominioID)
	{
		$this->db->where('CondominioID', $CondominioID);
		$this->db->update('condominios', $Condominios);
	}
	
	public function ObterLista()
	{
		$query = $this->db->get('imoveis');
		return $query->result();
	}
	public function ObterTotal()
	{
		return $this->db->get('imoveis')->num_rows();
	}
		
	public function ObterImovel($CodigoImovel)
	{
		$this->db->where('CodigoImovel', $CodigoImovel);
		$query = $this->db->get('imoveis');
		return $query->row();
	}
	
	public function Excluir($CodigoImovel)
	{
		// apaga imovel
		$this->db->where('CodigoImovel', $CodigoImovel);
		$this->db->delete('imoveis'); 
		
		// apaga descricao imovel
		$this->db->where('CodigoImovel', $CodigoImovel);
		$this->db->delete('imoveldescricao'); 
		
		$imagens = $this->imovelImagens_model->ObterLista($CodigoImovel);
		
		foreach($imagens as $item)
		{
			$tipo = substr($item->NomeImagem,0,2);
			unlink('assets/img/imoveis/'.$tipo.'/'.$item->NomeImagem);
		}
		
		// apaga imagens do imovel
		$this->db->where('CodigoImovel', $CodigoImovel);
		$this->db->delete('imovelimagens');
	}
}
?>
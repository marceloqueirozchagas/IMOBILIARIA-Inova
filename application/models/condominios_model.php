<?php
	class Condominios_model extends CI_Model
	{
		public function Inserir($Condominios = array())
		{
			$query = $this->db->insert('condominios', $Condominios);
			return $this->db->insert_id();
		}
		
		public function Alterar($Condominios = array(), $CondominioID)
		{
			$this->db->where('CondominioID', $CondominioID);
			$this->db->update('condominios', $Condominios);
		}
		
		public function ObterUltimoCondominio()
		{
			$query = $this->db->get('condominios');
			return $ultimoCondominio = $query->last_row('array');
		}
		
		public function ObterLista()
		{
			$query = $this->db->get('condominios');
			return $query->result();
		}
		
		public function ObterCondominio($CondominioID)
		{
			$this->db->where('condominioID', $CondominioID);
			$query = $this->db->get('Condominios');
			return $query->row();
		}
		
		public function ObterTotal()
		{
			return $this->db->get('condominios')->num_rows();
		}
		
		public function ObterListaPaginacao($inicio, $fim)
		{
			$query = $this->db->get('condominios', $inicio, $fim);
			return $query->result();
		}
		
		public function Excluir($CondominioID)
		{
			$this->db->where('condominioID', $CondominioID);
			$this->db->delete('Condominios'); 
		}
	}
?>
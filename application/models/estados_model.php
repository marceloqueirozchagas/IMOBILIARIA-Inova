<?php
	class Estados_model extends CI_Model 
	{
		function ObterEstados() 
		{
			return $this->db->get('estados')->result();
		}
	}
?>
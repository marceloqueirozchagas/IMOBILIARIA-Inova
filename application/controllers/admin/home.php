<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->recursos->usuarioLogado();
	}
	
	public function index()
	{
		$this->recursos->setarMensagem('Seja Bem Vindo ao Painel de Controle da Inova Imóveis.','I');
		$data['titulo'] = 'Inova Imoveis - PAINEL DE ADMINISTRAÇÃO';
		$data['pagina'] = "admin/home";
		$this->load->view('admin/layout', $data);
	}
}
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Recursos 
{
	// Setar uma mensagem para ser exibida na pagina principal
    function setarMensagem($msg,$tipo)
	{
		$CI =& get_instance();
		$CI->load->library('session');
	
		$CI->session->set_userdata('tipoMensagem', $tipo);
		$CI->session->set_userdata('mensagem', $msg);
	}
	
	// Retorna uma mensagem salva na sessao
	function retornarMensagem()
    {
		$CI =& get_instance();
		$CI->load->library('session');
	
		$tipoMensagem = $CI->session->userdata('tipoMensagem');
		$mensagem = $CI->session->userdata('mensagem');;
		
		if($mensagem != '' && $tipoMensagem != '')
		{
			switch($tipoMensagem)
			{
				case 'A':
				$tipoMensagem = 'alerta';
				break;
				
				case 'E':
				$tipoMensagem = 'erro';
				break;
				
				case 'S':
				$tipoMensagem = 'sucesso';
				break;
				
				case 'I':
				$tipoMensagem = 'info';
				break;
			}
			echo "<h4 class='".$tipoMensagem."'>".$mensagem."</h4>";
			
		$CI->session->set_userdata('tipoMensagem', '');
		$CI->session->set_userdata('mensagem', '');
		
		}
    }
	
	// Verificar se usuario logado
	function usuarioLogado()
	{
		$CI =& get_instance();
		$CI->load->library('session');
		
		if($CI->session->userdata('logado') == '')
			redirect(site_url('admin/usuarios'));
	}
}
?>
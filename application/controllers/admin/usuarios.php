<?php
class Usuarios extends CI_Controller
{
	function Index()
	{
		$this->load->view('admin/usuarios/login');
	}
	
	function login()
	{
		$this->load->model('usuarios_model');
		if($this->form_validation->run())
		{
			$login = $this->input->post('txtLogin');
			$senha = sha1($this->input->post('txtSenha'));
			
			$usuario = $this->usuarios_model->login($login,$senha);
			if($usuario)
			{
				$this->session->set_userdata('usuario',$usuario->NomeCompleto);
				$this->session->set_userdata('email',$usuario->Email);
				$this->session->set_userdata('logado', 'true');
				
				redirect(site_url('admin/home'));
			}
			else
			{
				$data['msg'] = 'Login/Senha Inválidos!';
				$this->load->view('admin/usuarios/login',$data);
			}
		}
		else
		{
			$this->load->view('admin/usuarios/login');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url().'admin');
	}
}
?>
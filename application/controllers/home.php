<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['pagina'] = "home";
		$this->load->view('layout', $data);
	}
}
?>
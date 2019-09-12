<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function index()
	{
		$data['pagina'] = "admin/home";
		$this->load->view('layout', $data);
	}
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nmp extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function page(){
		$page['id'] =  $this->uri->segment(3);
		$this->load->view('index', $page);
	}
}

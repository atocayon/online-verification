<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nmp extends CI_Controller {
	public function __construct() {
	  parent::__construct();
	  $this->load->model('queries');
	}

	public function index()
	{
		$this->load->view('index');
	}

	
	public function search_byName(){
			$this->input->post('fname');
			$this->input->post('lname');
			$this->input->post(bday);

	}
}

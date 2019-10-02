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

	public function page(){
		$page['id'] =  $this->uri->segment(3);
		$this->load->view('index', $page);
	}

	public function insert_data(){

	}
}

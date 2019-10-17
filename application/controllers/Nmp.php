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
			$data['record'] = $this->queries->search_byName()->result_array();
			if($data['record'] == NULL){
				$data['record'] = ['response' =>  'null'];
				echo json_encode($data);
			}else{
				echo json_encode($data);
			}

	}

	public function search_byCertNum(){
		$data['record'] = $this->queries->search_byCertNum()->result_array();
		if ($data['record'] == NULL) {
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}


	public function search_byPDC(){
		$data['record'] = $this->queries->search_byPDC()->result_array();
		if ($data['record'] == NULL) {
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}
}

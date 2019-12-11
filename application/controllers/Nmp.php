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
			$remote_ip = $_SERVER['REMOTE_ADDR'];
			$mac_address = exec('getmac');
			$data['record'] = $this->queries->search_byName()->result_array();
			if($data['record'] == NULL){
				$data['record'] = ['response' =>  'null'];
				echo json_encode($data);
			}else{
				$name = $this->input->post("fname")." ".$this->input->post("lname");
				$this->queries->userActivity($remote_ip, $mac_address, "search by name", $name);
				echo json_encode($data);
			}

	}

	public function search_byCertNum(){
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$mac_address = exec('getmac');
		$data['record'] = $this->queries->search_byCertNum()->result_array();
		if ($data['record'] == NULL) {
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}else{
			$cert_num = $this->input->post('certnum');
			$this->queries->userActivity($remote_ip, $mac_address, "search by certnumber", $cert_num);
			echo json_encode($data);
		}
	}


	public function search_byPDC(){
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$mac_address = exec('getmac');
		$data['record'] = $this->queries->search_byPDC()->result_array();
		if ($data['record'] == NULL) {
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}else{
			$name = $this->input->post("fname")." ".$this->input->post("lname");
			$this->queries->userActivity($remote_ip, $mac_address, "search by PDC", $name);
			echo json_encode($data);
		}
	}
}

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

	public function reservation(){
		$this->load->view('reserve');
	}

	public function sendReservation(){
		$code = $this->input->post("code");
		$description = $this->input->post("description");
		$dateStart = $this->input->post("dateStart");
		$dateEnd = $this->input->post("dateEnd");
		$fname = $this->input->post("fname");
		$mname = $this->input->post("mname");
		$lname = $this->input->post("lname");
		$email = $this->input->post("email");

		$query = $this->queries->insertReservation($fname, $mname, $lname, $email, $code);
		if ($query) {
			$this->load->library('email');
			$mail_config['smtp_host'] = 'smtp.gmail.com';
			$mail_config['smtp_port'] = '587';
			$mail_config['smtp_user'] = 'atocayon27@gmail.com';
			$mail_config['_smtp_auth'] = TRUE;
			$mail_config['smtp_pass'] = 'ruozrswkmmpdfcsj';
			$mail_config['smtp_crypto'] = 'tls';
			$mail_config['protocol'] = 'smtp';
			$mail_config['mailtype'] = 'html';
			$mail_config['send_multipart'] = FALSE;
			$mail_config['charset'] = 'utf-8';
			$mail_config['wordwrap'] = TRUE;
			$this->email->initialize($mail_config);

			$this->email->set_newline("\r\n");

			$this->load->library('email');
			$this->email->from($email, $fname);
			$this->email->to('atocayon27@gmail.com');
			$this->email->subject("National Maritime Polytechnic");
			$this->email->message("You've successfully
			reserve a slot for ".$description." with a schedule (From: ".$dateStart." To: ".$dateEnd."),
			please visit the National Maritime Polytechnic at Brgy. Cabalawan Tacloban City and proceed to registrar to enroll the course you've reserved 2-3 days before the start of the course schedule.");
			if ($this->email->send()) {
				echo json_encode(array("insert" => "success"));
			}else{
				echo $this->email->print_debugger();
			}

		}else{
			echo json_encode(array("insert" => "failed"));
		}
	}
}

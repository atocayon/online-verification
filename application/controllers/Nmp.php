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

	public function getOfferedCourses(){
		$data['record'] = $this->queries->getOfferedCourses()->result_array();
		// print_r($data);
		if ($data['record'] == NULL) {
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}

	public function category(){
		$data['record'] = $this->queries->category()->result_array();
		if ($data['record'] == NULL) {
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}

	public function reservation(){
		$this->load->view('reserve');
	}

	public function sendReservation(){
		$data['record'] = $this->queries->checkReservation()->result_array();
		if ($data['record'] == NULL) {
			$description = $this->input->post("description");
			$fname = $this->input->post("fname");
			$mname = $this->input->post("mname");
			$lname = $this->input->post("lname");
			$email = $this->input->post("email");
			$address = $this->input->post("address");
			$mobileNum = $this->input->post("mobileNum");
			$srnNum = $this->input->post("srnNum");
			$code = $this->input->post("code");
			$dateStart = $this->input->post("dateStart");
			$dateEnd = $this->input->post("dateEnd");
			$query = $this->queries->insertReservation($fname, $mname, $lname, $email, $code, $dateStart, $dateEnd, $address, $mobileNum);

			if ($query) {
				$this->load->library('email');
				$mail_config['smtp_host'] = 'smtp.gmail.com';
				$mail_config['smtp_port'] = '587';
				$mail_config['smtp_user'] = 'nationalmaritimepolytechnic@gmail.com';
				$mail_config['_smtp_auth'] = TRUE;
				$mail_config['smtp_pass'] = 'ovoyrmijinclidty';
				$mail_config['smtp_crypto'] = 'tls';
				$mail_config['protocol'] = 'smtp';
				$mail_config['mailtype'] = 'html';
				$mail_config['send_multipart'] = FALSE;
				$mail_config['charset'] = 'utf-8';
				$mail_config['wordwrap'] = TRUE;
				$mail_config['smtp_conn_options'] = array(
							'ssl' => array(
									'verify_peer' => false,
									'verify_peer_name' => false,
									'allow_self_signed' => true
							)
					);
				$this->email->initialize($mail_config);

				$this->email->set_newline("\r\n");

				$this->email->from('info@nmp.gov.ph', 'National Maritime Polytechnic');
				$this->email->to($email);
				$this->email->cc('info@nmp.gov.ph');
				$this->email->subject("National Maritime Polytechnic Online Reservation");
				$this->email->message("Course reservation for <b>".$description."</b><br>
				<b>Name: ".$fname." ".$mname." ".$lname."</b>
				<br>
				<b>From: ".$dateStart."</b>
				<br>
				<b>To: ".$dateEnd."</b>
				<br>
				The <b>National Maritime Polytechnic</b> would like to thank you for reserving a slot. Kindly visit our office to confirm your reservation before the start of the course schedule.<br><br>
				Best regards,<br><br>
				National Maritime Polytechnic
				");
				if ($this->email->send()) {
					$data['record'] = ['response' => 'success'];
					echo json_encode($data);
				}else{
					echo $this->email->print_debugger();
				}

			}else{
				$data['record'] = ['response' => 'failed'];
				echo json_encode($data);
			}
		}else{
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}

	}


	public function admin(){
		if ($this->session->userdata('user')) {
			$this->load->view("traineeReservations");
		}else{
			$this->load->view("adminLogin");
		}

	}

	public function confirmReservation(){
		$id = $_GET["id"];
		$email = $_GET['email'];
		$module = $_GET['module'];
		$confirm = $this->queries->confirmReservation($id);
		if ($confirm) {
			$this->load->library('email');
			$mail_config['smtp_host'] = 'smtp.gmail.com';
			$mail_config['smtp_port'] = '587';
			$mail_config['smtp_user'] = 'nationalmaritimepolytechnic@gmail.com';
			$mail_config['_smtp_auth'] = TRUE;
			$mail_config['smtp_pass'] = 'ovoyrmijinclidty';
			$mail_config['smtp_crypto'] = 'tls';
			$mail_config['protocol'] = 'smtp';
			$mail_config['mailtype'] = 'html';
			$mail_config['send_multipart'] = FALSE;
			$mail_config['charset'] = 'utf-8';
			$mail_config['wordwrap'] = TRUE;
			$mail_config['smtp_conn_options'] = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
			$this->email->initialize($mail_config);

			$this->email->set_newline("\r\n");

			$this->email->from('info@nmp.gov.ph', 'National Maritime Polytechnic');
			$this->email->to($email);
			$this->email->cc('info@nmp.gov.ph');
			$this->email->subject("National Maritime Polytechnic Online Reservation");
			$this->email->message("Your reservation for ".$module." had been confirmed.
			<br>
			If you have some question or clarification just visit our office <b>at Barangay Cabalawan Tacloban City</b> or you can just contact us through
			<b>Mobile Number (+63) 936 786 2196</b><br>
			or Like Us on <b>Facebook @nmptraningcenter</b> to see some updates.
			You can also check our website <b>http://nmp.gov.ph/</b>
			<br><br>
			Thank you for choosing <b>National Maritime Polytechnic</b>
			<br><br>
			Best regards,<br><br>
			National Maritime Polytechnic
			");

			if ($this->email->send()) {
					redirect(base_url()."nmp/admin");
			}else{
				echo $this->email->print_debugger();
			}


		}else{
			echo "something went wrong...";
		}
	}


	public function deleteReservation(){
		$id = $_GET["id"];
		$email = $_GET['email'];
		$module = $_GET['module'];
		$delete = $this->queries->deleteReservation($id);
		if ($delete) {
			$this->load->library('email');
			$mail_config['smtp_host'] = 'smtp.gmail.com';
			$mail_config['smtp_port'] = '587';
			$mail_config['smtp_user'] = 'nationalmaritimepolytechnic@gmail.com';
			$mail_config['_smtp_auth'] = TRUE;
			$mail_config['smtp_pass'] = 'ovoyrmijinclidty';
			$mail_config['smtp_crypto'] = 'tls';
			$mail_config['protocol'] = 'smtp';
			$mail_config['mailtype'] = 'html';
			$mail_config['send_multipart'] = FALSE;
			$mail_config['charset'] = 'utf-8';
			$mail_config['wordwrap'] = TRUE;
			$mail_config['smtp_conn_options'] = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
			$this->email->initialize($mail_config);

			$this->email->set_newline("\r\n");

			$this->email->from('info@nmp.gov.ph', 'National Maritime Polytechnic');
			$this->email->to($email);
			$this->email->cc('info@nmp.gov.ph');
			$this->email->subject("National Maritime Polytechnic Online Reservation");
			$this->email->message("Sorry, your reservation for ".$module." has been remove.<br>If you are still interested in enrolling a training course, you can still set a reservation anytime for other training courses offered by <b>National Maritime Polytechnic</b>.
			<br>
			If you have some question or clarification just visit our office <b>at Barangay Cabalawan Tacloban City</b> or you can just contact us through
			<b>Mobile Number (+63) 936 786 2196</b><br>
			or Like Us on <b>Facebook @nmptraningcenter</b> to see some updates.
			You can also check our website <b>http://nmp.gov.ph/</b>
			<br><br>
			Thank you for choosing <b>National Maritime Polytechnic</b>
			<br><br>
			Best regards,<br><br>
			National Maritime Polytechnic
			");

			if ($this->email->send()) {
				redirect(base_url()."nmp/admin");
			}else{
				echo $this->email->print_debugger();
			}

		}
		else{
			echo "something went wrong...";
		}
	}

	public function login(){
		$data['record'] = $this->queries->login()->result_array();
		if ($data['record'] == NULL) {
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}else{
			$this->load->library('session');
			$this->session->set_userdata('user', $data['record'][0]['uname']);
			echo json_encode($data);
		}
	}

	public function logout(){
		$this->session->unset_userdata('user');
		$this->admin();
	}

	public function applicantReservation(){
		$data['record'] = $this->queries->applicantReservation()->result_array();
		if ($data['record'] == NULL) {
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}

	public function generateReports(){
		$data['record'] = $this->queries->generateReports()->result_array();
		if ($data['record'] == NULL) {
			$data['record'] = ['response' => 'null'];
			echo json_encode($data);
		}else{
			echo json_encode($data);
		}
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queries extends CI_Model
{

  public function search_byName(){
    $param = ['%'.$this->input->post('fname').'%','%'.$this->input->post('lname').'%',date('Y-m-d',strtotime($this->input->post('bday')))];
		$sql = "SELECT concat(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(tbl_trainee.mname, 'ilovenmp1230988'),1),'. ', AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988'),' ',tbl_trainee.suffix) AS name, tbl_module.module AS module, concat(DATE_FORMAT(tbl_schedule.start, '%Y %b %d'),' to ', DATE_FORMAT(tbl_schedule.end, '%Y %b %d')) AS duration, tbl_training.certnumber AS cert_num
					FROM trainee AS tbl_trainee
					INNER JOIN training AS tbl_training on tbl_trainee.trid = tbl_training.trid
					INNER JOIN schedule AS tbl_schedule on tbl_training.code = tbl_schedule.code
					INNER JOIN module AS tbl_module on tbl_schedule.modcode = tbl_module.modcode
					WHERE CONVERT(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988') USING latin1) LIKE ? AND CONVERT(AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988') USING latin1) LIKE ? AND bdate = ?";
			$query = $this->db->query($sql,$param);
			// var_dump($this->db->last_query());die();
			return $query;
  }

  public function search_byCertNum(){
      $param = [$this->input->post('certnum')];
			$sql = "SELECT concat(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988'),' ',LEFT(AES_DECRYPT(tbl_trainee.mname, 'ilovenmp1230988'),1),'. ',AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988'),' ',tbl_trainee.suffix) AS name, tbl_module.module AS module, concat(DATE_FORMAT(tbl_schedule.start, '%Y %b %d'),' to ', DATE_FORMAT(tbl_schedule.end, '%Y %b %d')) AS duration, tbl_training.certnumber AS cert_num
					FROM trainee AS tbl_trainee
          INNER JOIN training AS tbl_training on tbl_trainee.trid = tbl_training.trid
					INNER JOIN schedule AS tbl_schedule on tbl_training.code = tbl_schedule.code
					INNER JOIN module AS tbl_module on tbl_schedule.modcode = tbl_module.modcode
					WHERE tbl_training.certnumber = ?";
			$query = $this->db->query($sql,$param);

			//var_dump($this->db->last_query());die();
			return $query;
  }

  public function search_byPDC(){

    $param = ['%'.$this->input->post('fname').'%','%'.$this->input->post('lname').'%',date('Y-m-d',strtotime($this->input->post('bday'))),$this->input->post('module')];
			$sql = "SELECT concat(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988'),' ',LEFT(AES_DECRYPT(tbl_trainee.mname, 'ilovenmp1230988'),1),'. ', AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988'),' ',tbl_trainee.suffix) AS name, tbl_module.module AS module, concat(DATE_FORMAT(tbl_schedule.start, '%Y %b %d'),' to ', DATE_FORMAT(tbl_schedule.end, '%Y %b %d')) AS duration, tbl_training.certnumber AS cert_num
					FROM trainee AS tbl_trainee
					INNER JOIN training AS tbl_training on tbl_trainee.trid = tbl_training.trid
					INNER JOIN schedule AS tbl_schedule on tbl_training.code = tbl_schedule.code
					INNER JOIN module AS tbl_module on tbl_schedule.modcode = tbl_module.modcode
					WHERE CONVERT(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988') USING latin1) LIKE ? AND CONVERT(AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988') USING latin1) LIKE ? AND bdate = ? AND tbl_module.modcode = ? group by tbl_training.code order by tbl_training.code";
			$query = $this->db->query($sql,$param);
			//var_dump($this->db->last_query());die();
			return $query;

  }

  public function userActivity($remote_ip,$mac_address, $action, $data){
    $sql = $this->db->query("INSERT INTO everification_activity_logs (ipAddress, macAddress, action, fetchData) VALUES (AES_ENCRYPT('$remote_ip', 'ilovenmp1230988'), AES_ENCRYPT('$mac_address', 'ilovenmp1230988'), '$action', AES_ENCRYPT('$data', 'ilovenmp1230988'))");
    return $sql;
  }


}

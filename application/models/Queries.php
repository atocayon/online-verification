<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queries extends CI_Model
{

  public function search_byName(){
    $param = [
      '%'.$this->input->post('fname').'%',
      '%'.$this->input->post('lname').'%',
      $this->input->post('bday')
    ];
		$sql = "SELECT concat(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(tbl_trainee.mname, 'ilovenmp1230988'),1),'. ', AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988'),' ',tbl_trainee.suffix) AS name,
    coalesce(tbl_module.module,tbl_schedule.module) AS module,
    concat(DATE_FORMAT(tbl_schedule.start, '%Y %b %d'),' to ', DATE_FORMAT(tbl_schedule.end, '%Y %b %d')) AS duration,
    tbl_training.certnumber AS cert_num
					FROM trainee AS tbl_trainee
					LEFT JOIN training AS tbl_training on tbl_trainee.trid = tbl_training.trid
					LEFT JOIN schedule AS tbl_schedule on tbl_training.code = tbl_schedule.code
					LEFT JOIN module AS tbl_module on tbl_schedule.modcode = tbl_module.modcode
					WHERE CONVERT(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988') USING latin1) LIKE ?
          AND CONVERT(AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988') USING latin1) LIKE ?
          AND bdate = ?";
			$query = $this->db->query($sql,$param);
			// var_dump($this->db->last_query());die();
			return $query;
  }

  public function search_byCertNum(){
      $param = [
        $this->input->post('certnum'),
        '%'.$this->input->post('fname').'%',
        '%'.$this->input->post('lname').'%',
        $this->input->post('bday')
      ];
			$sql = "SELECT concat(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988'),' ',LEFT(AES_DECRYPT(tbl_trainee.mname, 'ilovenmp1230988'),1),'. ',AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988'),' ',tbl_trainee.suffix) AS name,
      tbl_module.module AS module,
      concat(DATE_FORMAT(tbl_schedule.start, '%Y %b %d'),' to ', DATE_FORMAT(tbl_schedule.end, '%Y %b %d')) AS duration
					FROM trainee AS tbl_trainee
          INNER JOIN training AS tbl_training on tbl_trainee.trid = tbl_training.trid
					INNER JOIN schedule AS tbl_schedule on tbl_training.code = tbl_schedule.code
					INNER JOIN module AS tbl_module on tbl_schedule.modcode = tbl_module.modcode
					WHERE tbl_training.certnumber = ?
          AND CONVERT(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988') USING latin1) LIKE ?
          AND CONVERT(AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988') USING latin1) LIKE ?
          AND bdate = ?";
			$query = $this->db->query($sql,$param);

			//var_dump($this->db->last_query());die();
			return $query;
  }

  public function search_byPDC(){

    $param = [
      '%'.$this->input->post('fname').'%',
      '%'.$this->input->post('lname').'%',
      $this->input->post('bday'),
      $this->input->post('module')
    ];
			$sql = "SELECT
      concat(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988'),' ',LEFT(AES_DECRYPT(tbl_trainee.mname, 'ilovenmp1230988'),1),'. ', AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988'),' ',tbl_trainee.suffix) AS name,
      tbl_module.module AS module,
      concat(DATE_FORMAT(tbl_schedule.start, '%Y %b %d'),' to ', DATE_FORMAT(tbl_schedule.end, '%Y %b %d')) AS duration,
      tbl_training.certnumber AS cert_num
					FROM trainee AS tbl_trainee
					INNER JOIN training AS tbl_training on tbl_trainee.trid = tbl_training.trid
					INNER JOIN schedule AS tbl_schedule on tbl_training.code = tbl_schedule.code
					INNER JOIN module AS tbl_module on tbl_schedule.modcode = tbl_module.modcode
					WHERE CONVERT(AES_DECRYPT(tbl_trainee.fname, 'ilovenmp1230988') USING latin1) LIKE ?
          AND CONVERT(AES_DECRYPT(tbl_trainee.lname, 'ilovenmp1230988') USING latin1) LIKE ?
          AND bdate = ?
          AND tbl_module.modcode = ?
          group by tbl_training.code order by tbl_training.code";
			$query = $this->db->query($sql,$param);
			//var_dump($this->db->last_query());die();
			return $query;

  }

  public function userActivity($remote_ip,$mac_address, $action, $data){
    $sql = $this->db->query("
    INSERT INTO everification_activity_logs
    (
      ipAddress,
      macAddress,
      action,
      fetchData
      )
    VALUES
    (
      AES_ENCRYPT('$remote_ip', 'ilovenmp1230988'),
      AES_ENCRYPT('$mac_address', 'ilovenmp1230988'),
      '$action',
      AES_ENCRYPT('$data', 'ilovenmp1230988')
    )
    ");
    return $sql;
  }

  public function checkReservation(){

    $param = [
      $this->input->post("fname"),
      $this->input->post("mname"),
      $this->input->post("lname"),
      $this->input->post("email"),
      $this->input->post("code"),
      $this->input->post("dateStart"),
      $this->input->post("dateEnd")
    ];

    $sql = "SELECT AES_DECRYPT(fname, 'ilovenmp1230988'),
    AES_DECRYPT(mname, 'ilovenmp1230988'),
    AES_DECRYPT(lname, 'ilovenmp1230988'),
    AES_DECRYPT(email, 'ilovenmp1230988'),
    code,
    dateStart,
    dateEnd
    FROM reservations
    WHERE
    CONVERT(AES_DECRYPT(fname, 'ilovenmp1230988') USING latin1) = ?
    AND CONVERT(AES_DECRYPT(mname, 'ilovenmp1230988') USING latin1)  = ?
    AND CONVERT(AES_DECRYPT(lname, 'ilovenmp1230988') USING latin1)  = ?
    AND CONVERT(AES_DECRYPT(email, 'ilovenmp1230988') USING latin1)  = ?
    AND code = ?
    AND dateStart = ?
    AND dateEnd = ?
    ";

    $query = $this->db->query($sql,$param);
    //var_dump($this->db->last_query());die();
    return $query;
  }

  public function insertReservation($fname, $mname, $lname, $email, $code, $dateStart, $dateEnd, $address, $mobileNum){
    $sql = $this->db->query("INSERT INTO reservations
      (fname,
        mname,
        lname,
        email,
        address,
        mobileNo,
        code,
        dateStart,
        dateEnd,
        status)
        VALUES
        (AES_ENCRYPT('$fname', 'ilovenmp1230988'),
        AES_ENCRYPT('$mname', 'ilovenmp1230988'),
        AES_ENCRYPT('$lname', 'ilovenmp1230988'),
        AES_ENCRYPT('$email', 'ilovenmp1230988'),
        '$address',
        '$mobileNum',
        '$code',
        '$dateStart',
        '$dateEnd',
        1)");
    return $sql;
  }

  public function confirmReservation($id){
    return $sql = $this->db->query("UPDATE reservations
      SET status = 2
      WHERE id = '$id'");
  }

  public function deleteReservation($id){
    return $sql = $this->db->query("UPDATE reservations
      SET status = 0
      WHERE id = '$id'");
  }

  public function login(){
    $param = [$this->input->post('uname'), $this->input->post('pword')];
    $sql = "SELECT * FROM admin_accounts WHERE uname = ? AND pword = ?";
    $query = $this->db->query($sql, $param);
    return $query;
  }

}

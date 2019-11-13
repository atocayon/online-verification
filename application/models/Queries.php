<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queries extends CI_Model
{

  public function search_byName(){
    $param = ['%'.$this->input->post('fname').'%','%'.$this->input->post('lname').'%',date('Y-m-d',strtotime($this->input->post('bday')))];
			$sql = "SELECT concat(tbl_trainee.fname,' ',LEFT(tbl_trainee.mname,1),'. ',tbl_trainee.lname,' ',tbl_trainee.suffix) as name,tbl_module.module as module, concat(DATE_FORMAT(tbl_schedule.start, '%Y %b %d'),' to ', DATE_FORMAT(tbl_schedule.end, '%Y %b %d')) as duration, tbl_training.certnumber as cert_num
					from trainee as tbl_trainee
					INNER JOIN training as tbl_training on tbl_trainee.trid = tbl_training.trid
					INNER JOIN schedule as tbl_schedule on tbl_training.code = tbl_schedule.code
					INNER JOIN module as tbl_module on tbl_schedule.modcode = tbl_module.modcode
					where tbl_trainee.fname LIKE ? and tbl_trainee.lname LIKE ? and bdate = ? group by tbl_training.code order by tbl_training.code";
			$query = $this->db->query($sql,$param);
			// var_dump($this->db->last_query());die();
			return $query;
  }

  public function search_byCertNum(){
      $param = [$this->input->post('certnum')];
			$sql = "SELECT concat(tbl_trainee.fname,' ',LEFT(tbl_trainee.mname,1),'. ',tbl_trainee.lname,' ',tbl_trainee.suffix) as name, tbl_module.module as module, concat(DATE_FORMAT(tbl_schedule.start, '%Y %b %d'),' to ', DATE_FORMAT(tbl_schedule.end, '%Y %b %d')) as duration, tbl_training.certnumber as cert_num
					from trainee as tbl_trainee
          INNER JOIN training as tbl_training on tbl_trainee.trid = tbl_training.trid
					INNER JOIN schedule as tbl_schedule on tbl_training.code = tbl_schedule.code
					INNER JOIN module as tbl_module on tbl_schedule.modcode = tbl_module.modcode
					where tbl_training.certnumber = ?";
			$query = $this->db->query($sql,$param);
			//var_dump($this->db->last_query());die();
			return $query;
  }

  public function search_byPDC(){

    $param = ['%'.$this->input->post('fname').'%','%'.$this->input->post('lname').'%',date('Y-m-d',strtotime($this->input->post('bday'))),$this->input->post('module')];
			$sql = "SELECT concat(tbl_trainee.fname,' ',LEFT(tbl_trainee.mname,1),'. ',tbl_trainee.lname,' ',tbl_trainee.suffix) as name, tbl_module.module as module, concat(DATE_FORMAT(tbl_schedule.start, '%Y %b %d'),' to ', DATE_FORMAT(tbl_schedule.end, '%Y %b %d')) as duration, tbl_training.certnumber as cert_num
					from trainee as tbl_trainee
					INNER JOIN training as tbl_training on tbl_trainee.trid = tbl_training.trid
					INNER JOIN schedule as tbl_schedule on tbl_training.code = tbl_schedule.code
					INNER JOIN module as tbl_module on tbl_schedule.modcode = tbl_module.modcode
					where tbl_trainee.fname LIKE ? and tbl_trainee.lname LIKE ? and bdate = ? and tbl_module.modcode = ? group by tbl_training.code order by tbl_training.code";
			$query = $this->db->query($sql,$param);
			//var_dump($this->db->last_query());die();
			return $query;

  }


}

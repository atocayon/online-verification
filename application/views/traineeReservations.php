<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'includes/head.php'; ?>
  </head>
  <body>

    <!-- <div class="">
      <?php //include "includes/backdrop.php" ?>
    </div> -->

    <!-- <div class="">
      <?php //include "includes/modalViewApplicantInfo.php" ?>
    </div> -->


    <div class="trainee-reservation-container">
      <div class="row">
        <div class="col-md-12">
          <table id="applicants" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <!-- <th>Email</th>
                <th>Address</th>
                <th>Mobile No</th> -->
                <th>Module</th>
                <th>Schedule</th>
                <th>Date of Reservation</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = $this->db->query("SELECT reservations.id, concat(AES_DECRYPT(reservations.fname,'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(reservations.mname, 'ilovenmp1230988'),1), ' ', AES_DECRYPT(reservations.lname, 'ilovenmp1230988')) as name, AES_DECRYPT(reservations.email, 'ilovenmp1230988') as email, reservations.address as address, reservations.mobileNo as mobileNo, reservations.code as code, DATE_FORMAT(schedule.start, '%Y %b %d') as dateStart, DATE_FORMAT(schedule.end, '%Y %b %d') as dateEnd, DATE_FORMAT(dateReserve, '%b %d %Y') as reserve FROM reservations INNER JOIN schedule ON reservations.code = schedule.code WHERE reservations.status = 1 ORDER BY reservations.dateReserve DESC");
                foreach ($query->result() as $row) {
                  ?>
                    <tr>
                      <td><?= $row->name ?></td>
                      <!-- <td><?= $row->email ?></td>
                      <td><?= $row->address ?></td>
                      <td><?= $row->mobileNo ?></td> -->
                      <td>
                        <?php
                          $module = $this->db->query("SELECT module.module FROM module INNER JOIN schedule ON module.modcode = schedule.modcode WHERE schedule.code = '$row->code'");
                          $resModule = "";
                          foreach ($module->result() as $value) {
                             $resModule = $value->module;
                          }
                        ?>

                        <?= $resModule ?>
                      </td>
                      <td><?= $row->dateStart ?> - to - <?= $row->dateEnd ?></td>
                      <td>
                        <?= $row->reserve ?></td>
                      <td>
                        <a title="Confirm <?= $row->name ?>?" type="button" class="btn btn-sm btn-outline-success" href="<?= base_url() ?>nmp/confirmReservation?id=<?= $row->id ?>&email=<?= $row->email ?>&module=<?= $resModule ?>" id="btn-confirmReservation" onclick="return confirm('Are you sure do you want to confirm <?= $row->name ?>?')"><i class="fas fa-check"></i></a>
                        &nbsp;
                        <a title="View <?= $row->name ?>?" type="button" class="btn btn-sm btn-outline-primary" href="#" id="btn-viewInfoReservation" ><i class="fas fa-eye"></i></a>
                        &nbsp;
                        <a title="Delete <?= $row->name ?>?" type="button" class="btn btn-sm btn-outline-danger"  href="<?= base_url() ?>nmp/deleteReservation?id=<?= $row->id ?>&email=<?= $row->email ?>&module=<?= $resModule ?>" id="btn-deleteReservation" onclick="return confirm('Are you sure do you want to delete <?= $row->name ?>?')"><i class="fas fa-trash"></i></a>

                        <input type="text" value="<?= $row->id ?>" class="applicant-id" hidden>
                      </td>
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>


          <table id="approved" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <!-- <th>Email</th>
                <th>Address</th>
                <th>Mobile No</th> -->
                <th>Module</th>
                <th>Schedule</th>
                <th>Date/Time of Reservation</th>

              </tr>
            </thead>
            <tbody>
              <?php
                $query = $this->db->query("SELECT reservations.id, concat(AES_DECRYPT(reservations.fname,'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(reservations.mname, 'ilovenmp1230988'),1), ' ', AES_DECRYPT(reservations.lname, 'ilovenmp1230988')) as name, AES_DECRYPT(reservations.email, 'ilovenmp1230988') as email, reservations.address as address, reservations.mobileNo as mobileNo, reservations.code as code, DATE_FORMAT(schedule.start, '%Y %b %d') as dateStart, DATE_FORMAT(schedule.end, '%Y %b %d') as dateEnd, reservations.dateReserve FROM reservations INNER JOIN schedule ON reservations.code = schedule.code WHERE status = 2");
                foreach ($query->result() as $row) {
                  ?>
                    <tr>
                      <td><?= $row->name ?></td>
                      <!-- <td><?= $row->email ?></td>
                      <td><?= $row->certNum ?></td>
                      <td><?= $row->mobileNo ?></td> -->
                      <td>
                        <?php
                          $module = $this->db->query("SELECT module FROM module WHERE modcode = '$row->code'");
                          $resModule = "";
                          foreach ($module->result() as $value) {
                            echo $resModule = $value->module;
                          }
                        ?>
                      </td>
                      <td><?= $row->dateStart ?> - to - <?= $row->dateEnd ?></td>
                      <td>
                        <?= $row->dateReserve ?></td>

                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>

          <table id="rejected" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <!-- <th>Email</th>
                <th>Address</th>
                <th>Mobile No</th> -->
                <th>Module</th>
                <th>Schedule</th>
                <th>Date/Time of Reservation</th>

              </tr>
            </thead>
            <tbody>
              <?php
                $query = $this->db->query("SELECT reservations.id, concat(AES_DECRYPT(reservations.fname,'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(reservations.mname, 'ilovenmp1230988'),1), ' ', AES_DECRYPT(reservations.lname, 'ilovenmp1230988')) as name, AES_DECRYPT(reservations.email, 'ilovenmp1230988') as email,  reservations.address as address, reservations.mobileNo as mobileNo, reservations.code as code, DATE_FORMAT(schedule.start, '%Y %b %d') as dateStart, DATE_FORMAT(schedule.end, '%Y %b %d') as dateEnd, reservations.dateReserve FROM reservations INNER JOIN schedule ON reservations.code = schedule.code WHERE status = 0");
                foreach ($query->result() as $row) {
                  ?>
                    <tr>
                      <td><?= $row->name ?></td>
                      <!-- <td><?= $row->email ?></td>
                      <td><?= $row->address ?></td>
                      <td><?= $row->mobileNo ?></td> -->
                      <td>
                        <?php
                          $module = $this->db->query("SELECT module FROM module WHERE modcode = '$row->code'");
                          $resModule = "";
                          foreach ($module->result() as $value) {
                            echo $resModule = $value->module;
                          }
                        ?>
                      </td>

                      <td><?= $row->dateStart ?> - to - <?= $row->dateEnd ?></td>
                      <td>
                        <?= $row->dateReserve ?></td>

                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>



          <!-- The Modal -->
          <div class="modal fade" id="modal-generateReports">
            <div class="modal-dialog modal-dm">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-clipboard-list"></i> Generate Reports</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-12">
                            <?php $query = $this->db->query("SELECT DISTINCT module.module as module,
                              module.descriptn as description,
                              module.modcode as modcode
                              FROM module
                              INNER JOIN schedule ON module.modcode = schedule.modcode
                              INNER JOIN reservations ON schedule.code = reservations.code
                              WHERE reservations.status != 1
                              ORDER BY module.module DESC");  ?>
                            <select class="form-control" name="module" id="module">
                              <option value="">-- Select Module --</option>
                              <?php

                                  foreach ($query->result() as $result) {
                                    ?>
                                      <option value="<?= $result->modcode ?>"><?= $result->description ?></option>
                                    <?php

                                  }
                              ?>
                            </select>
                            <br>
                            <select class="form-control" name="schedule" id="schedule" style="display:none">

                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                  </div>
                </div>




                <!-- Modal footer -->
                <div class="modal-footer" id="btn-generateReports" style="display:none;">
                  <button type="button" class="btn btn-success" id="print-report">Generate</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="admin-control">
        <div class="row">
          <div class="">
            <h1 id="up"><i class="fas fa-caret-up"></i></h1>
            <h1 id="down"><i class="fas fa-caret-down"></i></h1>
          </div>
        </div>

        <div class="row admin-control-options">
          <div class="col-md-1">

          </div>
          <div class="col-md-2">
            <a href="#"  id="btn-adminHome"><i class="fas fa-home	"></i>&nbsp;Home</a>
          </div>
          <div class="col-md-2">
            <a href="#" id="btn-approvedApplicants"><i class="fas fa-check"></i>&nbsp;Approved</a>
          </div>
          <div class="col-md-2">
            <a href="#" id="btn-rejectedApplicants"><i class="fas fa-trash"></i>&nbsp;Rejected</a>
          </div>
          <div class="col-md-2">
            <a href="#" id="btn-generateReports" data-toggle="modal" data-target="#modal-generateReports" ><i class="fas fa-clipboard-list"></i>&nbsp;Generate Reports</a>
          </div>
          <div class="col-md-2">
            <a href="<?= base_url() ?>nmp/logout"><i class="fas fa-power-off"></i>&nbsp;Logout, <?= $this->session->userdata('user') ?></a>
          </div>
          <div class="col-md-1">

          </div>

        </div>
      </div>

      <div class="nmp-logo-container row">
        <div class="">
          <img src="<?= base_url() ?>src/img/logo.png" id="nmp-logo">
        </div>

        <div class="">
          <h2>NMP Trainee Wait List</h2>
        </div>
      </div>
    </div>

    <div class="printable_reports" id="printable_reports">
      <div class="row">
        <div class="col-md-12">
          <h3 id="report-title"></h3>
          <table class="table table-striped " id="tbl-generateReports">
            <thead class="thead-dark">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>SRN</th>
                <th>Scheduled Date</th>
                <th>Date Reserve</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr id="noData" style="display: none">
                <td colspan="6" style="text-align: center">No Data</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.9.0.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>src/js/jQuery.print.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.js">
    </script>
    <script src="<?= base_url() ?>src/js/_web-request.js"></script>
    <script src="<?= base_url() ?>src/js/events.js"></script>

  </body>
</html>

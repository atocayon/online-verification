<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'includes/head.php'; ?>
  </head>
  <body>


    <div class="trainee-reservation-container">
      <table id="applicants">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Module</th>
            <th>Date/Time of Reservation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = $this->db->query("SELECT id, concat(AES_DECRYPT(fname,'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(mname, 'ilovenmp1230988'),1), ' ', AES_DECRYPT(lname, 'ilovenmp1230988')) as name, AES_DECRYPT(email, 'ilovenmp1230988') as email, code, dateReserve FROM reservations WHERE status = 1");
            foreach ($query->result() as $row) {
              ?>
                <tr>
                  <td><?= $row->name ?></td>
                  <td><?= $row->email ?></td>
                  <td>
                    <?php
                      $module = $this->db->query("SELECT module FROM module WHERE modcode = '$row->code'");
                      $resModule = "";
                      foreach ($module->result() as $value) {
                        echo $resModule = $value->module;
                      }
                    ?>
                  </td>
                  <td>
                    <?= $row->dateReserve ?></td>
                  <td>
                    <a title="Confirm <?= $row->name ?>?" type="button" href="<?= base_url() ?>nmp/confirmReservation?id=<?= $row->id ?>&email=<?= $row->email ?>&module=<?= $resModule ?>" id="btn-confirmReservation" onclick="return confirm('Are you sure do you want to confirm <?= $row->name ?>?')"><i class="fas fa-check"></i></a>
                    &nbsp;&nbsp;&nbsp;
                    <a title="Delete <?= $row->name ?>?" type="button"  href="<?= base_url() ?>nmp/deleteReservation?id=<?= $row->id ?>&email=<?= $row->email ?>&module=<?= $resModule ?>" id="btn-deleteReservation" onclick="return confirm('Are you sure do you want to delete <?= $row->name ?>?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>


      <table id="approved">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Module</th>
            <th>Date/Time of Reservation</th>

          </tr>
        </thead>
        <tbody>
          <?php
            $query = $this->db->query("SELECT id, concat(AES_DECRYPT(fname,'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(mname, 'ilovenmp1230988'),1), ' ', AES_DECRYPT(lname, 'ilovenmp1230988')) as name, AES_DECRYPT(email, 'ilovenmp1230988') as email, code, dateReserve FROM reservations WHERE status = 2");
            foreach ($query->result() as $row) {
              ?>
                <tr>
                  <td><?= $row->name ?></td>
                  <td><?= $row->email ?></td>
                  <td>
                    <?php
                      $module = $this->db->query("SELECT module FROM module WHERE modcode = '$row->code'");
                      $resModule = "";
                      foreach ($module->result() as $value) {
                        echo $resModule = $value->module;
                      }
                    ?>
                  </td>
                  <td>
                    <?= $row->dateReserve ?></td>

                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>


      <table id="rejected">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Module</th>
            <th>Date/Time of Reservation</th>

          </tr>
        </thead>
        <tbody>
          <?php
            $query = $this->db->query("SELECT id, concat(AES_DECRYPT(fname,'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(mname, 'ilovenmp1230988'),1), ' ', AES_DECRYPT(lname, 'ilovenmp1230988')) as name, AES_DECRYPT(email, 'ilovenmp1230988') as email, code, dateReserve FROM reservations WHERE status = 0");
            foreach ($query->result() as $row) {
              ?>
                <tr>
                  <td><?= $row->name ?></td>
                  <td><?= $row->email ?></td>
                  <td>
                    <?php
                      $module = $this->db->query("SELECT module FROM module WHERE modcode = '$row->code'");
                      $resModule = "";
                      foreach ($module->result() as $value) {
                        echo $resModule = $value->module;
                      }
                    ?>
                  </td>
                  <td>
                    <?= $row->dateReserve ?></td>

                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
    </div>

    <div class="admin-control">
      <div class="row">
        <div class="">
          <h1 id="up"><i class="fas fa-caret-up"></i></h1>
          <h1 id="down"><i class="fas fa-caret-down"></i></h1>
        </div>
      </div>

      <div class="row admin-control-options">
        <div class="">
          <a href="#" id="btn-adminHome"><i class="fas fa-home	"></i>&nbsp;Home</a>
        </div>
        <div class="">
          <a href="#" id="btn-approvedApplicants"><i class="fas fa-check"></i>&nbsp;Approved</a>
        </div>
        <div class="">
          <a href="#" id="btn-rejectedApplicants"><i class="fas fa-trash"></i>&nbsp;Rejected</a>
        </div>
        <div class="">
          <a href="<?= base_url() ?>nmp/logout"><i class="fas fa-power-off"></i>&nbsp;Logout, <?= $this->session->userdata('user') ?></a>
        </div>

      </div>
    </div>

    <div class="nmp-logo-container">

      <div class="row">
        <div class="">
          <img src="<?= base_url() ?>src/img/logo.png" id="nmp-logo">
        </div>

        <div class="">
          <h2>NMP Training Online Reservation</h2>
        </div>
      </div>
    </div>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.4.2.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.js">
    </script>
    <script src="<?= base_url() ?>src/js/events.js"></script>
    <script type="text/javascript">
    	var baseURL= "<?= base_url() ?>";
    	var page = "<?= $this->uri->segment(3) ?>";

    </script>
  </body>
</html>

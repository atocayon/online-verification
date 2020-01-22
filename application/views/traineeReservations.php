<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'includes/head.php'; ?>
  </head>
  <body>


    <div class="trainee-reservation-container">
      <table>
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
            $query = $this->db->query("SELECT id, concat(AES_DECRYPT(fname,'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(mname, 'ilovenmp1230988'),1), ' ', AES_DECRYPT(lname, 'ilovenmp1230988')) as name, AES_DECRYPT(email, 'ilovenmp1230988') as email, code, dateReserve FROM reservations WHERE status = 0");
            foreach ($query->result() as $row) {
              ?>
                <tr>
                  <td><?= $row->name ?></td>
                  <td><?= $row->email ?></td>
                  <td>
                    <?php
                      $module = $this->db->query("SELECT module FROM module WHERE modcode = '$row->code'");
                      foreach ($module->result() as $value) {
                        echo $value->module;
                      }
                    ?>
                  </td>
                  <td>
                    <?= $row->dateReserve ?></td>
                  <td>
                    <a title="Confirm <?= $row->name ?>?" type="button" href="<?= base_url() ?>nmp/confirmReservation?id=<?= $row->id ?>" id="btn-confirmReservation" onclick="return confirm('Are you sure do you want to confirm <?= $row->name ?>?')"><i class="fas fa-check"></i></a>
                    &nbsp;&nbsp;&nbsp;
                    <a title="Delete <?= $row->name ?>?" type="button"  href="<?= base_url() ?>nmp/deleteReservation?id=<?= $row->id ?>" id="btn-deleteReservation" onclick="return confirm('Are you sure do you want to delete <?= $row->name ?>?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
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



  </body>
</html>

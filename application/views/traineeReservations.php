<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'includes/head.php'; ?>
  </head>
  <body>
    <div id="navbar-web">
     <?php include 'includes/navbar-reservation.php'; ?>
    </div>
    <div class="spacer-1">

    </div>
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
            $query = $this->db->query("SELECT concat(AES_DECRYPT(fname,'ilovenmp1230988'), ' ', LEFT(AES_DECRYPT(mname, 'ilovenmp1230988'),1), ' ', AES_DECRYPT(lname, 'ilovenmp1230988')) as name, AES_DECRYPT(email, 'ilovenmp1230988') as email, code, dateReserve FROM reservations");
            foreach ($query->result() as $row) {
              ?>
                <tr>
                  <td><?= $row->name ?></td>
                  <td><?= $row->email ?></td>
                  <td><?= $row->code ?></td>
                  <td><?= $row->dateReserve ?></td>
                  <td>Action</td>
                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
    </div>

  </body>
</html>

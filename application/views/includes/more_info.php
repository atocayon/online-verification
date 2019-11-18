<?php
$date = date("Y-m-d");
$sql1 = $this->db->query("SELECT category,code FROM category WHERE active = '1' ORDER BY code ");
?>

      <div class="more-info-container flex-column">
          <?php
            foreach ($sql1->result() as $res) {
              ?>
              <div class="more-info-content">
                  <h2 id="table-category"><?= $res->category ?></h2>
                  <table>
                    <thead>
                      <tr>
                        <th>Module Desciption</th>
                        <th>Duration</th>
                        <th>Number of Enrollees</th>
                        <th>Available slots</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = $this->db->query("SELECT
                        module.module as moduleName,
                        module.descriptn as discription,
                        DATE_FORMAT(schedule.start, '%Y %b %d') as dateStart,
                        DATE_FORMAT(schedule.end, '%Y %b %d') as dateEnd,
                        schedule.max as maxEnrollees
                        FROM
                        schedule
                        INNER JOIN module on schedule.modcode = module.modcode
                        WHERE
                        DATE(schedule.start) > '$date' AND module.catid = '$res->code'
                        ");

                        foreach ($sql->result() as $row) {
                          ?>
                            <tr>
                              <td><?= $row->discription ?></td>
                              <td><?= $row->dateStart." - ".$row->dateEnd ?></td>
                              <td>50</td>
                              <td><?= $row->maxEnrollees ?></td>
                            </tr>
                          <?php
                        }
                      ?>

                    </tbody>
                  </table>
              </div>
              <?php
            }
          ?>
        </div>
          <!-- <table>
            <thead>
              <tr>
                <th>Module Description</th>
                <th>Duration</th>
                <th>Number of Enrollees</th>
                <th>Available Slots</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table> -->

           <!-- <h4>Module Name: <?= $row->discription ?></h4>
           <h4>Duration: <?= $row->dateStart." - ".$row->dateEnd ?></h2>
           <h4>Number of Enrollees</h4>
           <h4>Available Slots: <?= $row->maxEnrollees ?></h4> -->
       x

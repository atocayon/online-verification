<?php
$date = date("Y-m-d");
echo $year = date("Y");
$month = date('m');
$sql1 = $this->db->query("SELECT category,code FROM category WHERE active = '1' ORDER BY code ");
?>
      <div class="spacer-1">

      </div>
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
                        <th>Schedule</th>
                        <th>Number of Enrollees</th>
                        <th>Available slots</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = $this->db->query("SELECT
                        module.module as moduleName,
                        module.descriptn as discription,
                        schedule.modcode as moduleCode,
                        DATE_FORMAT(schedule.start, '%Y %b %d') as dateStart,
                        DATE_FORMAT(schedule.end, '%Y %b %d') as dateEnd,
                        schedule.max as maxEnrollees
                        FROM
                        schedule
                        INNER JOIN module on schedule.modcode = module.modcode
                        WHERE
                        DATE(schedule.start) > '$date' AND module.catid = '$res->code'
                        ");

                        if ($sql->num_rows() > 0) {
                          foreach ($sql->result() as $row) {
                            ?>
                              <tr>
                                <td><?= $row->discription ?></td>
                                <td><?= $row->dateStart." to ".$row->dateEnd ?></td>
                                <td>
                                  <?php
                                    $query = $this->db->query("SELECT
                                      count(trainee.idnum) as id,
                                      DATE_FORMAT(module.lastupdate, '%Y') as updates
                                      FROM
                                      trainee
                                      INNER JOIN
                                      training ON trainee.trid = training.trid
                                      INNER JOIN
                                      schedule ON training.code = schedule.code
                                      INNER JOIN
                                      module ON schedule.modcode = module.modcode
                                      WHERE schedule.modcode = '$row->moduleCode' AND DATE_FORMAT(module.lastupdate, '%Y') = '$year' AND DATE_FORMAT(module.lastupdate, '%c') = '$month'
                                      ");

                                      $res = $query->row();
                                      if (isset($res)) {
                                        echo $res->id;
                                      }

                                  ?>
                                </td>
                                <td><?php if ($row->maxEnrollees - $res->id === 0) {
                                echo "<span style='color: red'>none</span>";
                              }else{
                                echo $row->maxEnrollees-$res->id;
                              }  ?></td>
                              </tr>
                            <?php
                          }
                        }else{
                          ?>
                          <tr>
                            <td colspan="4">
                              <center>
                                Not Available
                              </center>
                            </td>
                          </tr>
                          <?php
                        }

                      ?>

                    </tbody>
                  </table>
              </div>

              <div class="spacer">

              </div>
              <?php
            }
          ?>
        </div>

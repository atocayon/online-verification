<?php
$date = date("Y-m-d");
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

                        foreach ($sql->result() as $row) {
                          ?>
                            <tr>
                              <td><?= $row->discription ?></td>
                              <td><?= $row->dateStart." to ".$row->dateEnd ?></td>
                              <td>
                                <?php
                                  $query = $this->db->query("SELECT
                                    trainee.trid as id,
                                    trainee.lname as name,
                                    module.modcode as mode,
                                    schedule.code as code,
                                    count(trainee.idnum)
                                    FROM
                                    trainee
                                    INNER JOIN
                                    training ON trainee.trid = training.trid
                                    INNER JOIN
                                    schedule ON training.code = schedule.code
                                    INNER JOIN
                                    module ON schedule.modcode = module.modcode
                                    WHERE schedule.modcode = '$row->moduleCode'
                                    ");

                                    echo $query->num_rows();


                                ?>
                              </td>
                              <td><?php if ($row->maxEnrollees - $query->num_rows() === 0) {
                              echo "<span style='color: red'>none</span>";
                            }else{
                              echo $row->maxEnrollees-$query->num_rows();
                            }  ?></td>
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
  

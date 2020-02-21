<!-- <div class="row header-container" >
  <div class="col-12" id="banner">
    <center> -->
      <!-- <img id="webBanner" src="<?= base_url() ?>src/img/banner.png"> -->
      <!-- <h1 id="webBanner"><span class="title-1">Online</span> <span class="title-2">Verification</span></h1>
    </center>
  </div>

</div> -->


<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="header-container">
        <?php
        if (!isset($_GET['code']) && !isset($_GET['dateStart']) && !isset($_GET['dateEnd'])) {
          ?>
            <h2 id="header-default">Online Verification</h2>
          <?php
        }else{
          ?>
            <h4 id="header-reservation"><?= $_GET['description'] ?>
              <br>
               <b><small>Wait List Form</small></b>
            </h4>

          <?php
        }
        ?>
        <img src="<?= base_url() ?>src/img/logo.png" alt=""><br>
        <p id="error-message" style="color: red;display:none">Error Message </p>
        <?php
        if (!isset($_GET['code']) && !isset($_GET['dateStart']) && !isset($_GET['dateEnd'])) {
          ?>
          <div class="column buttons">
            <button type="button" name="button" data-toggle="tooltip" title="Click To Verify by Name!" id="btn-verifyByName"><i class="fas fa-user-alt"></i> Verify By Name</button>

          </div>

          <div class="">
            <button type="button" name="button"  data-toggle="tooltip" title="Click To Verify by Certificate Number!" id="btn-verifyByCerticateNumber"><i class="fas fa-certificate"></i> Verify By Certificate Number</button>
          </div>

          <div class="">
            <button type="button" name="button" data-toggle="tooltip" title="Click To Verify by Enrollees on PDC Courses!" id="btn-verifyEnrolleesOnPDC"><i class="fas fa-id-card"></i> Verify By Enrollees on PDC Courses</button>
          </div>

          <div class="">
            <button type="button" name="button" data-toggle="tooltip" title="Click To Reserve a course shedule!" id="btn-courseReservation"><i class="fas fa-clipboard-list"></i> Courses Offered</button>
          </div>
          <?php
        }else{
          ?>

            <div class="row">
              <div class="col-md-12">
                <?php
                  include 'reservation-form.php';
                ?>
              </div>
            </div>
          <?php

        }

        ?>



        <div class="verifyByName" id="verifyByName">

            <div class="row">

              <div class="col-md-12">
                <?php include 'verifyByName.php'; ?>
              </div>



            </div>

        </div>


        <div class="verifyByCerticateNumber" id="verifyByCerticateNumber">

            <div class="row">

              <div class="col-md-12 ">
                <?php include 'verifyByCert.php'; ?>
              </div>

            </div>

        </div>


        <div class="verifyByPDCenrollees" id="verifyByPDCenrollees">

            <div class="row">

              <div class="col-md-12">
                <?php include 'verifyByEnrollees.php'; ?>
              </div>

            </div>

        </div>


        <div class="coursesOffered" id="coursesOffered">
          <div class="row">
            <div class="col-md-12">
              <?php include 'options.php'; ?>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

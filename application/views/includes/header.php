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
    <div class="col-md-12">
      <div class="header-container">
        <h2>Trainee Online Verification</h2>

        <img src="<?= base_url() ?>src/img/logo.png" alt="">

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


        <div class="verifyByName" id="verifyByName">
          <div class="container">
            <div class="row">
              <div class="col-md-4">

              </div>
              <div class="col-md-4">
                <?php include 'verifyByName.php'; ?>
              </div>
              <div class="col-md-4">

              </div>
            </div>
          </div>
        </div>


        <div class="verifyByCerticateNumber" id="verifyByCerticateNumber">
          <div class="container">
            <div class="row">
              <div class="col-md-4">

              </div>
              <div class="col-md-4">
                <?php include 'verifyByCert.php'; ?>
              </div>
              <div class="col-md-4">

              </div>
            </div>
          </div>
        </div>


        <div class="verifyByPDCenrollees" id="verifyByPDCenrollees">
          <div class="container">
            <div class="row">
              <div class="col-md-4">

              </div>
              <div class="col-md-4">
                <?php include 'verifyByEnrollees.php'; ?>
              </div>
              <div class="col-md-4">

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

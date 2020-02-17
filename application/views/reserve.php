<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes/head.php'; ?>
  </head>
  <body>
    <div id="navbar-web">
     <?php include 'includes/navbar-reservation.php'; ?>
    </div>


    <div class="row center">
      <div class="reserve-container">
        <div class="reserve-description">
            <h6><?= $_GET["description"] ?> RESERVATION
              <br>
              <?= $_GET["dateStart"] ?> - <?= $_GET["dateEnd"] ?>
              <br>
                <span style="color: red;display:none" id="error-message">Ops! It seems you've already reserved a slot for this course schedule</span>
                <span style="color: green;display:none" id="success-message">Course Reservation Submitted Successfully!!!<br>
                  <small>Kidly check your email</small>
                </span>
            </h6>
        </div>
        <div class="reservation-form">
          <div class="row center">
            <div class="">

              <label>Firstname:</label>  <span style="color: red;display:none;" id="reserve-fname">*</span>
              <br>
              <input type="text" name="" value="" placeholder="Type your firstname here..." id="reservation_fname">
              <br>
            </div>
          </div>

          <div class="row center">
            <div class="">
              <br>
              <label>Middle Name:</label> <span style="color: red;display:none;" id="reserve-mname">*</span>
              <br>
              <input type="text" name="" value="" placeholder="Type your middle name here..." id="reservation_mname">
              <br>
            </div>
          </div>

          <div class="row center">
            <div class="">
              <br>
              <label>Lastname:</label> <span style="color: red;display:none;" id="reserve-lname">*</span>
              <br>
              <input type="text" name="" value="" placeholder="Type your lastname here..." id="reservation_lname">
              <br>
            </div>
          </div>

          <div class="row center">
            <div class="">
              <br>
              <label>Email:</label> <span style="color: red;display:none;" id="reserve-email">*</span>
              <br>
              <input type="email" name="" value="" placeholder="Type your email address here..." id="reservation_email">
              <br>
            </div>
          </div>

          <div class="row center">
            <div class="">
              <br>
              <label>Complete Address:</label> <span style="color: red;display:none;" id="reserve-add">*</span>
              <br>
              <input type="text" name="" value="" placeholder="Type your address here..." id="reservation_add">
              <br>
            </div>

          </div>

          <div class="row center">
            <div class="">
              <br>
              <label>Mobile Number:</label> <span style="color: red;display:none;" id="reserve-mobileNum">*</span>
              <br>
              <input type="text" name="" value="" placeholder="Type your mobile number here..." id="reservation_mobileNum">
              <br>
            </div>
          </div>

          <div class="row center">
            <div class="">
              <br>
              <label>Seaferer Registration Number (if any):</label> <span style="color: red;display:none;" id="reserve-srnNum">*</span>
              <br>
              <input type="text" name="" value="" placeholder="Type your SRN Number here..." id="reservation_srnNum">
              <br>
            </div>
          </div>
          <input type="text" name="" value="<?= $_GET["modcode"] ?>" hidden id="code">
          <input type="text" name="" value="<?= $_GET["description"] ?>" hidden id="description">
          <input type="text" name="" value="<?= $_GET['dateStart'] ?>" hidden id="dateStart">
          <input type="text" name="" value="<?= $_GET['dateEnd'] ?>" hidden id="dateEnd">
        </div>

        <div class="btn-reservation row center">
          <div class="">
            <button type="button" name="button" id="btn-submit-reservation">Submit</button>
          </div>

        </div>
      </div>
    </div>
    <div id="backdrop">
    	<?php include 'includes/backdrop.php'; ?>
    </div>


    <div id="webView-footer">
    	<?php include 'includes/footer.php'; ?>
    </div>

    <div class="loading">
      <?php include 'includes/loading.php'; ?>
    </div>

    <div class="reservation">
      <?php include 'includes/alert-reservation.php'; ?>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.4.2.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.js">
    </script>
    <script src="<?= base_url() ?>src/js/events.js"></script>
    <script src="<?= base_url() ?>src/js/reservationFormValidation.js"></script>
    <script type="text/javascript">
    	var baseURL= "<?= base_url() ?>";
    	var page = "<?= $this->uri->segment(3) ?>";
    </script>
  </body>
</html>

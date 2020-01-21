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
            </h6>

        </div>
        <div class="reservation-form">
          <div class="row center">
            <div class="">
              <label>Firstname:</label>
              <br>
              <input type="text" name="" value="" placeholder="Type your firstname here..." id="reservation_fname">
              <br>
            </div>
          </div>

          <div class="row center">
            <div class="">
              <br>
              <label>Middle Name:</label>
              <br>
              <input type="text" name="" value="" placeholder="Type your middle name here..." id="reservation_mname">
              <br>
            </div>
          </div>

          <div class="row center">
            <div class="">
              <br>
              <label>Lastname:</label>
              <br>
              <input type="text" name="" value="" placeholder="Type your lastname here..." id="reservation_lname">
              <br>
            </div>
          </div>

          <div class="row center">
            <div class="">
              <br>
              <label>Email:</label>
              <br>
              <input type="email" name="" value="" placeholder="Type your email address here..." id="reservation_email">
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
    <script type="text/javascript">
    	var baseURL= "<?= base_url() ?>";
    	var page = "<?= $this->uri->segment(3) ?>";
    </script>
  </body>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'includes/head.php'; ?>
  </head>
  <body>  

    <div class="nmp-admin-login-container row center">
      <div class="column">
        <div class="">
          <h1> <u>Login</u> </h1><br>
        </div>
        <div class="row center">
          <p>Welcome back! Login to access the NMP Training Online Reservation.</p>
        </div>
        <div class="row center">
          <input type="text" id="admin-uname">
        </div>

        <div class="row center">
          <input type="password" id="admin-password">
        </div>

        <div class="row center">
          <button type="button" name="button" id="btn-admin-btnLogin">Login</button>
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

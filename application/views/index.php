<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/head.php'; ?>
</head>
<body>

<?php include 'includes/modal.php'; ?>

 <div id="navbar-web">
 	<?php include 'includes/navbar.php'; ?>
 </div>

<div id="navbar-mobile" >
    <?php include 'includes/navbar-mobile.php'; ?>
</div>

<div class="home-page">
	<div id="home">
 	 <?php include 'includes/header.php'; ?>
  </div>

  <div id="options">
 	 <?php include 'includes/options.php'; ?>
  </div>
</div>

<div class="more-info-page">
	<?php include 'includes/more_info.php'; ?>
</div>

 <div id="forms-page">
	 <?php include 'includes/forms.php'; ?>
 </div>

<div id="alert-modal">
	<?php include 'includes/alert.php'; ?>
</div>

<div>
	<?php include 'includes/footer.php'; ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="<?= base_url() ?>src/js/_web-request.js"></script>
<script src="<?= base_url() ?>src/js/_mobile-request.js"></script>
<script src="<?= base_url() ?>src/js/events.js"></script>
<script type="text/javascript">
	var baseURL= "<?= base_url() ?>";
	var page = "<?= $this->uri->segment(3) ?>";
	console.log(page);
</script>
</body>
</html>

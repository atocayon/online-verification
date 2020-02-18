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
 	<?php include 'includes/navbar.php'; ?>
 </div>

<!-- <div id="navbar-mobile" >
    <?php //include 'includes/navbar-mobile.php'; ?>
</div> -->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="home-page" id="home-page">
				<div id="home">
			 	 <?php include 'includes/header.php'; ?>
			  </div>

			  <!-- <div id="options">
			 	 <?php //include 'includes/options.php'; ?>
			  </div> -->

			</div>
		</div>
	</div>
</div>




<!-- <div class="more-info-page">
	<?php //include 'includes/more_info.php'; ?>
</div> -->

 <!-- <div id="forms-page">
	 <?php //include 'includes/forms.php'; ?>
 </div> -->

<!-- <div class="faq" id="faq-page" style="display: none;">
	<?php //include 'includes/faq.php'; ?>
</div> -->

<!-- <div id="backdrop">
	<?php //include 'includes/backdrop.php'; ?>
</div> -->

 <!-- <div id="mobile-modal">
 	<?php //include 'includes/modal.php'; ?>
 </div> -->

<!-- <div id="alert-modal">
	<?php //include 'includes/alert.php'; ?>
</div> -->

<!-- <div id="webView-footer">
	<?php //include 'includes/footer.php'; ?>
</div> -->

<!-- <div class="loading">
	<?php //include 'includes/loading.php'; ?>
</div> -->

<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.min.js">
</script>
<script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.js">
</script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<script src="<?= base_url() ?>src/js/_web-request.js"></script>
<script src="<?= base_url() ?>src/js/_mobile-request.js"></script>
<script src="<?= base_url() ?>src/js/events.js"></script>
<script type="text/javascript">
	var baseURL= "<?= base_url() ?>";
	var page = "<?= $this->uri->segment(3) ?>";


</script>
</body>
</html>

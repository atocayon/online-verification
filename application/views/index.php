<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/head.php'; ?>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>

<?php include 'includes/modal.php'; ?>

 <div id="navbar-web">
 	<?php include 'includes/navbar.php'; ?>
 </div>
<div id="navbar-mobile" style="display: none">
    <?php include 'includes/navbar-mobile.php'; ?>
</div>
 <div id="home">
	 <?php include 'includes/header.php'; ?>
 </div>

 <div id="options">
	 <?php include 'includes/options.php'; ?>
 </div>

 <div id="forms-page">
	 <?php include 'includes/forms.php'; ?>
 </div>

<div>
	<?php include 'includes/footer.php'; ?>
</div>

<script type="text/javascript">
	var baseURL= "<?= base_url() ?>";
	var page = "<?= $this->uri->segment(3) ?>";
	console.log(page);

	if (page == 1) {
		document.getElementById('forms-page').style.display = "block";
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('form-cert').style.display ="none";
		document.getElementById('form-enrollees').style.display ="none";
		document.getElementById('navbar-mobile').style.display = "block";
		document.getElementById('navbar-web').style.display = "none";

	}

	if (page == 2) {
		document.getElementById('forms-page').style.display = "block";
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('form-name').style.display ="none";
		document.getElementById('form-enrollees').style.display ="none";
        document.getElementById('navbar-mobile').style.display = "block";
        document.getElementById('navbar-web').style.display = "none";
	}

	if (page == 3) {
		document.getElementById('forms-page').style.display = "block";
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('form-name').style.display ="none";
		document.getElementById('form-cert').style.display ="none";
        document.getElementById('navbar-mobile').style.display = "block";
        document.getElementById('navbar-web').style.display = "none";
	}

</script>
</body>
</html>

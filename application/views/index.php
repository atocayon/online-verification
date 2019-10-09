<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/head.php' ?>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>

 <div>
 	<?php include 'includes/navbar.php'; ?>
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

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
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
	}

	if (page == 2) {
		document.getElementById('forms-page').style.display = "block";
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('form-name').style.display ="none";
		document.getElementById('form-enrollees').style.display ="none";
	}

	if (page == 3) {
		document.getElementById('forms-page').style.display = "block";
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('form-name').style.display ="none";
		document.getElementById('form-cert').style.display ="none";
	}

</script>
</body>
</html>

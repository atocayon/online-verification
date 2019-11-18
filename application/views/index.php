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

<div>
	<?php include 'includes/footer.php'; ?>
</div>

<script type="text/javascript">
	var baseURL= "<?= base_url() ?>";
	var page = "<?= $this->uri->segment(3) ?>";
	console.log(page);

	if (page === '1') {
		document.getElementById('forms-page').style.display = "block";
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('form-cert').style.display ="none";
		document.getElementById('form-enrollees').style.display ="none";
		document.getElementById('byCert').style.display = "none";

	}

	if (page === '2') {
		document.getElementById('forms-page').style.display = "block";
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('form-name').style.display ="none";
		document.getElementById('form-enrollees').style.display ="none";
		document.getElementById('byNameAndByEnrollees').style.display = "none";
		document.getElementById('byCert').style.display = "block";
	}

	if (page === '3') {

		document.getElementById('forms-page').style.display = "block";
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('form-name').style.display ="none";
		document.getElementById('form-cert').style.display ="none";
			document.getElementById('byCert').style.display = "none";
	}

	// console.log(window.screen.width);
	// console.log(window.screen.height);

	// if ( window.screen.width <= 1050 &&  page === '1' || window.screen.width <= 1050 && page === '2' || window.screen.width <= 1050 && page === '3'){
	//     document.getElementById('navbar-mobile').style.display = "block";
	//     document.getElementById('navbar-web').style.display = "none";
	// 		// document.getElementById('mobile-footer').style.display = "none";
  //   }else{
	//     document.getElementById('navbar-mobile').style.display = "none";
  //     document.getElementById('navbar-web').style.display = "block";
  //   }

</script>
</body>
</html>

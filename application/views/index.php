<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_id = "";
if (isset($id)) {
		$page_id = $id;
}
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

 <div id="name">
	 <?php include 'includes/name.php'; ?>
 </div>

 <div id="cert">
	 <?php include 'includes/cert.php'; ?>
 </div>

 <div id="enrollees">
	 <?php include 'includes/enrollees.php'; ?>
 </div>

<div>
	<?php include 'includes/footer.php'; ?>
</div>

<script>

	var page = <?= $page_id ?>;

	if (page === 0) {
		document.getElementById('cert').style.display = "none";
		document.getElementById('options').style.display = "block";
		document.getElementById('name').style.display = "none";
		document.getElementById('enrollees').style.display = "none";
		document.getElementById('home').style.display = "block";
	}

	if (page === 1) {
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('cert').style.display = "none";
		document.getElementById('enrollees').style.display = "none";
		document.getElementById('name').style.display = "block";
	}

	if (page === 2) {
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('name').style.display = "none";
		document.getElementById('enrollees').style.display = "none";
		document.getElementById('cert').style.display = "block";
	}

	if (page === 3) {
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('name').style.display = "none";
		document.getElementById('cert').style.display = "none";
		document.getElementById('enrollees').style.display = "block";
	}
</script>
</body>
</html>

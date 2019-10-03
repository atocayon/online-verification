<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_id = $this->input->get('p');;


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


<script>

	var page = <?php echo $page_id ?>;
	console.log(page);
	if (page === 0 || page === undefined) {
		document.getElementById('options').style.display = "block";
		document.getElementById('forms-page').style.display = "none";
		document.getElementById('home').style.display = "block";
	}

	if (page === 1 || page === 2 || page === 3) {
		document.getElementById('home').style.display = "none";
		document.getElementById('options').style.display = "none";
		document.getElementById('forms-page').style.display = "block";
	}

</script>
</body>
</html>

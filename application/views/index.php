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

	<div class="close"><a href=""  >X</a></div>
	<div class="row modal" id="modal">


	  <table id="mobile-table">
	  	<thead>
	  		<tr>
					<th>Training Module</th>
					<th>Full name</th>
					<th>Date of Certification</th>
	  		</tr>
	  	</thead>
			<tbody id="mobile_res">
				<tr>
					<td colspan="4" id="default">
						<center>
							<h2 style="color: #607D8B">Result will show up here</h2>
						</center>
					</td>

					<td colspan="4" id="no_data" style="display: none">
						<center>
							<h2 style="color: #d50000">No Data Found</h2>
						</center>
					</td>

					<td colspan="4" id="empty_field" style="display: none">
						<center>
							<h2 style="color: #FF6D00">Please don't leave input field empty</h2>
						</center>
					</td>
				</tr>
			</tbody>
	  </table>
	</div>

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

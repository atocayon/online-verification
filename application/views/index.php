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


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12">

			<div class="home-page" id="home-page">

						<div id="home">
						 <?php include 'includes/main.php'; ?>
						</div>

			</div>

			<!-- The Modal -->
      <div class="modal fade" id="modal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" id="name"> Modal Heading</h4>
              <button type="button" class="close close-modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="records_tbl" class="table table-striped table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>Module</th>
                        <th>Duration</th>
                        <th>Certificate Number</th>
                      </tr>
                    </thead>
                    <tbody id="tbl_data">


                    </tbody>
                  </table>

									<table id="byCerts_records_tbl" class="table table-striped table-hover" >
							      <thead class="thead-dark">
							        <tr>
							          <th>Module</th>
							          <th>Duration</th>
							        </tr>
							      </thead>
							      <tbody id="byCert_tbl_data">


							      </tbody>
							    </table>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>


			<!-- The Modal -->
			<div class="modal fade" id="alert-modal">
			  <div class="modal-dialog ">
			    <div class="modal-content">

			      <!-- Modal Header -->
			      <div class="modal-header">
			        <h4 class="modal-title">Notice</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>

			      <!-- Modal body -->
			      <div class="modal-body">
							<p style="text-align:center;">
								This system is intended to be used for verification of certificate information of NMP Trainees.
			          Any misuse or manipulation of the Personal data provided in the search result will be subjected to RA No. 10173
			          otherwise known as the Data Privacy Act of 2012. If you have some questions or clarification kindly check the FAQ page or
			          <a href="#">Click Here</a> to contact the National Maritime Polytechnic.
							</p>

			      </div>

			      <!-- Modal footer -->
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" id="btn-confirm">Confirm</button>
			      </div>

			    </div>
			  </div>
			</div>


			<!-- The Modal -->
			<div class="modal fade" id="modalCourses">
			  <div class="modal-dialog modal-lg modal-dialog-scrollable modalCourses">
			    <div class="modal-content">

			      <!-- Modal Header -->
			      <div class="modal-header">
			        <h4 class="modal-title" id="category">Offered Courses</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>

			      <!-- Modal body -->
			      <div class="modal-body">
			        <div class="row">
								<div class="col-md-12">
									<table class="table table-striped table-hover" id="tbl-coursesOffered">
										<thead class="thead-dark">
											<tr>
                        <th>Module Desciption</th>
                        <th>Schedule</th>
                        <th>Wait List</th>
                      </tr>
										</thead>
									</table>
								</div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- The Modal -->
			<div class="modal" id="successModal">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <!-- Modal Header -->
			      <div class="modal-header">
			        <h4 class="modal-title">Success</h4>
			        <button type="button" class="close close-modal" >&times;</button>
			      </div>

			      <!-- Modal body -->
			      <div class="modal-body">
			        <div class="row">
								<div class="col-md-12">
									<p style="text-align:center">The National Maritime Polytechnic would like to thank you for reserving a training course slot through this system. Please check our message in your email.</p>
								</div>
			        </div>
			      </div>

			      <!-- Modal footer -->
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" id="btn-confirm-reservationModal">Ok, Got it</button>
			      </div>

			    </div>
			  </div>
			</div>

		</div>
	</div>
</div>


<script src="https://code.jquery.com/jquery-1.9.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>src/js/jQuery.print.js"></script>
<script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.min.js">
</script>
<script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.js">
</script>
<script src="<?= base_url() ?>src/js/_web-request.js"></script>
<script src="<?= base_url() ?>src/js/events.js"></script>
<script src="<?= base_url() ?>src/js/reservationFormValidation.js">

</script>

</body>
</html>

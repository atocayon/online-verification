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


<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">

			<div class="home-page" id="home-page">

				<div id="home">
			 	 <?php include 'includes/header.php'; ?>
			  </div>

			</div>

			<!-- The Modal -->
      <div class="modal fade" id="modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title"> Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
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
		</div>
	</div>
</div>


<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.min.js">
</script>
<script type="text/javascript" src="<?= base_url() ?>src/js/jquery.maskedinput-1.2.2-co.js">
</script>
<script src="<?= base_url() ?>src/js/_web-request.js"></script>
<script src="<?= base_url() ?>src/js/events.js"></script>
<!-- <script src="<?= base_url() ?>src/js/_mobile-request.js"></script> -->

<script type="text/javascript">
	// var baseURL= "<?= base_url() ?>";
	// console.log(baseURL);
	// var page = "<?= $this->uri->segment(3) ?>";


</script>
</body>
</html>

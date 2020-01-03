<div class="row nav-container" id="navbar-web">

		<?php
		 $page = $this->uri->segment(3);
			if ($page > 0) {
				?>
				<div class="back-home">
					<a href="<?= base_url() ?>" class=""> <i class="fas fa-home"></i> Home </a>
				</div>

				<?php
			}else{
				?>
				<div class="web-logo">
						<a href="<?= base_url() ?>"><img src="<?= base_url() ?>src/img/logo.png" ></a>
				</div>
				<?php
			}
		 ?>


		<div class="filler"></div>
		<div id="web" title="Click for more information">
			<a href="#" class="info" title="View Schedules"><i class="fas fa-clipboard-list"></i> Courses Offered</a>
		</div>
		<div id="web" title="FAQ">
			<a href="#" class="access" title="FAQ" id="btn-faq"><i class="far fa-question-circle"></i> FAQ</a>
		</div>
    <div id="mobile-home" onclick="funcDropdown()">
        <a href="#"><i class="fas fa-bars"></i></a>
    </div>
</div>

<div class="dropdown-content" id="dropdown-content">
    <div>
        <a href="#" class="training_schedule">Courses Offer</a>
    </div>
    <div>
        <a href="#">FAQ</a>
    </div>

</div>

<script>

    var x = document.getElementById('dropdown-content');

    function funcDropdown() {
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>

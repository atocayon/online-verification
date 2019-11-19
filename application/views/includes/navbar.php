<div class="row nav-container" id="navbar-web">
	<div class="web-logo">
		<a href="" id="site_logo"><img src="<?= base_url() ?>src/img/logo.png" > <span class="brand">NMP</span></a>
	</div>
		<div class="filler"></div>
		<div id="web" title="Click for more information">
			<a href="#" class="info" title="View Schedules"><i class="fas fa-user-clock"></i> Training Schedules</a>
		</div>
		<div id="web" title="FAQ">
			<a href="#" class="access" title="FAQ" ><i class="far fa-question-circle"></i> FAQ</a>
		</div>
    <div id="mobile-home" onclick="funcDropdown()">
        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
    </div>
</div>

<div class="dropdown-content" id="dropdown-content">
    <div>
        <a href="#" class="training_schedule">Training Schedule</a>
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

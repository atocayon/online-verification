<div class="row flex-end nav-container">
	<div>
		<a href="" id="site_logo"><img src="<?= base_url() ?>src/img/logo.png" > <span class="brand">NMP</span></a>
	</div>
		<div class="filler"></div>
		<div id="web">
			<a href="#" class="info"><i class="fas fa-info"></i></a>
		</div>
		<div id="web">
			<a href="#" class="access"><i class="fas fa-universal-access"></i></a>
		</div>

		<div id="mobile" onclick="funcDropdown()">
			<a href="#" style="font-size: 1.5rem;"><i class="fas fa-ellipsis-v"></i></a>
		</div>
</div>

<div class="dropdown-content" id="dropdown-content">
	<div>
		<a href="#">About</a>
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

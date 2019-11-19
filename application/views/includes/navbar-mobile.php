<div class="row nav-mobile-container" id="navbar-mobile">
    <div class="mobile-logo">
        <a href="<?= base_url() ?>index.php/nmp/index" id="back-button"><i class="fas fa-arrow-left brand-mobile"></i></a>
    </div>
    <div class="filler-mobile">
    </div>

    <div id="mobile" onclick="funcDropdown()">
        <a href="#" id="elippsis"><i class="fas fa-ellipsis-v"></i></a>
    </div>
</div>

<div class="dropdown-content" id="dropdown-content">
    <div>
        <a href="#">Training Schedule</a>
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


<div class="row options ">
  <a href="<?= base_url() ?>index.php/nmp/index/1" type="submit" title="Click to Verify by Name">
    <div id="web-name" class="row">
        <div>
            <i class="fas fa-user-alt" id="web-icon-name"></i>&nbsp;&nbsp;
        </div>
        <div class="web-icon-text">
            <p><b>Name</b></p>
        </div>
    </div>
  </a>

  <a href="<?= base_url() ?>index.php/nmp/index/2" type="submit" title="Click to Verify by Certificate Number">
    <div id="web-cert" class="row">
        <div>
            <i class="fas fa-certificate" id="web-icon-cert"></i>
        </div>
        <div class="web-icon-text">
            <p><b>&nbsp;Certificate Number</b></p>
        </div>
        &nbsp;&nbsp;
    </div>
  </a>

  <a href="<?= base_url() ?>index.php/nmp/index/3" type="submit" title="Click to Verify by Enrollees on PDC Courses">
    <div id="web-pdc" class="row">
      <div>
          <i class="fas fa-id-card" id="web-icon-pdc"></i>&nbsp;
      </div>
        <div class="web-icon-text">
            <p><b>&nbsp;Enrollees on PDC Courses</b></p>
        </div>


    </div>
  </a>

  <div class="column">
    <a href="<?= base_url() ?>index.php/nmp/index/1">
      <div id="mobile-name">
          <div class="row">
              <div class="mobile-options-icon-container">
                  <i class="fas fa-user-alt mobile-icon"></i>
              </div>
              <div class="mobile-options-text-container">
                  <h4>Name</h4>
              </div>
          </div>
      </div>
    </a>
    <a href="<?= base_url() ?>index.php/nmp/index/2">
      <div id="mobile-cert">
          <div class="row">
              <div class="mobile-options-icon-container">
                  <i class="fas fa-certificate mobile-icon"></i>
              </div>
              <div class="mobile-options-text-container">
                  <h4>Certificate Number</h4>
              </div>
          </div>
      </div>
    </a>
    <a href="<?= base_url() ?>index.php/nmp/index/3">
      <div id="mobile-pdc">
          <div class="row">
              <div class="mobile-options-icon-container">
                  <i class="fas fa-id-card mobile-icon"></i>
              </div>
              <div class="mobile-options-text-container">
                  <h4>Enrollees on PDC Courses</h4>
              </div>
          </div>
          &nbsp;&nbsp;

      </div>
    </a>
  </div>
</div>

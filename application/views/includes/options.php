<div class="alert alert-dark" id="coursesOffered-container">
  <button type="button" class="close" id="close">&times;</button>
  <div class="row">
  <?php

  $db = $this->db;
  function query($db){
    return $query = $db->query("SELECT category,code FROM category WHERE active = '1' ORDER BY code ");
  }

  $query = query($db);

  foreach ($query->result() as $key) {
    ?>

        <div class="col-md-6">
          <div class="">
              <button type="button" class="btn btn-lg btn-primary btn-category" value="<?= $key->code ?>" ><?= $key->category ?></button>
          </div>

        </div>

    <?php
  }
  ?>
  </div>
</div>

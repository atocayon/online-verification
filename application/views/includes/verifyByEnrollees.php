<form>
  <label>Module/Courses</label><br>
  <select id="byPDC_module" class="form-input-name" name="module" required>
    <option value="">Select Module/Course Here</option>
    <?php
    $query = $this->db->get_where('module', array('active' => 'Y'),);
    foreach ($query->result() as $fetch) {
      ?>
      <option value="<?= $fetch->modcode ?>"><?= $fetch->module ?></option>
      <?php
    }
     ?>
  </select>
  <br>
  <br>
  <label>First Name</label><br>
  <input id="byPDC_fname" type="text" name="fname" class="form-input-name" placeholder="Type here..." required>
  <br>
  <br>
  <label>Last Name</label><br>
  <input id="byPDC_lname" type="text" name="lname" class="form-input-name" placeholder="Type here..." required>
  <br>
  <br>
  <label>Birthday</label><br>
  <input id="byPDC_bday" type="date" name="bday" class="form-input-date" required>
  <br>
  <br>
  <center>
    <button id="byPDC_submit" type="submit" class="submit-button">Verify</button>
  </center>
  <center>
    <button id="searhAgain" class="tryAgain-button">Search Again</button>
  </center>
</form>

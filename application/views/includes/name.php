<div class="row formTitle-container">
  <div>
    <?php include 'formTitle.php' ?>
  </div>
</div>
<div class="row verifyByName-form-container">
  <div class="form">
    <form>
      <label>First Name</label><br>
      <input type="text" name="fname" class="form-input-name" placeholder="Type here..." required >
      <br>
      <br>
      <label>Last Name</label><br>
      <input type="text" name="lname" class="form-input-name" placeholder="Type here..." required >
      <br>
      <br>
      <label>Birthday</label><br>
      <input type="date" name="bday" class="form-input-date" required >
      <br>
      <br>
      <center>
        <button type="submit" class="submit-button">Verify</button>
      </center>

    </form>
  </div>
  <div class="result"></div>
</div>

<div class="row formTitle-container">
  <div>
    <?php include 'formTitle.php' ?>
  </div>
</div>
<div class="row verifyByName-form-container">
  <div class="form">
    <form>
      <label>First Name</label>
      <input type="text" name="fname" class="form-input" required >

      <label>Last Name</label>
      <input type="text" name="lname" class="form-input" required >

      <label>Birthday</label>
      <input type="date" name="bday" class="form-input" required >

      <button type="submit" class="submit-button">Verify</button>
    </form>
  </div>
  <div class="result"></div>
</div>

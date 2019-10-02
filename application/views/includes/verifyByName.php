
<form method="POST" id="formByName">
  <label>First Name</label><br>
  <input type="text" name="fname" class="form-input-name" placeholder="Type here..." required >
  <br>
  <br>
  <label>Last Name</label><br>
  <input type="text" name="lname" class="form-input-name" placeholder="Type here..." required >
  <br>
  <br>
  <label>Birthday</label><br>
  <input type="date" name="bday" class="form-input-date" required  >
  <br>
  <br>
  <center>
    <button type="submit" class="submit-button">Verify</button>
  </center>
</form>

<script type="text/javascript">
  $(document).ready(function(){
    $('#formByName').on('submit', function(){
      event.preventDefault();

      $.ajax({
        url:,
        method:,
        data:$(this).serialize(),
        dataType: "json",
        success:
      })

    });
  });
</script>

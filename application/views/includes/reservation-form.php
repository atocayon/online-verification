<div class="alert alert-dark">
    <button type="button" class="close" id="close">&times;</button>
  <div class="row">

    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Type your Firstname here..." id="reservation_fname">
      <input type="text" class="form-control" placeholder="Type your Middle name here..." id="reservation_mname">
      <input type="text" class="form-control" placeholder="Type your Lastname here..." id="reservation_lname">
      <input type="email" class="form-control" placeholder="Type your Email address here..." id="reservation_email">
      <input type="text" class="form-control" placeholder="Type your Address here..." id="reservation_add">
      <input type="text" class="form-control" placeholder="Type your Mobile number here..." id="reservation_mobileNum">
      <input type="text" class="form-control" placeholder="Type your SRN Number here (if any)..." id="reservation_srnNum">

      <input type="text" name="" value="<?= $_GET["modcode"] ?>" hidden id="code">
      <input type="text" name="" value="<?= $_GET["description"] ?>" hidden id="description">
      <input type="text" name="" value="<?= $_GET['dateStart'] ?>" hidden id="dateStart">
      <input type="text" name="" value="<?= $_GET['dateEnd'] ?>" hidden id="dateEnd">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <button type="button" name="button" class="btn btn-dark" id="btn-submit-reservation"><span class="spinner-border spinner-border-sm spinner-icon" style="display:none"></span> Submit</button>
  </div>
</div>

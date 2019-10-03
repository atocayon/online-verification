<div class="row formTitle-container">
  <div>
    <?php include 'formTitle.php' ?>
  </div>
</div>

<div class="row verifyByName-form-container">
  <div class="form-name" id="form-name">
    <?php include 'verifyByName.php'; ?>
  </div>

  <div class="form-cert" id="form-cert">
    <?php include 'verifyByCert.php'; ?>
  </div>

  <div class="form-enrollees" id="form-enrollees">
    <?php include 'verifyByEnrollees.php'; ?>
  </div>


  <div class="row table-container">
    <table id="records_tbl">
      <thead>
        <tr>
          <th>#</th>
          <th>Cetificate Number</th>
          <th>Full name</th>
          <th>Date of Birth</th>
        </tr>
      </thead>
      <tbody id="tbl_data">

          <tr>
            <td colspan="4">
              <center>Result will show up here</center>
            </td>
          </tr>





      </tbody>
      <!-- <tfoot>
        <tr>
          <th colspan="4">
            <ul>
              <li><a href="#"><<</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">>></a></li>
            </ul>
          </th>
        </tr>
      </tfoot> -->
    </table>
  </div>
</div>

<script type="text/javascript">
var page = <?php echo $page_id ?>;
console.log(page);
if (page === 1) {
  document.getElementById('form-name').style.display = "block";
  document.getElementById('form-cert').style.display = "none";
  document.getElementById('form-enrollees').style.display = "none";
}

if(page === 2){
  document.getElementById('form-cert').style.display = "block";
  document.getElementById('form-enrollees').style.display = "none";
  document.getElementById('form-name').style.display = "none";
}

if(page === 3){
  document.getElementById('form-enrollees').style.display = "block";
  document.getElementById('form-name').style.display = "none";
  document.getElementById('form-cert').style.display = "none";
}

var baseURL= "<?= base_url();?>";
</script>

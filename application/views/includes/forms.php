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


  <div id="byNameAndByEnrollees">

    <table id="records_tbl">
      <thead>
        <tr>
          <th>Module</th>
          <th>Duration</th>
          <th>Certificate Number</th>
        </tr>
      </thead>
      <tbody id="tbl_data">

          <tr>
            <td colspan="4" id="default">
              <center>
                <h2 style="color: #607D8B">Result will show up here</h2>
              </center>
            </td>

            <td colspan="4" id="no_data" style="display: none">
              <center>
                <h2 style="color: #d50000">No Data Found</h2>
              </center>
            </td>

            <td colspan="4" id="empty_field" style="display: none">
              <center>
                <h2 style="color: #FF6D00">Please don't leave input field empty</h2>
              </center>
            </td>
          </tr>
      </tbody>
    </table>

  </div>


  <div id="byCert">
    <table id="byCerts_records_tbl" >
      <thead>
        <tr>
          <th>Module</th>
          <th>Duration</th>
        </tr>
      </thead>
      <tbody id="byCert_tbl_data">

          <tr>
            <td colspan="4" id="byCert_default">
              <center>
                <h2 style="color: #607D8B">Result will show up here</h2>
              </center>
            </td>

            <td colspan="4" id="byCert_no_data" style="display: none">
              <center>
                <h2 style="color: #d50000">No Data Found</h2>
              </center>
            </td>

            <td colspan="4" id="byCert_empty_field" style="display: none">
              <center>
                <h2 style="color: #FF6D00">Please don't leave input field empty</h2>
              </center>
            </td>
          </tr>
      </tbody>
    </table>
  </div>



</div>

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
          <th>Training Module</th>
          <th>Full name</th>
          <th>Date of Certification</th>
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

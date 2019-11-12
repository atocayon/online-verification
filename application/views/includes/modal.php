<div class="close" ><a href=""  id="close-modal">x</a></div>
<div class="modal" id="modal">
  <div class="row">
    <div class="">
      <div class="row">
        <div class="">
          <img src="<?= base_url() ?>src/img/avatar.png" alt="user-avatar" id="user-avatar">
        </div>
        <div class="">
            <p id="name" style="font-size: 2.5vw;"></p>
        </div>
      </div>


      <table id="mobile-table">
        <thead>
          <tr>
            <th>Module</th>
            <th>Duration</th>
            <th>Certificate Number</th>
          </tr>
        </thead>
        <tbody id="mobile_res">
          <tr>
            <td colspan="4" id="mobile-default">
              <center>
                <h2 style="color: #607D8B">Result will show up here</h2>
              </center>
            </td>

            <td colspan="4" id="mobile-no_data" style="display: none">
              <center>
                <h2 style="color: #d50000">No Data Found</h2>
              </center>
            </td>

            <td colspan="4" id="mobile-empty_field" style="display: none">
              <center>
                <h2 style="color: #FF6D00">Please don't leave input field empty</h2>
              </center>
            </td>
          </tr>
        </tbody>
      </table>

      <table id="byCertResult" style="display: none">
        <thead>
          <tr>
            <th>Name</th>
            <th>Module and Duration</th>
            <th>Certificate Number</th>
          </tr>
        </thead>
        <tbody id="mobile_res">
          <tr>
            <td colspan="4" id="byCert-mobile-default">
              <center>
                <h2 style="color: #607D8B">Result will show up here</h2>
              </center>
            </td>

            <td colspan="4" id="byCert-mobile-no_data" style="display: none">
              <center>
                <h2 style="color: #d50000">No Data Found</h2>
              </center>
            </td>

            <td colspan="4" id="byCert-mobile-empty_field" style="display: none">
              <center>
                <h2 style="color: #FF6D00">Please don't leave input field empty</h2>
              </center>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>


</div>

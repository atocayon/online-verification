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
  <div class="row table-container">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Cetificate Number</th>
          <th>Full name</th>
          <th>Date of Birth</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
          <td>Sample Data</td>
        </tr>

      </tbody>
      <tfoot>
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
      </tfoot>
    </table>
  </div>
</div>

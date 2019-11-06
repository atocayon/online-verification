<form>
  <div class="column">
    <div class="">
      <label>Module/Courses</label>
    </div>

    <div class="form-input-spacing">
      <select id="byPDC_module" name="module" title="Click to Select Module/Course" required>
        <option value="">Select Module/Course Here</option>
        <option value="20030814">IMO 3.12</option>
        <option value="20030808">IMO 6.09</option>
        <option value="20160001">(TSTA) 6.10</option>
      </select>
    </div>

    <div class="">
      <label>First Name</label>
    </div>

    <div class="form-input-spacing">
      <input id="byPDC_fname" type="text" name="fname" class="form-input-name" placeholder="Type here..." title="Type your First Name here" required>
    </div>

    <div class="">
      <label>Last Name</label>
    </div>

    <div class="form-input-spacing">
      <input id="byPDC_lname" type="text" name="lname" class="form-input-name" placeholder="Type here..." title="Type your Last Name here"  required>
    </div>

    <div class="">
      <label>Birthday</label>
    </div>

    <div class="form-input-spacing">
      <input id="byPDC_bday" type="date" name="bday" class="form-input-date" title="Put your Birthday here" required>
    </div>

    <div class="">
      <center>
        <button id="byPDC_submit" type="submit" class="submit-button" title="Click to Verify">Verify</button>
      </center>
    </div>

    <div class="">
      <center>
        <button id="searhAgain" class="tryAgain-button" title="Click to Clear your Search">Clear Search</button>
      </center>
    </div>

    <div class="form-input-spacing">
      <center>
        <button id="mobile-byPDC_submit" class="mobile-button" title="Click to Verify">Verify</button>
      </center>
    </div>
  </div>

</form>

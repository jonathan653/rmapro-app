<?php include('header.php'); ?>

<h1>Select Report View</h1>

<form class="report-form-group">

    <label for="consultant-name">Consultant Name*</label>
    <select>
        <option value=”conrad”>All Consultants</option>
        <option value=”conrad”>Conrad Anderson</option>
        <option value=”don”>Don Anderson</option>
    </select><br>
    <br>
    <input type="radio" name="report-type" value="all" required> View All Jobs<br>
    <input type="radio" name="report-type" value="one-month" required> One Month Report<br>
    <input type="radio" name="report-type" value="three-month" required> Three Month Report<br>
    <input type="radio" name="report-type" value="custom" required> Custom Report<br>

    <button type="submit">Submit</button>

</form>

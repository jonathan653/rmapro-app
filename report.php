<?php include('header.php'); ?>

<h1>Select your report view</h1>

<form class="report-form-group">

    <label for="consultant-name">Consultant name*</label>
    <select>
        <option value=”conrad”>Conrad Anderson</option>
        <option value=”don”>Don Anderson</option>
    </select><br>
    <br>
    <input type="radio" name="report-type" value="all" required> View all jobs report<br>
    <input type="radio" name="report-type" value="one-month" required> One-month report<br>
    <input type="radio" name="report-type" value="three-month" required> Three-month report<br>
    <input type="radio" name="report-type" value="custom" required> Custom report<br>

    <button type="submit">Submit</button>

</form>

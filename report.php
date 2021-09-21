<?php include('header.php'); ?>

<h1>Select your report view</h1>

<form class="report-form-group">
    <input type="radio" name="report-type" value="all"> View all jobs report<br>
    <input type="radio" name="report-type" value="one-month"> One-month report<br>
    <input type="radio" name="report-type" value="three-month"> Three-month report<br>
    <input type="radio" name="report-type" value="custom"> Custom report<br>

        <button type="submit">Submit</button>

</form>

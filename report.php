<?php include('header.php'); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<h1>Select Report View</h1>

<form class="report-form-group" method="post">

    <label for="consultant-name">Consultant Name*</label>
    <select>
        <option value=”conrad”>All Consultants</option>
        <option value=”conrad”>Conrad Anderson</option>
        <option value=”don”>Don Anderson</option>
    </select><br>
    <br>
    <input type="radio" name="report-type" id="all" value="all" required> View All Jobs<br>
    <input type="radio" name="report-type" id="one-month" value="one-month" required> One Month Report<br>
    <input type="radio" name="report-type" id="three-month" value="three-month" required> Three Month Report<br>
    <input type="radio" name="report-type" id="custom" value="custom" required> Custom Report<br>

    <script>
        $(function() {
            $('input[id="custom"]').daterangepicker({
                opens: 'centre'
            }, function(start, end, label) {
                alert(("Your selected date range is: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY')));
            });
        });
    </script>

    <button type="submit">Submit</button>

</form>

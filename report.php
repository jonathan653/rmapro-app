<?php include('header.php'); 
require('db.php'); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<h1>Select Report View</h1>

<form class="report-form-group" method="post">

    <!-- <label for="consultant-name">Consultant Name*</label>
    <select>
        <option value=”conrad”>All Consultants</option>
        <option value=”conrad”>Conrad Anderson</option>
        <option value=”don”>Don Anderson</option>
    </select><br>
    <br> -->
    <input type="radio" name="report-type" id="all" value="allJobs" required> View All Active Jobs<br>
    <input type="radio" name="report-type" id="all" value="allConditions" required> View All Active Conditions<br>
    <input type="radio" name="report-type" id="one-month" value="one-month" required> One Month Report<br>
    <input type="radio" name="report-type" id="three-month" value="three-month" required> Three Month Report<br>
    <input type="radio" name="report-type" id="custom" value="custom" required> Custom Report<br>

    <script>
        $(function() {
            $('input[id="custom"]').daterangepicker({
                opens: 'center'
            }, function(start, end, label) {
                alert(("Your selected date range is: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY')));
            });
        });
    </script>

    <button type="submit">Submit</button>

</form>

<br> <br> <br> <br>

<?php
//radio button tables
$answer = $_POST['report-type'];  
if ($answer == "allJobs") {  ?>          
    <!DOCTYPE html>
    <html>
    <head>
    <style>
    table, th, td {
        border: 1px solid black;
        padding: 10px;
        margin-left:100px;
    }
    </style>
    </head>
    <body>


    <?php

    // Attempt select query execution
    $sql = "SELECT consent.jobNumber, consent.address, clients.company, job_details.consultantName, consent.keywords, consent.lapseDate
    FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
    INNER JOIN clients ON consent.clientId=clients.clientId
    WHERE jobStatus = 'active'
    ORDER BY lapseDate";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>All active jobs ordered by lapse date and grouped by jobNumber</h1>";
        echo "<table> <tr> <th>Job Number</th> <th>Keywords</th> <th>Company</th> <th>Address</th> <th>Consultant Name</th> <th>Lapse Date</th> </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["jobNumber"] ."</td><td>". $row["keywords"]. "</td><td>" . $row["company"] . "</td><td>" . $row["address"]. "</td><td>" . $row["consultantName"]. "</td><td>" . $row["lapseDate"]. "</td></tr>";
    }
    echo "</table>";
    } else {
    echo "0 results";
    }
    //$db>close();
    ?>

    </body>
    </html> <?php          
          
        }elseif ($answer == "allConditions") {?>          
            <!DOCTYPE html>
            <html>
            <head>
            <style>
            table, th, td {
                border: 1px solid black;
                padding: 10px;
                margin-left:100px;
            }
            </style>
            </head>
            <body>
        
        
            <?php
        
            // Attempt select query execution
            $sql = "SELECT consent.jobNumber, consent.address, clients.company, job_details.consultantName, conditions.conditionNumber, conditions.conditionDate, consent.keywords
            FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
            INNER JOIN clients ON consent.clientId=clients.clientId
            INNER JOIN conditions ON consent.consentNumber=conditions.consentNumber
            WHERE  jobStatus = 'active' AND conditionStatus = 'active'
            ORDER BY conditionDate";
        
            $result = $db->query($sql);
        
            if ($result->num_rows > 0) {
                echo "<h1>All jobs with active conditions</h1>";
                echo "<table> <tr> <th>Job Number</th> <th>Keywords</th> <th>Company</th> <th>Address</th> <th>conditionDate</th> <th>conditionNumber</th> <th>consultantName</th> </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["jobNumber"] ."</td><td>". $row["keywords"]. "</td><td>" . $row["company"] . "</td><td>" . $row["address"]. "</td><td>" . $row["conditionDate"]. "</td><td>" . $row["conditionNumber"]. "</td><td>" . $row["consultantName"]. "</td></tr>";
            }
            echo "</table>";
            } else {
            echo "0 results";
            }
           // $db>close();
            ?>
        
            </body>
            </html> <?php          
          
}elseif ($answer == "one-month") {?>          
    <!DOCTYPE html>
    <html>
    <head>
    <style>
    table, th, td {
        border: 1px solid black;
        padding: 10px;
        margin-left:100px;
    }
    </style>
    </head>
    <body>


    <?php

    // Attempt select query execution
    $sql = "SELECT consent.jobNumber, consent.address, clients.company, job_details.consultantName, conditions.conditionNumber, conditions.conditionDate, consent.keywords
    FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
    INNER JOIN clients ON consent.clientId=clients.clientId
    INNER JOIN conditions ON consent.consentNumber=conditions.consentNumber
    WHERE (reminderDate >= CURRENT_DATE AND reminderDate <= ADDDATE(CURRENT_DATE, INTERVAL 30 DAY)) AND jobStatus = 'active' AND conditionStatus = 'active'
    OR (lapseDate>= CURRENT_DATE AND lapseDate<= ADDDATE(CURRENT_DATE, INTERVAL 9 MONTH) AND jobStatus = 'active')
    ORDER BY conditionDate";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Jobs needing action within one month</h1>";
        echo "<table> <tr> <th>Job Number</th> <th>Keywords</th> <th>Company</th> <th>Address</th> <th>conditionDate</th> <th>conditionNumber</th> <th>consultantName</th> </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["jobNumber"] ."</td><td>". $row["keywords"]. "</td><td>" . $row["company"] . "</td><td>" . $row["address"]. "</td><td>" . $row["conditionDate"]. "</td><td>" . $row["conditionNumber"]. "</td><td>" . $row["consultantName"]. "</td></tr>";
    }
    echo "</table>";
    } else {
    echo "0 results";
    }
    //$db>close();
    ?>

    </body>
    </html> <?php   
}elseif ($answer == "three-month") {?>          
    <!DOCTYPE html>
    <html>
    <head>
    <style>
    table, th, td {
        border: 1px solid black;
        padding: 10px;
        margin-left:100px;
    }
    </style>
    </head>
    <body>


    <?php

    // Attempt select query execution
    $sql = "SELECT consent.jobNumber, consent.address, clients.company, job_details.consultantName, conditions.conditionNumber, conditions.conditionDate, consent.keywords
    FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
    INNER JOIN clients ON consent.clientId=clients.clientId
    INNER JOIN conditions ON consent.consentNumber=conditions.consentNumber
    WHERE (reminderDate >= CURRENT_DATE AND reminderDate <= ADDDATE(CURRENT_DATE, INTERVAL 3 MONTH)) AND jobStatus = 'active' AND conditionStatus = 'active'
    OR (lapseDate>= CURRENT_DATE AND lapseDate<= ADDDATE(CURRENT_DATE, INTERVAL 12 MONTH) AND jobStatus = 'active')
    ORDER BY conditionDate";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Jobs needing action within three months</h1>";
        echo "<table> <tr> <th>Job Number</th> <th>Keywords</th> <th>Company</th> <th>Address</th> <th>conditionDate</th> <th>conditionNumber</th> <th>consultantName</th> </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["jobNumber"] ."</td><td>". $row["keywords"]. "</td><td>" . $row["company"] . "</td><td>" . $row["address"]. "</td><td>" . $row["conditionDate"]. "</td><td>" . $row["conditionNumber"]. "</td><td>" . $row["consultantName"]. "</td></tr>";
    }
    echo "</table>";
    } else {
    echo "0 results";
    }
    //$db>close();
    ?>

    </body>
    </html> <?php          
         
}elseif ($answer == "custom") {?>
    <script type="text/javascript">
    $('#daterange').daterangepicker();
    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
    var startDate = picker.startDate.format('YYYY-MM-DD');
    var endDate = picker.endDate.format('YYYY-MM-DD');
    return startDate;
    });
    </script>
    document.getElementById("startDate") <?php    
}
else { 
    echo " ";
}  

?>

<br> <br> <br> <br> <br> <br> <br> <br>
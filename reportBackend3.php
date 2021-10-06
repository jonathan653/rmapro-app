
<?php
require('db.php');
require_once 'dompdf_1-0-2(1)/dompdf/autoload.inc.php';  

    // reference the Dompdf namespace
    use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

// /* Attempt MySQL server connection. Assuming you are running MySQL
// server with default setting (user 'root' with no password) */
//$link = mysqli_connect("localhost", "root", "", "AnC_Sep22");
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT consent.jobNumber, consent.address, clients.company, job_details.consultantName, conditions.conditionNumber, conditions.conditionDate, consent.keywords
FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
INNER JOIN clients ON consent.clientId=clients.clientId
INNER JOIN conditions ON consent.consentNumber=conditions.consentNumber
WHERE (reminderDate >= CURRENT_DATE AND reminderDate <= ADDDATE(CURRENT_DATE, INTERVAL 7 DAY)) AND jobStatus = 'active' AND conditionStatus = 'active'
OR (lapseDate>= CURRENT_DATE AND lapseDate<= ADDDATE(CURRENT_DATE, INTERVAL 9 MONTH) AND jobStatus = 'active')
ORDER BY conditionDate";

$sql2 = "SELECT consent.jobNumber, consent.address, clients.company, job_details.consultantName, conditions.conditionNumber, conditions.conditionDate, consent.keywords
FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
INNER JOIN clients ON consent.clientId=clients.clientId
INNER JOIN conditions ON consent.consentNumber=conditions.consentNumber
WHERE (reminderDate > ADDDATE(CURRENT_DATE, INTERVAL 7 day) AND reminderDate <= ADDDATE(CURRENT_DATE, INTERVAL 30 DAY)) AND jobStatus = 'active' AND conditionStatus = 'active' 
OR (lapseDate>= ADDDATE(CURRENT_DATE, INTERVAL 9 MONTH) AND lapseDate<= ADDDATE(CURRENT_DATE, INTERVAL 10 MONTH) AND jobStatus = 'active') ORDER BY conditionDate";

$sql3 = "SELECT consent.jobNumber, consent.address, clients.company, job_details.consultantName, conditions.conditionNumber, conditions.conditionDate, consent.keywords
FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
INNER JOIN clients ON consent.clientId=clients.clientId
INNER JOIN conditions ON consent.consentNumber=conditions.consentNumber
WHERE (reminderDate > ADDDATE(CURRENT_DATE, INTERVAL 30 day) AND reminderDate <= ADDDATE(CURRENT_DATE, INTERVAL 90 DAY)) 
OR (lapseDate> ADDDATE(CURRENT_DATE, INTERVAL 10 MONTH) AND lapseDate<= ADDDATE(CURRENT_DATE, INTERVAL 12 MONTH)) AND jobStatus = 'active' ORDER BY conditionDate";

$str = "<html><body>";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        $str = $str. "<h1>Title Recall</h1>";
        $str = $str. "<h2>Anderson and Co</h2>";
        $str = $str. "<p>Active jobs filtered by lapse date and condition reminder date</p>";
        $str = $str. "<h3>This Week</h3>";
        $str = $str. "<table>";
            $str = $str.   "<tr>";
                $str = $str .  "<th>Job Number</th>";
                $str = $str .  "<th>Keywords</th>";
                $str = $str .  "<th>Client Name/ Company</th>";
                $str = $str .  "<th>Address</th>";
                $str = $str .  "<th>Condition Date</th>";
                $str = $str .  "<th>Condition Number</th>";
                $str = $str .  "<th>Consultant Name</th>";
            $str = $str .  "</tr>";
        while($row = mysqli_fetch_array($result)){
            $str = $str .  "<tr>";
                $str = $str .  "<td>" . $row['jobNumber'] . "</td>";
                $str = $str .  "<td>" . $row['keywords'] . "</td>";
                $str = $str .  "<td>" . $row['company'] . "</td>";
                $str = $str .  "<td>" . $row['address'] . "</td>";
                $str = $str .  "<td>" . $row['conditionDate'] . "</td>";
                $str = $str .  "<td>" . $row['conditionNumber'] . "</td>";
                $str = $str .  "<td>" . $row['consultantName'] . "</td>";
            $str = $str .  "</tr>";
        }
        $str = $str .  "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

if($result2 = mysqli_query($db, $sql2)){
    if(mysqli_num_rows($result2) > 0){
        $str = $str. "<h3>Rest of the coming month</h3>";
        $str = $str. "<table>";
            $str = $str.   "<tr>";
                $str = $str .  "<th>Job Number</th>";
                $str = $str .  "<th>Keywords</th>";
                $str = $str .  "<th>Client Name/ Company</th>";
                $str = $str .  "<th>Address</th>";
                $str = $str .  "<th>Condition Date</th>";
                $str = $str .  "<th>Condition Number</th>";
                $str = $str .  "<th>Consultant Name</th>";
            $str = $str .  "</tr>";
        while($row = mysqli_fetch_array($result2)){
            $str = $str .  "<tr>";
                $str = $str .  "<td>" . $row['jobNumber'] . "</td>";
                $str = $str .  "<td>" . $row['keywords'] . "</td>";
                $str = $str .  "<td>" . $row['company'] . "</td>";
                $str = $str .  "<td>" . $row['address'] . "</td>";
                $str = $str .  "<td>" . $row['conditionDate'] . "</td>";
                $str = $str .  "<td>" . $row['conditionNumber'] . "</td>";
                $str = $str .  "<td>" . $row['consultantName'] . "</td>";
            $str = $str .  "</tr>";
        }
        $str = $str .  "</table>";
        // Free result set
        mysqli_free_result($result2);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($db);
}

if($result3 = mysqli_query($db, $sql3)){
    if(mysqli_num_rows($result3) > 0){
        $str = $str. "<h3>Rest of the coming 90 Days</h3>";
        $str = $str. "<table>";
            $str = $str.   "<tr>";
                $str = $str .  "<th>Job Number</th>";
                $str = $str .  "<th>Keywords</th>";
                $str = $str .  "<th>Client Name/ Company</th>";
                $str = $str .  "<th>Address</th>";
                $str = $str .  "<th>Condition Date</th>";
                $str = $str .  "<th>Condition Number</th>";
                $str = $str .  "<th>Consultant Name</th>";
            $str = $str .  "</tr>";
        while($row = mysqli_fetch_array($result3)){
            $str = $str .  "<tr>";
                $str = $str .  "<td>" . $row['jobNumber'] . "</td>";
                $str = $str .  "<td>" . $row['keywords'] . "</td>";
                $str = $str .  "<td>" . $row['company'] . "</td>";
                $str = $str .  "<td>" . $row['address'] . "</td>";
                $str = $str .  "<td>" . $row['conditionDate'] . "</td>";
                $str = $str .  "<td>" . $row['conditionNumber'] . "</td>";
                $str = $str .  "<td>" . $row['consultantName'] . "</td>";
            $str = $str .  "</tr>";
        }
        $str = $str .  "</table>";
        // Free result set
        mysqli_free_result($result3);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($db);
}

$str = $str . "</body></html>";
// Close connection
mysqli_close($db);

//This is how you pass $str to the dompdf function for converting html to pdf
$dompdf->loadHtml($str);
     
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();
    // Output the generated PDF to Browser $dompdf->stream();
    $dompdf->stream("Attachment");
?>
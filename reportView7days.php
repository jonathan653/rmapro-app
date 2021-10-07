<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    padding: 10px;
    margin:20px;
}
</style>
</head>
<body>


<?php
require('db.php');
include('header.php');  

// Attempt select query execution
$sql = "SELECT consent.jobNumber, consent.address, clients.company, job_details.consultantName, conditions.conditionNumber, conditions.conditionDate, consent.keywords
FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
INNER JOIN clients ON consent.clientId=clients.clientId
INNER JOIN conditions ON consent.consentNumber=conditions.consentNumber
WHERE (reminderDate >= CURRENT_DATE AND reminderDate <= ADDDATE(CURRENT_DATE, INTERVAL 7 DAY)) AND jobStatus = 'active' AND conditionStatus = 'active'
OR (lapseDate>= CURRENT_DATE AND lapseDate<= ADDDATE(CURRENT_DATE, INTERVAL 9 MONTH) AND jobStatus = 'active')
ORDER BY conditionDate";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Jobs needing action within 7 days</h1>";
    echo "<table> <tr> <th>Job Number</th> <th>Keywords</th> <th>Company</th> <th>Address</th> <th>conditionDate</th> <th>conditionNumber</th> <th>consultantName</th> </tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["jobNumber"] ."</td><td>". $row["keywords"]. "</td><td>" . $row["company"] . "</td><td>" . $row["address"]. "</td><td>" . $row["conditionDate"]. "</td><td>" . $row["conditionNumber"]. "</td><td>" . $row["consultantName"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$db>close();
?>

</body>
</html>
<?php

// variables
// to store in job table
$jobNumber = $_POST['jobNumber'];
$jobStatus = $_POST['jobStatus'];

// to store in condition table
$conditionNumber = $_POST['conditionNumber'];
$details  = $_POST['details'];
$conditionDate = $_POST['conditionDate'];
$reminderDate = $_POST['redminerDate'];
$conditionStatus = $_POST['conditionStatus'];

// to store in consent table
$consentNumber = $_POST['consentNumber'];
$issueDate = $_POST['issueDate'];
$lapseDate = $_POST['lapseDate'];
$consentDoc = $_POST['consentDoc'];
$keywords = $_POST['keywords'];

// to store in users table
$username = $_POST['username'];
$consultantName = $_POST['consultantName'];
$email = $_POST['email'];
$password  = $_POST['password'];

// to store in property table
$address  = $_POST['address'];

//echo out/test values being submitted
echo $jobNumber."<br>".$jobStatus."<br>";
echo $conditionNumber."<br>".$details."<br>".$conditionDate."<br>".$reminderDate."<br>".$conditionStatus."<br>";
echo $consentNumber."<br>".$issueDate."<br>".$lapseDate."<br>".$consentDoc."<br>".$keywords."<br>";
echo $username."<br>".$consultantName."<br>"$email."<br>".$password."<br>";
echo $address."<br>";

/* attempt MySQL server connection. Assuming you are running 
MySQL server with default setting (user 'root' with no password)*/
$link = new mysqli('localhost','root','','AnC_Sep22');

//check connection
if($link->connect_error){
    die('Connection Failed : '.$link->connect_error);
}else{
    // insert variables into database using prepared statements
    $stmt = $link->prepare("insert into job_details(jobNumber, jobStatus)
        values(?,?)");
    $stmt->bind-param("ss") //continue from here 
}


?>

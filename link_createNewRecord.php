<?php

/* attempt MySQL server connection. Assuming you are running 
MySQL server with default setting (user 'root' with no password)*/
$link = new mysqli('localhost','root','','AnC_Sep22');

// variables
//to store in client table

$clientId = $_POST['clientId'];
$company = $_POST['company'];
$clientEmail = $_POST['clientEmail'];
$clientPhone = $_POST['clientPhone'];

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

// to store in property table
$address  = $_POST['address'];

//echo out/test values being submitted
echo $clientId."<br>".$company."<br>".$clientEmail."<br>".$clientPhone."<br>";
echo $jobNumber."<br>".$jobStatus."<br>";
echo $conditionNumber."<br>".$details."<br>".$conditionDate."<br>".$reminderDate."<br>".$conditionStatus."<br>";
echo $consentNumber."<br>".$issueDate."<br>".$lapseDate."<br>".$consentDoc."<br>".$keywords."<br>";
echo $address."<br>";

$sql = "insert into clients(clientId,company,clientEmail,clientPhone) values('$clientId','$company','$clientEmail','$clientPhone')";
$sql = "insert into job_details(jobNumber,jobStatus) values('$jobNumber','$jobStatus')";
$sql = "insert into conditions(conditionNumber,details,conditionDate,reminderDate,conditionStatus) values('$conditionNumber','$details','$conditionDate','$reminderDate','$conditionStatus')";
$sql = "insert into consent(consentNumber,issueDate,lapseDate,consentDoc,keywords) values('$consentNumber','$issueDate','$lapseDate','$consentDoc','$keywords')";
$sql = "insert into property(address) values('$address')";




$link->query($sql);

/*
//check connection
if($link->connect_error){
    die('Connection Failed : '.$link->connect_error);
}else{
    // insert variables into datbase using prepared statements
    $stmt = $link->prepare("insert into client(clientId,company,clientEmail,clientPhone)
        values(?,?,?,?)"); 
    $stmt->bind_param("s,s,s,i",$clientId,$company,$clientEmail,$clientPhone);
    $stmt->execute();
    echo "client details inserted successfully"."<br>";

        // insert variables into datbase using prepared statements
        $stmt = $link->prepare("insert into property(address)
        values(?)"); 
    $stmt->bind_param("s",$address);
    $stmt->execute();
    echo "property details inserted successfully"."<br>";

    // insert variables into database using prepared statements
    $stmt = $link->prepare("insert into job_details(jobNumber, jobStatus)
        values(?,?)");
    $stmt->bind-param("s,s", $jobNumber, $jobStatus);
    $stmt->execute();
    echo "job details inserted successfully"."<br>";
    
    // insert variables into datbase using prepared statements
    $stmt = $link->prepare("insert into consent(consentNumber,issueDate,lapseDate,consentDoc,keywords)
        values(?,?,?,?,?)"); 
    $stmt->bind_param("s,s,s,s,s",$consentNumber,$issueDate,$lapseDate,$consentDoc,$keywords);
    $stmt->execute();
    echo "consent details inserted successfully"."<br>";

    // insert variables into datbase using prepared statements
    $stmt = $link->prepare("insert into conditions(conditionNumber,details,conditionDate,reminderDate,conditionStatus)
        values(?,?,?,?,?)"); 
    $stmt->bind_param("s,s,s,s,s",$conditionNumber,$details,$conditionDate,$reminderDate,$conditionStatus);
    $stmt->execute();
    echo "condition details inserted successfully"."<br>";
    $stmt->close();

}
*/
$link->close();



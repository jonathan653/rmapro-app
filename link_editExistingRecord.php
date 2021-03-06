<?php
require('db.php');

ini_set('display_errors', 1); // print error statement
ini_set('display_startup_errors', 1); // print error statement
error_reporting(E_ALL); // print error statement

// /* attempt MySQL server connection. Assuming you are running 
// MySQL server with default setting (user 'root' with no password)*/
// $link = new mysqli('localhost','root','','AnC_Sep22');


// variables
//to store in client table

$clientId = $_POST['clientId'];
$company = $_POST['company'];
$clientEmail = $_POST['clientEmail'];
$clientPhone = $_POST['clientPhone'];

// to store in property table
$oldaddress  = $_POST['oldaddress'];
$address  = $_POST['address'];

// to store in job table
$jobNumber = $_POST['jobNumber'];
$jobStatus = $_POST['jobStatus'];
$consultantName = $_POST['consultantName'];
$consultantName = str_replace('”','',$_POST['consultantName']);
$jobStatus = str_replace('”','',$_POST['jobStatus']);
$jobStatus = str_replace('"','',$_POST['jobStatus']);

// to store in consent table
$consentNumber = $_POST['consentNumber'];
$issueDate = $_POST['issueDate'];
$lapseDate = $_POST['lapseDate'];
$keywords = $_POST['keywords'];

/*
 // to store in condition table
 $conditionNumber = $_POST['conditionNumber' . $i];
 $details  = $_POST['details'. $i];
 $conditionDate = $_POST['conditionDate'.$i];
$reminderDate = $_POST['reminderDate'.$i];
$conditionStatus = str_replace('”','',$_POST['conditionStatus'.$i]);
*/

//check connection
if($db->connect_error){
    die('Connection Failed : '.$db->connect_error);
}else{
        // update variables into datbase using prepared statements
    $stmt = $db->prepare("update clients 
    set company=?,clientEmail=?,clientPhone=?
    where clientId = '$clientId'"); 
    $stmt->bind_param("ssi",$company,$clientEmail,$clientPhone);
    $stmt->execute();
    //echo $clientId, $company, $clientEmail, $clientPhone;
    //echo "client details inserted successfully"."<br>";
    $stmt->close();
        
//    // update variables into datbase using prepared statements
  /*   $stmt = $db->prepare("update consent set address=? where consentNumber = ?");
    $stmt->bind_param("ss",$consentNumber,$address);
    $stmt->execute();
     //echo $address;
//     //echo "property details inserted successfully"."<br>";
     $stmt->close();*/

     // update variables into database using prepared statements
     $stmt = $db->prepare("update job_details set jobStatus=? where jobNumber='$jobNumber'");
     $stmt->bind_param("s", $jobStatus);
     $stmt->execute();
     //echo $jobNumber, $jobStatus, $consultantName;
     //echo "job details inserted successfully"."<br>";
     $stmt->close();


    
    // update variables into datbase using prepared statements
    // $stmt = $db->prepare("update consent set consentNumber=?, issueDate=?, lapseDate=?, keywords=?, address=?, clientId=?, jobNumber=? where consent.jobNumber = '".$jobNumber."'");
    $stmt = $db->prepare("update consent set issueDate=?, lapseDate=?, keywords=?, address=? where consentNumber='$consentNumber'");
    $stmt->bind_param("ssss", $issueDate, $lapseDate, $keywords,$address);
    $stmt->execute();
    //echo $consentNumber,$issueDate,$lapseDate,$keywords,$address,$clientId,$jobNumber;
    //echo "consent details inserted successfully"."<br>";
    $stmt->close();

 $i =0;
 while (isset($_POST['conditionNumber' . $i])) {
 // to store in condition table
 $OldconditionNumber = $_POST['OldconditionNumber' . $i];
     $conditionNumber = $_POST['conditionNumber' . $i];
     $details  = $_POST['details'. $i];
     $conditionDate = $_POST['conditionDate'.$i];
   $reminderDate = $_POST['reminderDate'.$i];
    $conditionStatus = str_replace('”','',$_POST['conditionStatus'.$i]);
  //  echo $conditionNumber, $details, $conditionDate, $reminderDate, $conditionStatus,$consentNumber;
    
//    // insert variables into datbase using prepared statements
   $stmt = $db->prepare("update conditions 
   set details=?, conditionDate=?, reminderDate=?, conditionStatus=?, conditionNumber=?
   where consentNumber=? and conditionNumber=?"); 
    $stmt->bind_param("sssssss",$details,$conditionDate,$reminderDate,$conditionStatus,$conditionNumber,$consentNumber,$OldconditionNumber);
    $stmt->execute();
//     //echo $conditionNumber,$details,$conditionDate,$reminderDate,$conditionStatus,$consentNumber;
//     //echo "condition details inserted successfully"."<br>";
   // echo "<br />ERROR: " . $stmt->error . "----<br />";
     $stmt->close();


        // insert variables into datbase using prepared statements
  $stmt = $db->prepare("insert into conditions(conditionNumber,details,conditionDate,reminderDate,conditionStatus,consentNumber)
  values(?,?,?,?,?,?)"); 
    $stmt->bind_param("ssssss",$conditionNumber,$details,$conditionDate,$reminderDate,$conditionStatus,$consentNumber);
    $stmt->execute();
    //echo $conditionNumber,$details,$conditionDate,$reminderDate,$conditionStatus,$consentNumber;
    //echo "condition details inserted successfully"."<br>";
    $stmt->close();
    

 $i++;
 }
/*

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



 //$link->query($sql);

*/
include('header.php'); 
echo '<style>
h2 {text-align: center;}
</style>
<h2>Record updated successfully</h2>';

}



$db->close();


?>



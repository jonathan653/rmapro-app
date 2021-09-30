
<?php
require_once 'dompdf_1-0-2(1)/dompdf/autoload.inc.php';  

    // reference the Dompdf namespace
    use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "AnC_Sep25");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM job_details";
$str = "<html><body>";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        $str = $str. "<table>";
            $str = $str.   "<tr>";
                $str = $str .  "<th>Job Number</th>";
                $str = $str .  "<th>Consultant Name</th>";
                $str = $str .  "<th>Job Status</th>";
            $str = $str .  "</tr>";
        while($row = mysqli_fetch_array($result)){
            $str = $str .  "<tr>";
                $str = $str .  "<td>" . $row['jobNumber'] . "</td>";
                $str = $str .  "<td>" . $row['consultantName'] . "</td>";
                $str = $str .  "<td>" . $row['jobStatus'] . "</td>";
            $str = $str .  "</tr>";
        }
        $str = $str .  "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$str = $str . "</body></html>";
// Close connection
mysqli_close($link);

//This is how you pass $str to the dompdf function for converting html to pdf
$dompdf->loadHtml($str);
     
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();
    // Output the generated PDF to Browser $dompdf->stream();
    $dompdf->stream("Attachment");
?>
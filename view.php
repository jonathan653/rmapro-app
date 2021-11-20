<?php
include('header.php');
include('db.php');

?>
<h1>Edit / View Record</h1>

<?php
if (isset($_GET['search'])) {
    $jobNumber = $_GET['search'];

    $Query = "SELECT consent.consentNumber, consent.issueDate, consent.lapseDate, consent.keywords, consent.jobNumber, consent.clientId, consent.address, 
    clients.clientId, clients.company, clients.clientPhone, clients.clientEmail,
    job_details.jobNumber, job_details.jobStatus, job_details.consultantName,
    conditions.conditionNumber, conditions.consentNumber, conditions.details, conditions.conditionDate, conditions.reminderDate, conditions.conditionStatus
FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
INNER JOIN clients ON consent.clientId=clients.clientId
INNER JOIN conditions ON consent.consentNumber=conditions.consentNumber
WHERE consent.jobNumber = '" . $jobNumber . "'";
    $ExecQuery = mysqli_query($db, $Query);

    $counter = 0;
    while ($Result = mysqli_fetch_array($ExecQuery)) {
        if ($counter == 0) {
?>
   

    <form action="link_editExistingRecord.php" method="POST">
        <div class="wrapper">
            <div class="form-group">
                <div class="input-section">
                    <h2>Consent Details</h2>
                    <div class="record-input-group">
                        <label for="consentNumber">Consent Number*</label>
                        <input type="text" name="consentNumber" id="consentNumber" value="<?php echo $Result['consentNumber']; ?>" readonly>
                    </div>
                    <div class="record-input-group">
                        <label for="address">Property Address*</label>
                        <input type="text" name="address" id="address" value="<?php echo $Result['address']; ?>">
                        <input type="hidden" name="oldaddress" id="oldaddress" value="<?php echo $Result['address']; ?>">
                    </div>
                    <div class="record-input-group">
                        <label for="issueDate">Issue Date*</label>
                        <input type="date" id="issueDate" name="issueDate" value="<?php echo $Result['issueDate']; ?>">
                    </div>
                    <div class="record-input-group">
                        <label for="lapseDate">Lapse Date*</label>
                        <input type="date" id="lapseDate" name="lapseDate" value="<?php echo $Result['lapseDate']; ?>">
                    </div>
                    <div class="record-input-group">
                        <label for="keywords">Keywords*</label>
                        <input type="text" name="keywords" id="keywords" value="<?php echo $Result['keywords']; ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-section">
                    <h2>Client Details</h2>
                    <div class="record-input-group">
                        <label for="clientId">Client ID*</label>
                        <input type="text" name="clientId" id="clientId" value="<?php echo $Result['clientId']; ?>"  readonly>
                    </div>
                    <div class="record-input-group">
                        <label for="company">Company/ Client Name*</label>
                        <input type="text" name="company" id="company" value="<?php echo $Result['company']; ?>">
                    </div>
                    <div class="record-input-group">
                        <label for="clientPhone">Client Phone*</label>
                        <input type="tel" name="clientPhone" id="clientPhone" value="<?php echo $Result['clientPhone']; ?>">
                    </div>
                    <div class="record-input-group">
                        <label for="clientEmail">Client Email*</label>
                        <input type="email" name="clientEmail" id="clientEmail" value="<?php echo $Result['clientEmail']; ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-section">
                    <h2>Condition Summary / Details</h2>
                    <div class="record-input-group">
                        <label for="jobNumber">Job Number*</label>
                        <input type="text" name="jobNumber" id="jobNumber" value="<?php echo $Result['jobNumber']; ?>"  readonly>
                    </div>
                    <!-- <div class="record-input-group">
                    <label for="jobStatus">Job Status*</label>
                    <select name="jobStatus" id="jobStatus" required>
                        <option value=$jobStatus selected>$jobStatus</option>
                         <option value="inactive">Inactive</option> 
                    </select>
                </div> -->


                    <?Php
                    echo "<br>Job Status*";
                    require "db.php"; // Database connection

                    if ($r_set = $db->query("SELECT jobStatus from job_details where jobNumber='$jobNumber'")) {

                        echo "<select name='jobStatus' id='jobStatus' required>";
                        while ($row = $r_set->fetch_assoc()) {
                            if (!empty($row["jobStatus"]))
                                echo "<option value='" . $row["jobStatus"] . "'>" . $row["jobStatus"] . "</option>";
                            echo "<option value='active'>active</option>";
                            echo "<option value='inactive'>inactive</option>";
                        }


                        echo "</select>";
                    } else {
                        echo $db->error;
                    }
                    ?> <br>

                    <!-- <div class="record-input-group">
                    <label for="consultantName">Consultant*</label>
                    <select name="consultantName" id="consultantName" value="<?php /*echo $Result['consultantName']; */ ?>">
                        <option value=”conrad-anderson”>Conrad Anderson</option>
                        <option value=”don-anderson”>Don Anderson</option>
                    </select>
                </div> -->
                   
                 <?Php
                    echo "<br>Consultant*";
                    $selectedConsultant = "";
                    if ($r_set1 = $db->query("SELECT job_details.consultantName from job_details
                    INNER JOIN users on job_details.consultantName=users.consultantName
                    WHERE job_details.jobNumber='$jobNumber'")) {

                       
                        while ($row = $r_set1->fetch_assoc()) {
                            if (!empty($row["consultantName"]))
                            $selectedConsultant = $row["consultantName"];
                                
                        }

                       
                    } else {
                        echo $db->error;
                    }

                    if($r_set = $db->query("SELECT consultantName from users")){
                
                        echo "<select name='consultantName' id='consultantName' required>";
                        while ($row = $r_set->fetch_assoc()) {
                            if (!empty($row["consultantName"])) {
                                if ($row["consultantName"] == $selectedConsultant) {
                                    echo "<option value='" . $row["consultantName"] . "' selected>" . $row["consultantName"] . "</option>";
                                } else {
                                    echo "<option value='" . $row["consultantName"] . "'>" . $row["consultantName"] . "</option>";
                                }
                            }
                        }
                        
                        echo "</select>";
                        }else{
                        echo $db->error;
                        }

                    ?>



                <br> <br>  

         
                 <?php
        }  ?>
                    <br>
                    <fieldset class="new-input-part">
                                <legend>Consent Condition</legend>
                              
                        <label for=<?php echo "conditionNumber".$counter; ?> >Condition Number*</label><input type="text" name=<?php echo "conditionNumber".$counter; ?> id=<?php echo "conditionNumber".$counter; ?> value="<?php echo $Result['conditionNumber']; ?>">
                        
                        <input type="hidden" name=<?php echo "OldconditionNumber".$counter; ?> id=<?php echo "OldconditionNumber".$counter; ?> value="<?php echo $Result['conditionNumber']; ?>">
                    
                   
                        <label for=<?php echo "details".$counter; ?>>Details*</label>
                        <input type="text" name=<?php echo "details".$counter; ?> id=<?php echo "details".$counter; ?> value="<?php echo $Result['details']; ?>">
                    
                        <label for=<?php echo "conditionDate".$counter; ?>>Condition Date*</label>
                        <input type="date" name=<?php echo "conditionDate".$counter; ?> id=<?php echo "conditionDate".$counter; ?> value="<?php echo $Result['conditionDate']; ?>">
                    
                        <label for=<?php echo "reminderDate".$counter; ?>>Reminder Date*</label>
                        <input type="date" name=<?php echo "reminderDate".$counter; ?> id=<?php echo "reminderDate".$counter; ?> value="<?php echo $Result['reminderDate']; ?>">
                    
                    <?Php
                    echo "<br>Condition Status*"; ?>
                     <?Php

                    if ($r_set = $db->query("select conditions.conditionStatus from conditions where conditions.conditionNumber = '".$Result['conditionNumber']."' and consentNumber = '".$Result['consentNumber']."'")) {
                         echo "<select name='conditionStatus".$counter."' id='conditionStatus".$counter."' required>";
                        while ($row = $r_set->fetch_assoc()) {
                            if (!empty($row["conditionStatus"]))
                                //echo "<option value='" . $row["conditionStatus"] .  "</option>";
                               //echo "<option value='" . $row["conditionStatus"] . "'>" . $row["conditionStatus"] . "</option>";
                              // echo "<option value='" . $r_set->fetch_assoc() . "</option>";
                                if($row["conditionStatus"] == "inactive") {
                                    echo "<option value='active'>active</option>";
                                    echo "<option value='inactive' selected>inactive</option>";

                                } else if($row["conditionStatus"] == "active") {
                                    echo "<option value='active' selected>active</option>";
                                    echo "<option value='inactive'>inactive</option>";
                                }

                        }



                        echo "</select>";
                    } else {
                        echo $db->error;
                    }
                    ?>
                    </fieldset>
                    <br>
<?php
    if ($counter == (mysqli_num_rows ( $ExecQuery ) - 1)) { ?> 
    <div class="add-new-condition"></div>
    <button class="add_more_button">Add New Condition</button>

                </div>
            </div>
            
            <div class="submit-btn">
                <button class="update-centre-btn" type="submit">Update&nbsp;Record</button>
            </div>
    </form>
<?php } $counter++;
}}

?>





<script>
    $(document).ready(function () {
        var arrayC = <?php echo (mysqli_num_rows ( $ExecQuery ) - 1);?>;
        
        $('.add_more_button').click(function (e) {
            e.preventDefault();
            arrayC++;
            $('.add-new-condition').append('<fieldset class="new-input-part">' +
                '<legend>Consent Condition</legend>' +

                '<label for="conditionNumber">Condition Number*</label><br>' +
                '<input type="text" name="conditionNumber' + arrayC + '" id="conditionNumber" maxlength="4" required><br>' +
                
                '<label for="details">Condition Summary / Details</label><br>' +
                '<input type="text" name="details' + arrayC + '" id="details" required><br>' +
                
                '<label for="conditionDate">Condition date*</label><br>' +
                '<input type="date" name="conditionDate' + arrayC + '" id="conditionDate" required><br>' +
                
                '<label for="reminderDate">Reminder date*</label>' +
                '<input type="date" name="reminderDate' + arrayC + '" id="reminderDate" required><br>' +
                
            '<label for="conditionStatus">Condition status*</label><br>' +
            '<select name="conditionStatus' + arrayC + '" id="conditionStatus" required><option value="active" selected>Active</option>' +
            '<option value="inactive">Inactive</option></select>' +
                
                '</fieldset>');
            });
            $('.new-input-part').on("click", ".remove-field", function (e) {
                e.preventDefault();
                arrayC--;
                $(this).parent('fieldset').remove();
                 });
             });
         
     </script>
 </div>

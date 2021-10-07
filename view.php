<?php
include('header.php');
include('db.php');

?>
<h1>Edit / View Record</h1>

<?php
if (isset($_GET['search'])) {
    $jobNumber = $_GET['search'];

    $Query = "SELECT *
FROM consent INNER JOIN job_details ON consent.jobNumber=job_details.jobNumber 
INNER JOIN clients ON consent.clientId=clients.clientId
INNER JOIN conditions ON consent.consentNumber=conditions.consentNumber
WHERE consent.jobNumber = '".$jobNumber."'";
    $ExecQuery = mysqli_query($db, $Query);

    if ($Result = mysqli_fetch_array($ExecQuery)) {
        ?>
        <?php
    }
    ?>

    <form action="" method="POST">
        <div class="wrapper">
            <div class="form-group">
                <div class="input-section">
                    <h2>Consent Details</h2>
                    <div class="record-input-group">
                        <label for="consentNumber">Consent Number*</label>
                        <input type="text" name="consentNumber" id="consentNumber"
                               value="<?php echo $Result['consentNumber']; ?>">
                    </div>
                    <div class="record-input-group">
                        <label for="address">Property Address*</label>
                        <input type="text" name="address" id="address" value="<?php echo $Result['address']; ?>">
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
                        <input type="text" name="clientId" id="clientId" value="<?php echo $Result['clientId']; ?>">
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
                        <input type="email" name="clientEmail" id="clientEmail"
                               value="<?php echo $Result['clientEmail']; ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-section">
                    <h2>Condition Summary / Details</h2>
                    <div class="record-input-group">
                        <label for="jobNumber">Job Number*</label>
                        <input type="text" name="jobNumber" id="jobNumber" value="<?php echo $Result['jobNumber']; ?>">
                    </div>
                    <!--<div class="record-input-group">
                    <label for="jobStatus">Job Status*</label>
                    <select name="jobStatus" id="jobStatus">
                        <option value=”active”>Active</option>
                        <option value=”inactive”>Inactive</option>
                    </select>
                </div>
                <div class="record-input-group">
                    <label for="consultantName">Consultant*</label>
                    <select name="consultantName" id="consultantName" value="<?php /*echo $Result['consultantName']; */?>">
                        <option value=”conrad-anderson”>Conrad Anderson</option>
                        <option value=”don-anderson”>Don Anderson</option>
                    </select>
                </div>-->

                    <!-- <button class="add_more_button">Add New Condition</button>

                     <div class="add-new-condition"></div>
                     <script>
                         $(document).ready(function () {
                             $('.add_more_button').click(function (e) {
                                 e.preventDefault();
                                 $('.add-new-condition').append('<fieldset class="new-input-part">' +
                                     '<legend>Consent Condition</legend>' +
                                     '<a href="#" class="remove-field">Remove</a><br>' +

                                     '<label for="conditionNumber">Condition Number*</label><br>' +
                                     '<input type="text" name="conditionNumber" id="conditionNumber" required><br>' +

                                     '<label for="details">Condition Summary / Details</label><br>' +
                                     '<input type="text" name="details" id="details" required><br>' +

                                     '<label for="conditionDate">Condition date*</label><br>' +
                                     '<input type="date" name="conditionDate" id="conditionDate" required><br>' +

                                     '<label for="reminderDate">Reminder date*</label>' +
                                     '<input type="date" name="reminderDate" id="reminderDate" required><br>' +

                                     '<label for="conditionStatus">Condition status*</label><br>' +
                                     '<select name= conditionStatus id= conditionStatus><option value=”active”>Active</option>' +
                                     '<option value=”inactive”>Inactive</option>/select>' +

                                     '</fieldset>');

                                 $('.new-input-part').on("click", ".remove-field", function (e) {
                                     e.preventDefault();
                                     $(this).parent('fieldset').remove();
                                 });
                             });
                         });
                     </script>
                 </div>-->
                </div>
            </div>
            <div class="submit-btn">
                <button class="update-centre-btn" type="submit">Update&nbsp;Record</button>
            </div>
    </form>
<?php }

?>


<?php include('header.php'); 
require('db.php');
?>

<h1>Create New Record</h1>
<p id="date-time"></p>

<form action="link_createNewRecord.php" method="POST">
    <div class="wrapper">
        <div class="form-group">
            <div class="input-section">
                <h2>Consent Details</h2>
                <div class="record-input-group">
                    <label for="consentNumber">Consent Number*</label>
                    <input type="text" name="consentNumber" id="consentNumber" maxlength="12" required>
                </div>
                <div class="record-input-group">
                    <label for="address">Property Address*</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="record-input-group">
                    <label for="consentDoc">Attach Consent Issue Document</label>
                    <input type="file" id="consentDoc" name="consentDoc">
                </div>
                <div class="record-input-group">
                    <label for="issueDate">Issue Date*</label>
                    <input type="date" id="issueDate" name="issueDate" required>
                </div>
                <div class="record-input-group">
                    <label for="lapseDate">Lapse Date*</label>
                    <input type="date" id="lapseDate" name="lapseDate" required>
                </div>
                <div class="record-input-group">
                    <label for="keywords">Keywords*</label>
                    <input type="text" name="keywords" id="keywords" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="input-section">
                <h2>Client Details</h2>
                <div class="record-input-group">
                    <label for="clientId">Client ID*</label>
                    <input type="text" name="clientId" id="clientId" maxlength="7" required>
                </div>
                <div class="record-input-group">
                    <label for="company">Company/ Client Name*</label>
                    <input type="text" name="company" id="company" required>
                </div>
                <div class="record-input-group">
                    <label for="clientPhone">Client Phone*</label>
                    <input type="text" name="clientPhone" id="clientPhone" placeholder="Only enter digits. Do not enter spaces or special characters such as -" required>
                </div>
                <div class="record-input-group">
                    <label for="clientEmail">Client Email*</label>
                    <input type="email" name="clientEmail" id="clientEmail" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="input-section">
                <h2>Condition Summary / Details</h2>
                <div class="record-input-group">
                    <label for="jobNumber">Job Number*</label>
                    <input type="text" name="jobNumber" id="jobNumber" maxlength="4" required>
                </div>
                <div class="record-input-group">
                    <label for="jobStatus">Job Status*</label>
                    <select name="jobStatus" id="jobStatus" required>
                        <option value="active"selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                
                <div class="record-input-group">
                   <label for="consultantName">Consultant*</label>
                    <select name="consultantName" id="consultantName" required>
                        <option value="conrad-anderson">Conrad Anderson</option>
                        <option value="don-anderson">Don Anderson</option>
                    </select>
                </div>             
              
                <button class="add_more_button">Add New Condition</button>

                <div class="add-new-condition"></div>
                <script>
                    $(document).ready(function () {
                         var arrayC = 0
                        
                        $('.add_more_button').click(function (e) {
                            e.preventDefault();
                            arrayC++;
                            $('.add-new-condition').append('<fieldset class="new-input-part">' +
                                '<legend>Consent Condition</legend>' +
                                '<a href="#" class="remove-field">Remove</a><br>' +

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

                            $('.new-input-part').on("click", ".remove-field", function (e) {
                                e.preventDefault();
                                arrayC--;
                                $(this).parent('fieldset').remove();
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="submit-btn">
    <button class="centre-btn" type="submit">Save Record</button>
    </div>
</form>


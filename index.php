<?php include('header.php'); ?>

<h1>Create New Record</h1>
<p id="date-time"></p>

<script>
    var results = new Date().toDateString();
    $('#date-time').html("Current date is: " + results);
</script>

<form action="link_createNewRecord.php" method="POST">
    <div class="wrapper">
        <div class="form-group">
            <div class="input-section">
                <h3>Consent Details</h3>
                <div class="record-input-group">
                    <label for="consentNumber">Consent Number*</label>
                    <input type="text" name="consentNumber" id="consentNumber" required>
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
                <h3>Client Details</h3>
                <div class="record-input-group">
                    <label for="clientId">Client ID*</label>
                    <input type="text" name="clientId" id="clientId" required>
                </div>
                <div class="record-input-group">
                    <label for="company">Company/ Client Name*</label>
                    <input type="text" name="company" id="company" required>
                </div>
                <div class="record-input-group">
                    <label for="clientPhone">Client Phone*</label>
                    <input type="tel" name="clientPhone" id="clientPhone" required>
                </div>
                <div class="record-input-group">
                    <label for="clientEmail">Client Email*</label>
                    <input type="email" name="clientEmail" id="clientEmail" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="input-section">
                <h3>Condition Summary / Details</h3>
                <div class="record-input-group">
                    <label for="address">Property Address*</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="record-input-group">
                    <label for="conditionNumber">Job Number*</label>
                    <input type="text" name="conditionNumber" id="conditionNumber" required>
                </div>
                <div class="record-input-group">
                    <label for="conditionStatus">Condition Status*</label>
                    <select>
                        <option value=”active”>Active</option>
                        <option value=”inactive”>Inactive</option>
                    </select>
                </div>
                <div class="record-input-group">
                    <label for="consultant">Consultant*</label>
                    <select>
                        <option value=”conrad-anderson”>Conrad Anderson</option>
                        <option value=”don-anderson”>Don Anderson</option>
                    </select>
                </div>

                <button class="add_more_button">Add New Condition</button>

                <div class="add-new-condition"></div>
                <script>
                    $(document).ready(function () {
                        $('.add_more_button').click(function (e) {
                            e.preventDefault();
                            $('.add-new-condition').append('<fieldset class="new-input-part">' +
                                '<legend>Consent Condition</legend>' +
                                '<a href="#" class="remove-field">Remove</a><br>' +
                                '<label for="job-condition">Condition Number*</label><br>' +
                                '<input type="text" name="job-condition" id="job-condition" placeholder="Enter Condition Number Here" required><br>' +
                                '<label for="job-condition">Condition Summary / Details</label><br>' +
                                '<input type="text" name="job-details" id="job-details" placeholder="Enter Condition Details Here" required><br>' +
                                '<label for="condition-date">Condition date*</label><br>' +
                                '<select><option value=”two-weeks”>2 Weeks</option>' +
                                '<option value=”four-weeks”>4 Weeks</option><br>' +
                                '<option value=”one-month”>1 Months</option><br>' +
                                '<option value=”six-months”>6 Months</option><br>' +
                                '<option value=”six-months”>Custom</option></select><br>' +
                                '<label for="condition-reminder-date">Reminder date*</label>' +
                                '<input type="date" id="condition-reminder-date" name="condition-reminder-date" required><br>' +
                                '<label for="condition-status">Condition status*</label><br>' +
                                '<select><option value=”active”>Active</option>' +
                                '<option value=”inactive”>Inactive</option>/select>' +
                                '</fieldset>');

                            $('.new-input-part').on("click", ".remove-field", function (e) {
                                e.preventDefault();
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


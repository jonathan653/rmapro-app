<?php include('header.php'); ?>
<h1>Edit / View Record</h1>

        <form action="view.php" method="POST">
            <div class="wrapper">
                <div class="form-group">
                    <div class="input-section">
                        <h3>Consent Details</h3>
                        <div class="record-input-group">
                            <label for="consentNumber">Consent Number*</label>
                            <input type="text" name="consentNumber" id="consentNumber" required>
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
                            <input type="text" name="keywords" id="keywords">
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
                            <label for="jobNumber">Job Number*</label>
                            <input type="text" name="jobNumber" id="jobNumber" required>
                        </div>
                        <div class="record-input-group">
                            <label for="jobStatus">Job Status*</label>
                            <select name="jobStatus" id="jobStatus">
                                <option value=”active”>Active</option>
                                <option value=”inactive”>Inactive</option>
                            </select>
                        </div>
                        <div class="record-input-group">
                            <label for="consultantName">Consultant*</label>
                            <select name="consultantName" id="consultantName">
                                <option value=”conrad-anderson”>Conrad Anderson</option>
                                <option value=”don-anderson”>Don Anderson</option>
                            </select>
                        </div>

                        <button class="add_more_button">Add New Condition</button>

                        <div class="add-new-condition"></div>
                        <script>
                            $(document).ready(function() {
                                $('.add_more_button').click(function(e) {
                                    e.preventDefault();
                                    $('.add-new-condition').append('<fieldset class="new-input-part">' +
                                        '<legend>Consent Condition</legend>' +
                                        '<a href="#" class="remove-field">Remove</a><br>' +

                                        '<label for="conditionNumber">Condition Number*</label><br>' +
                                        '<input type="text" name="conditionNumber" id="conditionNumber" placeholder="Enter Condition Number Here" required><br>' +

                                        '<label for="details">Condition Summary / Details</label><br>' +
                                        '<input type="text" name="details" id="details" placeholder="Enter Condition Details Here" required><br>' +

                                        '<label for="conditionDate">Condition date*</label><br>' +
                                        '<input type="date" name="conditionDate" id="conditionDate" required><br>' +

                                        '<label for="reminderDate">Reminder date*</label>' +
                                        '<input type="date" name="reminderDate" id="reminderDate" required><br>' +

                                        '<label for="conditionStatus">Condition status*</label><br>' +
                                        '<select name= conditionStatus id= conditionStatus><option value=”active”>Active</option>' +
                                        '<option value=”inactive”>Inactive</option>/select>' +

                                        '</fieldset>');

                                    $('.new-input-part').on("click", ".remove-field", function(e) {
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
                <button class="centre-btn" type="submit">Update Record</button>
            </div>
        </form>
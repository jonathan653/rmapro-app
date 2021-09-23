<?php include('header.php'); ?>

<h1>Create New Record</h1>
<p id="date-time"></p>

<script>
    var results = new Date();
    $('#date-time').html(results);
</script>

<div class="wrapper">
    <div class="input-section">
        <h3>Consent Details</h3>

        <form action="index.php" method="POST" class="form-group">
            <div class="record-input-group">
                <label for="consent-number">Consent Number*</label>
                <input type="text" name="consent-number" id="consent-number" required>
            </div>
            <div class="record-input-group">
                <label for="consent-document">Attach Consent Issue Document</label>
                <input type="file" id="consent-document" name="consent-document">
            </div>
            <div class="record-input-group">
                <label for="consent-issue-date">Issue Date*</label>
                <input type="date" id="consent-issue-date" name="consent-issue-date" required>
            </div>

            <div class="record-input-group">
                <label for="consent-lapse-date">Lapse Date*</label>
                <input type="date" id="consent-lapse-date" name="consent-lapse-date" required>
            </div>

            <div class="record-input-group">
                <label for="keyword">Keywords*</label>
                <input type="text" name="keyword" id="keyword" required>
            </div>

            <div class="record-input-group">
                <input type="submit" value="Save consent">
            </div>
        </form>
    </div>

    <div class="input-section">
        <h3>Client Details</h3>

        <form action="" method="POST" class="form-group">
            <div class="record-input-group">
                <label for="client-id">Client ID*</label>
                <input type="text" name="client-id" id="client-id" required>
            </div>
            <div class="record-input-group">
                <label for="company-name">Company Name*</label>
                <input type="text" name="company-name" id="company-name" required>
            </div>
            <div class="record-input-group">
                <label for="client-first-name">Client First Name*</label>
                <input type="text" name="client-first-name" id="client-first-name" required>
            </div>
            <div class="record-input-group">
                <label for="client-surname">Client Surname*</label>
                <input type="text" name="client-surname" id="client-surname" required>
            </div>
            <div class="record-input-group">
                <label for="client-phone">Client Phone*</label>
                <input type="tel" name="client-phone" id="client-phone" required>
            </div>
            <div class="record-input-group">
                <label for="client-email">Client Email*</label>
                <input type="email" name="client-email" id="client-email" required>
            </div>

            <div class="record-input-group">
                <input type="submit" value="Save client">
            </div>
        </form>
    </div>

    <div class="input-section">
        <h3>Job Details</h3>

        <form action="" method="POST" class="form-group">
            <div class="record-input-group">
                <label for="job-number">Job Number*</label>
                <input type="text" name="job-number" id="job-number" required>
            </div>
            <div class="record-input-group">
                <label for="job-status">Job Status*</label>
                <select>
                    <option value=”active”>Active</option>
                    <option value=”inactive”>Inactive</option>
                </select>
            </div>
            <div class="record-input-group">
                <label for="consultant-name">Consultant*</label>
                <select>
                    <option value=”conrad-anderson”>Conrad Anderson</option>
                    <option value=”don-anderson”>Don Anderson</option>
                </select>
            </div>

            <button class="add_more_button">Add New Condition</button>

            <div class="add-new-condition"></div>

            <script>
                $(document).ready(function() {
                    $('.add_more_button').click(function(e){
                        e.preventDefault();
                        $('.add-new-condition').append('<fieldset class="new-input-part">' +
                            '<legend>Consent Condition</legend>' +
                            '<a href="#" class="remove-field">Remove</a><br>' +
                            '<label for="job-condition">Condition Number*</label><br>' +
                            '<input type="text" name="job-condition" id="job-condition" placeholder="Enter Condition Number Here" required>' +
                            '<label for="job-condition">Condition Summary / Details</label><br>' +
                            '<input type="text" name="job-details" id="job-details" placeholder="Enter Condition Details Here" required>' +
                            '<label for="condition-date">Condition date*</label><br>' +
                            '<select><option value=”two-weeks”>2 Weeks</option>' +
                            '<option value=”four-weeks”>4 Weeks</option><br>' +
                            '<option value=”one-month”>1 Months</option><br>' +
                            '<option value=”six-months”>6 Months</option><br>' +
                            '<option value=”six-months”>Custom</option></select><br>' +                           
                            '<label for="condition-reminder-date">Reminder date*</label>' +
                            '<input type="date" id="condition-reminder-date" name="condition-reminder-date" required>' +
                            '<label for="condition-status">Condition status*</label>' +
                            '<select><option value=”active”>Active</option>' +
                            '<option value=”inactive”>Inactive</option>/select>' +
                            '</fieldset>');

                        $('.new-input-part').on("click",".remove-field", function(e){
                            e.preventDefault();
                            $(this).parent('fieldset').remove();
                        });

                    });

                });
            </script>



            <div class="record-input-group">
                <input type="submit" value="Save Job">
            </div>

        </form>
    </div>

</div>

</body>
</html>
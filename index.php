<?php include('header.php'); ?>

    <h1>Create New Record</h1>
	<div class="wrapper">
    <div class="input-section">
        <h3>Consent Details</h3>

        <form action="index.php" method="POST" class="form-group">
            <div class="record-input-group">
                <label for="consent-number">Consent number*</label>
                <input type="text" name="consent-number" id="consent-number" required>
            </div>
            <div class="record-input-group">
                <label for="consent-document">Attach consent issue document</label>
                <input type="file" id="consent-document" name="consent-document">
            </div>
            <div class="record-input-group">
                <label for="consent-issue-date">Issue date*</label>
                <input type="date" id="consent-issue-date" name="consent-issue-date" required>
            </div>

            <div class="record-input-group">
                <label for="consent-lapse-date">Lapse date*</label>
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
                <label for="company-name">Company name*</label>
                <input type="text" name="company-name" id="company-name" required>
            </div>
            <div class="record-input-group">
                <label for="client-first-name">Client first name*</label>
                <input type="text" name="client-first-name" id="client-first-name" required>
            </div>
            <div class="record-input-group">
                <label for="client-surname">Client surname*</label>
                <input type="text" name="client-surname" id="client-surname" required>
            </div>
            <div class="record-input-group">
                <label for="client-phone">Client phone*</label>
                <input type="tel" name="client-phone" id="client-phone" required>
            </div>
            <div class="record-input-group">
                <label for="client-email">Client email*</label>
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
                <label for="job-number">Job number*</label>
                <input type="text" name="job-number" id="job-number" required>
            </div>
            <div class="record-input-group">
                <label for="job-status">Job status*</label>
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

            <div class="record-input-group">
                <label for="job-email">Job email*</label>
                <input type="email" name="job-email" id="job-email" required>
            </div>

            <button class="add_more_button">Add new condition</button>

            <div class="add-new-condition"></div>

            <script>
                $(document).ready(function() {
                    $('.add_more_button').click(function(e){
                        e.preventDefault();
                        $('.add-new-condition').append('<fieldset>' +
                            '<legend>Job condition</legend>' +
                            '<input type="text" name="job-condition" id="job-condition" placeholder="Condition number" required>' +
                            '<input type="text" name="job-details" id="job-details" placeholder="Condition summary/details" required>' +
                            '<label for="condition-date">Condition date*</label><br>' +
                            '<select><option value=”two-weeks”>2 weeks</option>' +
                            '<option value=”four-weeks”>4 weeks</option></select><br>' +
                            '<label for="condition-reminder-date">Reminder date*</label>' +
                            '<input type="date" id="condition-reminder-date" name="condition-reminder-date" required>' +
                            '<label for="condition-status">Condition status*</label>' +
                            '<select><option value=”active”>Active</option>' +
                            '<option value=”inactive”>Inactive</option>/select><br>' +
                            '<div><br></div>' + '</fieldset>'
                        );
                    });
                });
            </script>

            <div class="record-input-group">
                <input type="submit" value="Save job">
            </div>

        </form>
    </div>

</div>

</body>
</html>

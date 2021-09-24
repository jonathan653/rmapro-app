<!--Test file for uploading pdf -->

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

    </div>

</body>
</html>
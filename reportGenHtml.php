<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>Convert HTML To PDF In PHP With Dompdf</title>

</head>

<body>

    <h1>

        Pdf File Generate Report

    </h1>
    <h3>Consent Details</h3>

    <form action="index.php" method="POST" class="form-group">
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

    </form>
</body>

</html>
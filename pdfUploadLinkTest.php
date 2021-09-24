<!--PDF upload test link file code based off https://medium.com/an-idea/use-mysql-blob-column-with-php-to-store-pdf-file-13f4277b68c3 tutorial -->
<?php
    $db = mysqli_connect("localhost", "root", "", "pdfTest");

    if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }


    if (isset($_POST['submit']) && !empty($_FILES['consentDoc']['name'])) {

    //a $_FILES 'error' value of zero means success. Anything else and something wrong with attached file.
    if ($_FILES['consentDoc']['error'] != 0) {
        echo 'Something wrong with the file.';
    } else { //pdf file uploaded okay.
        //consentNumber supplied from the form field
        $consentNumber = htmlspecialchars($_POST['consentNumber']);
        $
        //attached pdf file information
        $file_name = $_FILES['consentDoc']['name'];
        $file_tmp = $_FILES['consentDoc']['tmp_name'];
            
        if ($pdf_blob = fopen($file_tmp, "rb")) {
            try {
                $insert_sql = "INSERT INTO `consent` (`consentNumber`, `issueDate`, `lapseDate`, `consentDoc`)
                VALUES(:consentNumber, : issueDate, :lapseDate :consentDoc);";
                $stmt = $pdo->prepare($insert_sql);
                $stmt->bindParam(':consentNumber', $consentNumber);
                $stmt->bindParam(':consentDoc', $pdf_blob, PDO::PARAM_LOB);
                
                if ($stmt->execute() === FALSE) {
                    echo 'Could not save information to the database';
                } else {
                    echo 'Information saved';
                }
            } catch (PDOException $e) {
                echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
                ': '. $e->getLine();
            }
        } else {
            //fopen() was not successful in opening the .pdf file for reading.
            echo 'Could not open the attached pdf file';
        }
    }
    } else {
        //submit button was not clicked. No direct script navigation.
        header('Location: choose_file.php');
    }

    //close connection
    mysqli_close($db);
?>
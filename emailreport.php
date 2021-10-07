<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// If necessary, modify the path in the require statement below to refer to the
// location of your Composer autoload.php file.
require 'vendor/autoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// Replace sender@example.com with your "From" address.
// This address must be verified with Amazon SES.
$sender = 'comp373project@gmail.com';
$senderName = 'Title Recall';

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
$recipient = 'comp373project@gmail.com';

// Replace smtp_username with your Amazon SES SMTP user name.
$usernameSmtp = 'AKIAXB3L3RVTCXOBPO5E';

// Replace smtp_password with your Amazon SES SMTP password.
$passwordSmtp = 'BFH7dMJyyM5qBB3XZJJT6YEi4PyR7SHURCknaHVRNPZV';

// Specify a configuration set. If you do not want to use a configuration
// set, comment or remove the next line.
// $configurationSet = 'ConfigSet';

// If you're using Amazon SES in a region other than US West (Oregon),
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
// endpoint in the appropriate region.
$host = 'email-smtp.ap-southeast-2.amazonaws.com';
$port = 587;

// The subject line of the email
$subject = 'Title Recall Weekly Report';

// The plain-text body of the email
$bodyText =  "Weekly Report.\r\nPlease go to http://3.105.98.133/rmapro-app/reportBackend3.php for your report.";

// The HTML-formatted body of the email
$bodyHtml = '<h1>Weekly Report</h1>
    <p>Please click <a href="http://3.105.98.133/rmapro-app/reportBackend3.php">this link</a> for your weekly report.</p>';

// //Add attachments
// $mail->addAttachment('Attachment.pdf');         

try {
    // Specify the SMTP settings.
    $mail->isSMTP();
    $mail->setFrom($sender, $senderName);
    $mail->Username   = $usernameSmtp;
    $mail->Password   = $passwordSmtp;
    $mail->Host       = $host;
    $mail->Port       = $port;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

    // Specify the message recipients.
    $mail->addAddress($recipient);
    // You can also add CC, BCC, and additional To recipients here.

    // Specify the content of the message.
    $mail->isHTML(true);
    $mail->Subject    = $subject;
    $mail->Body       = $bodyHtml;
    $mail->AltBody    = $bodyText;
    $mail->Send();
    echo "Email sent!" , PHP_EOL;
} catch (phpmailerException $e) {
    echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
} catch (Exception $e) {
    echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
}

?>

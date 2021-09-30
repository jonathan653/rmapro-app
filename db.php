//not presently in use by Monique, don't know about you guys.

<?php
$cdb = mysqli_connect(
    "127.0.0.1",
    "root",
    "jonathanandthescorpions",
    "AnC_Sep25"
);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

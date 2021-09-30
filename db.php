<?php
$con = MySQLi_connect(
    "localhost",
    "root",
    "",
    "AnC_Sep25"
);
if (MySQLi_connect_errno()) {
    echo "Failed to connect to MySQL: " . MySQLi_connect_error();
}


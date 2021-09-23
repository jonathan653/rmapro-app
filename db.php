<?php
$con = MySQLi_connect(
    "localhost",
    "root",
    "",
    "AnC_Sep22"
);
if (MySQLi_connect_errno()) {
    echo "Failed to connect to MySQL: " . MySQLi_connect_error();
}


<?php
$db= mysqli_connect("localhost","root","","database");
$name = $_GET['search'];

$sql = "SELECT * FROM users";
$result = mysqli_query($db, $sql);


if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "username: " . $row["username"]. "<br>";
    }
} else {
    echo "0 results";
}



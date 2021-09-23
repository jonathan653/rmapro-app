<?php include ('db.php');
if (isset($_POST['search'])) {
    $Name = $_POST['search'];
    $Query = "SELECT username FROM users WHERE username LIKE '%$Name%'";
    $ExecQuery = MySQLi_query($con, $Query);
    echo '
<ul>
   ';
    while ($Result = MySQLi_fetch_array($ExecQuery)) {
        ?>
        <li onclick='fill("<?php echo $Result['username']; ?>")'>
            <a href="view.php">
                <?php echo $Result['username']; ?>
        </li></a>
        <?php
    }}
?>
</ul>



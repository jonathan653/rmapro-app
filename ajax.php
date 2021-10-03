<?php include ('db.php');
if (isset($_POST['search'])) {
    $Name = $_POST['search'];
    $Query = "SELECT * FROM clients INNER JOIN property INNER JOIN job_details 
    WHERE company LIKE '%$Name%' OR address LIKE '%$Name%'
                OR jobNumber LIKE '%$Name%'";
    $ExecQuery = MySQLi_query($db, $Query);
    echo '
<ul>
   ';
    while ($Result = MySQLi_fetch_array($ExecQuery)) {
        ?>
        <li onclick='fill("")'>
            <a href="view.php">
                <?php echo "
                <table><tr><td>".$Result['jobNumber']."</td></tr>
                <tr><td>".$Result['company']."</td></tr>".
                    "<tr><td>".$Result['address']."</td></tr></table>"
                ?>
        </li></a>
        <?php
    }}
?>
</ul>


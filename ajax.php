<?php include ('db.php');

if (isset($_POST['search'])) {
    $Name = $_POST['search'];
    $Query = "SELECT * FROM consent INNER JOIN clients ON consent.clientId=clients.clientId 
WHERE keywords LIKE '%$Name%' OR address LIKE '%$Name%'
                  OR jobNumber LIKE '%$Name%' OR company LIKE '%$Name%'";
    $ExecQuery = MySQLi_query($db, $Query);
    echo '<ul>';
    while ($Result = MySQLi_fetch_array($ExecQuery)) {
        ?>
        <li onclick='fill("")'>
            <a href="view.php">
                <?php echo "<table><tr><td>".$Result['jobNumber']."</td></tr>
                 <tr><td>".$Result['company']."</td></tr>".
                    "<tr><td>".$Result['address']."</td></tr>".
                    "<tr><td>".$Result['keywords']."</td></tr></table>"?>
        </li></a>
        <?php
    }}
?>
</ul>'
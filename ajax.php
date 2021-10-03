<?php include('db.php');

if (isset($_POST['search'])) {
    $Name = $_POST['search'];
    $Query = "SELECT * FROM consent INNER JOIN clients ON consent.clientId=clients.clientId 
WHERE keywords LIKE '%$Name%' OR address LIKE '%$Name%'
                  OR jobNumber LIKE '%$Name%' OR company LIKE '%$Name%'";
    $ExecQuery = MySQLi_query($db, $Query);

    echo '<ol>';

    while ($Result = MySQLi_fetch_array($ExecQuery)) {
        ?>
        <a href="view.php">
        <li onclick='fill("")'>
                <?php echo "<table><tr><td>" .
                    $Result['jobNumber'] . "</td>
                 <td>" . $Result['company'] . "</td>" .
                    "<td>" . $Result['address'] . "</td>" .
                    "<td>" . $Result['keywords'] . "</td></tr></table>" ?>
        </li></a><br>
        <?php
    }
}
?>
</ol>'
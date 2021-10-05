<?php include('db.php');

if (isset($_POST['search'])) {
    $Name = $_POST['search'];
    $Query = "SELECT * FROM consent INNER JOIN clients ON consent.clientId=clients.clientId 
WHERE keywords LIKE '%$Name%' OR address LIKE '%$Name%'
                  OR jobNumber LIKE '%$Name%' OR company LIKE '%$Name%'";
    $ExecQuery = MySQLi_query($db, $Query);

    echo '<ul>';

    while ($Result = MySQLi_fetch_array($ExecQuery)) {
        ?>
        <!--<a href= <?php //echo "view.php?search=" .$Result['jobNumber'];  ?>>-->
        <li onclick='fill("")'>
            <?php echo "<table><tr><td>Job #</td><td>" .
                $Result['jobNumber'] . "</td>
                 </tr><tr><td>Name</td><td>" . $Result['company'] . "</td></tr>" .
                "<tr><td>Address</td><td>" . $Result['address'] . "</td></tr>" .
                "<tr><td>Keywords</td><td>" . $Result['keywords'] . "</td></tr>"
                ."</tr></table>" ?>
        </li></a><br>
        <?php
    }
}
?>
</ul>
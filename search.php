<?php include('header.php'); ?>
<h1>Search records</h1>
<form class="search-bar" action="search.php" method="GET">
    <input id="search-tab" type="text" name="search" placeholder="Enter keywords..."/>
    <input id="submit-search" type="submit" value="Search" />
</form>

<div class="output">
</div>

<?php
$db=mysqli_connect("localhost", "root", "","AnC_Sep22");
if(!$db){
    die('Could not connect MySql server:' .mysqli_error());
}
?>


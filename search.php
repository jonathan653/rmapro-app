<?php include('header.php'); ?>

<script src="jquery-3.6.0.js"></script>
<script src="script.js"></script>
<link href="style.css">

<h1>Search records</h1>
<form class="search-bar" action="search.php" method="GET">
    <input id="search" type="text" name="search" autocomplete="off" placeholder="Enter keywords..."/>
    <!--<input id="submit-search" type="submit" value="Search" />-->
</form>

<div id="display"></div>

<?php
$db=mysqli_connect("localhost", "root", "","AnC_Sep22");
if(!$db){
    die('Could not connect MySql server:' .mysqli_error());
}
?>



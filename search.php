<?php include('header.php'); 
require('db.php');
?>


<script src="jquery-3.6.0.js"></script>
<script src="script.js"></script>
<link href="style.css">

<h1>Search Records</h1>
<p class="search-title" for="search">Search for Job Number, Company / Client Name, Address or Keyword(s).</p>
<form class="search-bar" action="search.php" method="POST">
    <input id="search" type="text" name="search" autocomplete="off" placeholder="Search..."/>
    <!--<input id="submit-search" type="submit" value="Search" />-->
</form>

<div id="display"></div>

<!-- <?php
$db=mysqli_connect("localhost", "root", "","AnC_Sep22");
?> -->

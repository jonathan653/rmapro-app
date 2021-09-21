<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.6.0.js"></script>
</head>

<body>

<?php if (isset($_SESSION['success'])) : ?>
    <div class="error success" >
        <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>
    </div>
<?php endif ?>

<?php  if (isset($_SESSION['username'])) : ?>
    <p class="welcome-section">Welcome&nbsp; <strong><?php echo $_SESSION['username']; ?></strong></p>
    <p class="welcome-section"> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
<?php endif ?>

<nav class="nav-bar">
    <a href="index.php">Create new record</a> |
    <a href="search.php">Search records</a> |
    <a href="report.php">Report view</a>
</nav>

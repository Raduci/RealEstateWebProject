<?php
include('../includes/header.php');
session_start();
session_destroy();
header("Location: login.php");
?>
<?php include('../includes/footer.php'); ?>

<?php
// include database connection file
include_once("config.php");
// Get id from URL to delete that student
$ID = $_GET['ID'];
// Delete student row from table based on given ID
$result = mysqli_query($conn, "DELETE FROM teaches WHERE ID=$ID");
// After delete redirect to Home, so that latest students list will be displayed.
header ("Location:index.php") ;
?>
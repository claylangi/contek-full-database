<?php
// include database connection file
include_once("config.php");
// Get id from URL to delete that student
$course_id = $_GET['course_id'];
// Delete student row from table based on given ID
$result = mysqli_query($conn, "DELETE FROM course WHERE course_id='$course_id'");
// After delete redirect to Home, so that latest students list will be displayed.
header ("Location:index.php") ;
?>
<?php
// Create database connection using config file
include_once("config.php");
// Fetch all users data from database and student table
$result = mysqli_query($conn,"SELECT * FROM teaches");
?>

<html>
    <head>
        <title>Homepage</title>
    </head>

    <body>
        <!-- this is a link for add page -->
        <a href="add.php"> Add New teaches</a><br/><br/>
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Course ID</th></th>
                <th>Sec ID</th>
                <th>Semester</th>
                <th>Year</th>
                <th>Action</th>
            </tr>

            <?php
            while($student = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>". $student['ID']. "</td>";
                echo "<td>". $student['course_id']. "</td>";
                echo "<td>". $student['sec_id']. "</td>";
                echo "<td>". $student['semester']. "</td>";
                echo "<td>". $student['year']. "</td>";
                echo "<td><a href='edit.php?ID=$student[ID]'>Edit</a> | 
                <a href='delete.php?ID=$student[ID]'>Delete</a></td></tr>";  
            }
            ?>
        </table>
    </body>
</html>
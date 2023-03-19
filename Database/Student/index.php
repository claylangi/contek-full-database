<?php
// Create database connection using config file
include_once("config.php");
// Fetch all users data from database and student table
$result = mysqli_query($conn,"SELECT * FROM student");
?>

<html>
    <head>
        <title>Homepage</title>
    </head>

    <body>
        <!-- this is a link for add page -->
        <a href="add.php"> Add New Student</a><br/><br/>
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department Name</th>
                <th>Total Creds</th>
                <th>Action</th>
            </tr>

            <?php
            while($student = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>". $student['ID']. "</td>";
                echo "<td>". $student['name']. "</td>";
                echo "<td>". $student['dept_name']. "</td>";
                echo "<td>". $student['tot_cred']. "</td>";
                echo "<td><a href='edit.php?ID=$student[ID]'>Edit</a> | 
                <a href='delete.php?ID=$student[ID]'>Delete</a></td></tr>";  
            }
            ?>
        </table>
    </body>
</html>
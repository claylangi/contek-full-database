<?php
// Create database connection using config file
include_once("config.php");
// Fetch all users data from database and student table
$result = mysqli_query($conn,"SELECT * FROM instructor WHERE salary > (SELECT AVG(salary) FROM instructor);
");
?>

<html>
    <head>
        <title>Homepage</title>
    </head>

    <body>
        <!-- this is a link for add page -->
        <a href="add.php"> Add New Instructor</a><br/><br/>
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department Name</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>

            <?php
            while($instructor = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>". $instructor['ID']. "</td>";
                echo "<td>". $instructor['name']. "</td>";
                echo "<td>". $instructor['dept_name']. "</td>";
                echo "<td>". $instructor['salary']. "</td>";
                echo "<td><a href='edit.php?ID=$instructor[ID]'>Edit</a> | 
                <a href='delete.php?ID=$instructor[ID]'>Delete</a></td></tr>";  
            }
            ?>
        </table>
    </body>
</html>
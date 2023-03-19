<?php
// Create database connection using config file
include_once("config.php");
// Fetch all users data from database and student table
$result = mysqli_query($conn,"SELECT * FROM course");
?>

<html>
    <head>
        <title>Homepage</title>
    </head>

    <body>
        <!-- this is a link for add page -->
        <a href="add.php"> Add New Course</a><br/><br/>
        <table border=1>
            <tr>
                <th>Course ID</th>
                <th>Title</th>
                <th>Department Name</th>
                <th>Credits</th>
                <th>Action</th>
            </tr>

            <?php
            while($course = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>". $course['course_id']. "</td>";
                echo "<td>". $course['title']. "</td>";
                echo "<td>". $course['dept_name']. "</td>";
                echo "<td>". $course['credits']. "</td>";
                echo "<td><a href='edit.php?course_id=$course[course_id]'>Edit</a> | 
                <a href='delete.php?course_id=$course[course_id]'>Delete</a></td></tr>";  
            }
            ?>
        </table>
    </body>
</html>
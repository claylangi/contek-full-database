<?php
// Create database connection using config file
include_once("config.php");
// Fetch all users data from database and student table
$result = mysqli_query($conn,"SELECT title FROM course WHERE dept_name = 'Biology';
");
?>

<html>
    <head>
        <title>Homepage</title>
    </head>

    <body>
        <table border=1>
            <tr>
                <th>Title</th>
            </tr>
            <?php
            while($course = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>". $course['title']. "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
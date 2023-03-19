<?php
// Create database connection using config file
include_once("config.php");
// Fetch all users data from database and student table
$result = mysqli_query($conn,"SELECT c.title
FROM course c
INNER JOIN department d ON c.dept_name = d.dept_name
WHERE d.building IN ('Packard', 'Watson');
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
                
               
            }
            ?>
        </table>
    </body>
</html>
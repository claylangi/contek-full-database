<?php
// Check If form submitted, insert form data into student table.
if (isset($_POST['Submit'])) {
    $ID = $_POST ['ID'];
    $course_id = $_POST ['course_id'];
    $sec_id = $_POST ['sec_id'];
    $semester = $_POST ['semester'];
    $year = $_POST ['year'];
    $grade = $_POST ['grade'];

    // include database connection file
    include_once("config.php");

    // Insert student data into table
    $result = mysqli_query ($conn, "INSERT INTO takes(ID,course_id,sec_id,semester,year,grade)
    VALUES ('$ID','$course_id','$sec_id','$semester','$year','$grade')");


    // Show message when student added
    echo "Student added successfully. <a href= 'index.php'> View Student</a><br><br>";
}
?>


<html>
    <head>
        <title>Add Teaches</title>
    </head>
    <body>
        <a href="index.php">Go to Home </a>
        <br/><br/>
    
        <form action="add.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="ID"> </td>
                </tr>
                <tr>
                    <td>Course ID</td>
                    <td><input type="text" name="course_id"> </td>
                </tr>
                <tr>
                    <td>Section ID</td>
                    <td><input type="text" name="sec_id"> </td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td><input type="text" name="semester"> </td>
                </tr>
                <tr>
                    <td>Year</td>
                    <td><input type="text" name="year"> </td>
                </tr>
                <tr>
                    <td>Grade</td>
                    <td><input type="text" name="grade"> </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" Value="Add"> </td>
                </tr>
            </table>
        </form>
    </body>
</html>
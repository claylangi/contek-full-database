<?php
// Check If form submitted, insert form data into student table.
if (isset($_POST['Submit'])) {
    $course_id = $_POST ['course_id'];
    $title = $_POST ['title'];
    $dept_name = $_POST ['dept_name'];
    $credits = $_POST ['credits'];

    // include database connection file
    include_once("config.php");

    // Insert student data into table
    $result = mysqli_query ($conn, "INSERT INTO course (course_id,title,dept_name,credits)
    VALUES ('$course_id','$title','$dept_name','$credits')");

    // Show message when student added
    echo "Instructor added succesccfully. <a href= 'index.php'> View Student</a><br><br>";
}
?>

<html>
    <head>
        <title>Add Student</title>
    </head>
    <body>
        <a href="index.php">Go to Home </a>
        <br/><br/>
    
        <form action="add.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>Course ID</td>
                    <td><input type="text" name="course_id"> </td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title"> </td>
                </tr>
                <tr>
                    <td>Dept Name</td>
                    <td><input type="text" name="dept_name"> </td>
                </tr>
                <tr>
                    <td>Credits</td>
                    <td><input type="text" name="credits"> </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" Value="Add"> </td>
                </tr>
            </table>
        </form>
    </body>
</html>
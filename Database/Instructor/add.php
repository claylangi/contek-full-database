<?php
// Check If form submitted, insert form data into student table.
if (isset($_POST['Submit'])) {
    $ID = $_POST ['ID'];
    $name = $_POST ['name'];
    $dept_name = $_POST ['dept_name'];
    $salary = $_POST ['salary'];

    // include database connection file
    include_once("config.php");

    // Insert student data into table
    $result = mysqli_query ($conn, "INSERT INTO instructor (ID,name,dept_name,salary)
    VALUES ('$ID','$name','$dept_name','$salary')");

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
                    <td>ID</td>
                    <td><input type="text" name="ID"> </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"> </td>
                </tr>
                <tr>
                    <td>Dept Name</td>
                    <td><input type="text" name="dept_name"> </td>
                </tr>
                <tr>
                    <td>Salary</td>
                    <td><input type="text" name="salary"> </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" Value="Add"> </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
// include database connection file
include_once("config.php");

// check if form is submitted for user update, then redirect to homepage after update
if(isset ($_POST ['update']))
{
    $ID =$_POST['ID'];
    $course_id = $_POST['course_id'];
    $sec_id = $_POST['sec_id'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];
    $grade = $_POST['grade'];

    // update user data
    $result = mysqli_query($conn, "UPDATE takes
    SET course_id='$course_id' ,sec_id='$sec_id' ,semester='$semester',year='$year',grade='$grade' WHERE ID='$ID'");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$ID =$_GET['ID'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM takes WHERE ID='$ID'");

while($student = mysqli_fetch_array($result))
{
    $course_id = $student['course_id'];
    $sec_id = $student['sec_id'];
    $semester = $student['semester'];
    $year = $student['year'];
    $grade = $student['grade'];
}
?>

<html>
<head>
    <title> Edit Student Data </title>
</head>
<body>

    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update student" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Course ID</td>
                <td><input type="text" name="course_id" value=<?php echo $course_id;?>></td>
            </tr>
            <tr>
                <td>Section ID</td>
                <td><input type="text" name="sec_id" value=<?php echo $sec_id;?>></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td><input type="text" name="semester" value=<?php echo $semester;?>></td>
            </tr>
            <tr>
                <td>Year</td>
                <td><input type="text" name="year" value=<?php echo $year;?>></td>
            </tr>
            <tr>
                <td>Grade</td>
                <td><input type="text" name="year" value=<?php echo $grade;?>></td>
            </tr>
            <tr>
            <td><input type="hidden" name="ID" value=<?php echo $_GET['ID'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
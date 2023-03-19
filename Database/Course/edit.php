<?php
// include database connection file
include_once("config.php");

// check if form is submitted for user update, then redirect to homepage after update
if(isset ($_POST ['update']))
{
    $course_id =$_POST['course_id'];
    $title = $_POST['title'];
    $dept_name = $_POST['dept_name'];
    $credits = $_POST['credits'];

    // update user data
    $result = mysqli_query($conn, "UPDATE course
    SET title='$title' ,dept_name='$dept_name' ,credits='$credits' WHERE course_id='$course_id'");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$course_id =$_GET['course_id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM course WHERE course_id='$course_id'");

while($course = mysqli_fetch_array($result))
{
    $title = $course['title'];
    $dept_name = $course['dept_name'];
    $credits = $course['credits'];
}
?>

<html>
<head>
    <title> Edit Instructor Data </title>
</head>
<body>

    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update course" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value=<?php echo $course_id;?>></td>
            </tr>
            <tr>
                <td>Department Name</td>
                <td><input type="text" name="dept_name" value=<?php echo $dept_name;?>></td>
            </tr>
            <tr>
                <td>Credits</td>
                <td><input type="text" name="credits" value=<?php echo $credits;?>></td>
            </tr>
            <tr>
            <td><input type="hidden" name="course_id" value=<?php echo $_GET['course_id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
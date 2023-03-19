<?php
// include database connection file
include_once("config.php");

// check if form is submitted for user update, then redirect to homepage after update
if(isset ($_POST ['update']))
{
    $ID =$_POST['ID'];
    $name = $_POST['name'];
    $dept_name = $_POST['dept_name'];
    $tot_cred = $_POST['tot_cred'];

    // update user data
    $result = mysqli_query($conn, "UPDATE student
    SET name='$name' ,dept_name='$dept_name' ,tot_cred='$tot_cred' WHERE ID='$ID'");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$ID =$_GET['ID'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM student WHERE ID='$ID'");

while($student = mysqli_fetch_array($result))
{
    $name = $student['name'];
    $dept_name = $student['dept_name'];
    $tot_cred = $student['tot_cred'];
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
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr>
                <td>Department Name</td>
                <td><input type="text" name="dept_name" value=<?php echo $dept_name;?>></td>
            </tr>
            <tr>
                <td>Total Credits</td>
                <td><input type="text" name="tot_cred" value=<?php echo $tot_cred;?>></td>
            </tr>
            <tr>
            <td><input type="hidden" name="ID" value=<?php echo $_GET['ID'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
// include database connection file
include_once("config.php");

// check if form is submitted for user update, then redirect to homepage after update
if(isset ($_POST ['update']))
{
    $ID =$_POST['ID'];
    $name = $_POST['name'];
    $dept_name = $_POST['dept_name'];
    $salary = $_POST['salary'];

    // update user data
    $result = mysqli_query($conn, "UPDATE instructor
    SET name='$name' ,dept_name='$dept_name' ,salary='$salary' WHERE ID='$ID'");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$ID =$_GET['ID'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM instructor WHERE ID='$ID'");

while($instructor = mysqli_fetch_array($result))
{
    $name = $instructor['name'];
    $dept_name = $instructor['dept_name'];
    $salary = $instructor['salary'];
}
?>

<html>
<head>
    <title> Edit Instructor Data </title>
</head>
<body>

    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update instructor" method="post" action="edit.php">
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
                <td>Salary</td>
                <td><input type="text" name="salary" value=<?php echo $salary;?>></td>
            </tr>
            <tr>
            <td><input type="hidden" name="ID" value=<?php echo $_GET['ID'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
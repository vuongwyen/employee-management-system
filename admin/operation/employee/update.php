<?php
include '../../../connection/connect.php';

if (!$con) {
    die("Connection error: " . mysqli_connect_error());
}


$emp_ID = $_GET['updateemp_ID'];


$sql = "SELECT * FROM employee WHERE emp_ID = $emp_ID";
$query = mysqli_query($con, $sql);

if (!$query) {
    die("Query failed: " . mysqli_error($con));
}


$row = mysqli_fetch_assoc($query);
$fname = $row['fname'];
$lname = $row['lname'];
$gender = $row['gender'];
$age = $row['age'];
$contact_add = $row['contact_add'];
$emp_email = $row['emp_email'];
$emp_pass = $row['emp_pass'];

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact_add = $_POST['contact_add'];
    $emp_email = $_POST['emp_email'];
    $emp_pass = $_POST['emp_pass'];

    $sql = "UPDATE employee 
            SET fname = '$fname', 
                lname = '$lname', 
                gender = '$gender', 
                age = $age, 
                contact_add = $contact_add, 
                emp_email = '$emp_email', 
                emp_pass = '$emp_pass' 
            WHERE emp_ID = $emp_ID";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: ../../../admin/employee.php");
    } else {
        die("Update failed: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Update Employee</title>
</head>
<body>
    <div class="container my-5">
        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname" value="<?php echo $lname ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Gender</label>
                <select class="form-control" name="gender">
                    <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" name="age" value="<?php echo $age ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Contact Address</label>
                <input type="text" class="form-control" name="contact_add" value="<?php echo $contact_add ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="emp_email" value="<?php echo $emp_email ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="emp_pass" value="<?php echo $emp_pass ?>" required>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

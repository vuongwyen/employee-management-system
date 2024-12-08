<?php
include '../../../connection/connect.php';
if (!$con) {
    die("Connection failed: " . mysqli_error($con));
}

if (isset($_POST['submit'])) {
    $job_ID = $_POST['job_ID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact_add = $_POST['contact_add'];
    $emp_email = $_POST['emp_email'];
    $emp_pass = $_POST['emp_pass'];

    $sql = "INSERT INTO employee (fname,job_ID, lname, gender, age, contact_add, emp_email, emp_pass) 
            VALUES ('$fname','$job_ID', '$lname', '$gender', '$age', '$contact_add', '$emp_email', '$emp_pass')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "<script>alert('Employee added successfully');</script>";
        header("Location: ../../../admin/employee.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Employee</title>
</head>

<body>
    <div class="container my-5">
        <h2 class="text-right">Add New Employee</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label">Job ID</label>
                <input type="text" class="form-control" name="job_ID" placeholder="Enter Job ID" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="Enter First Name" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">Gender</label>
                <select class="form-control" name="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" name="age" placeholder="Enter Age" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">Contact Address</label>
                <input type="text" class="form-control" name="contact_add" placeholder="Enter Contact Address" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="emp_email" placeholder="Enter Email" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="emp_pass" placeholder="Enter Password" autocomplete="off" required>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Add Employee</button>
        </form>
    </div>
</body>

</html>
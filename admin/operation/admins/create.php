<?php
include '../../../connection/connect.php'; // Đảm bảo đường dẫn đúng

if (!$con) {
    die(mysqli_error($con));
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact_add = $_POST['contact_add'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];

    $sql = "INSERT INTO users (fname, lname, gender, age, contact_add, admin_email, admin_pass) 
            VALUES ('$fname', '$lname', '$gender', '$age', '$contact_add', '$admin_email', '$admin_pass')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('User added successfully');</script>";
        header("Location:../../../admin/admins.php");
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h3>Add User</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select class="form-control" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" name="age" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contact Address</label>
                <input type="text" class="form-control" name="contact_add" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="admin_email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="admin_pass" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

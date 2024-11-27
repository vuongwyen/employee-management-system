<?php
include '../../../connection/connect.php';
$admin_ID = $_GET['updateadmin_ID'];
$sql = "SELECT * FROM users WHERE admin_ID = $admin_ID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$fname = $row['fname'];
$lname = $row['lname'];
$gender = $row['gender'];
$age = $row['age'];
$contact_add = $row['contact_add'];
$admin_email = $row['admin_email'];

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact_add = $_POST['contact_add'];
    $admin_email = $_POST['admin_email'];

    $sql = "UPDATE users
            SET fname = '$fname', lname = '$lname', gender = '$gender', 
                age = '$age', contact_add = '$contact_add', admin_email = '$admin_email' 
            WHERE admin_ID = $admin_ID";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('User updated successfully');</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Update Employee</title>
</head>
<body>
    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select class="form-control" name="gender" required>
                    <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" name="age" value="<?php echo $age; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contact Address</label>
                <input type="text" class="form-control" name="contact_add" value="<?php echo $contact_add; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="admin_email" value="<?php echo $admin_email; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

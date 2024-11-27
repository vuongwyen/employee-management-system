<?php
include '../../../connection/connect.php';

$qual_ID = $_GET['updatequal_ID'];
$sql = "SELECT * FROM qualification WHERE qual_ID = $qual_ID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$emp_ID = $row['emp_ID'];
$position = $row['position'];
$requirements = $row['requirements'];
$date_in = $row['date_in'];

if (isset($_POST['submit'])) {
    $emp_ID = mysqli_real_escape_string($con, $_POST['emp_ID']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $requirements = mysqli_real_escape_string($con, $_POST['requirements']);
    $date_in = mysqli_real_escape_string($con, $_POST['date_in']);

    $sql = "UPDATE qualification 
            SET emp_ID = '$emp_ID', position = '$position', 
                requirements = '$requirements', date_in = '$date_in' 
            WHERE qual_ID = $qual_ID";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Qualification updated successfully');</script>";
        header("Location: ../../../qualification.php");
        exit();
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
    <title>Update Payroll</title>
</head>
<body>
    <div class="container my-5">
        <h3>Update Qualification</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Employee ID</label>
                <input type="text" class="form-control" name="emp_ID" value="<?php echo $emp_ID; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Position</label>
                <input type="text" class="form-control" name="position" value="<?php echo $position; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Requirements</label>
                <textarea class="form-control" name="requirements" required><?php echo $requirements; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Date In</label>
                <input type="date" class="form-control" name="date_in" value="<?php echo $date_in; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

<?php
include '../../../connection/connect.php';
if (!$con) {
    die(mysqli_error($con));
}

if (isset($_POST['submit'])) {
    $emp_ID = mysqli_real_escape_string($con, $_POST['emp_ID']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $requirements = mysqli_real_escape_string($con, $_POST['requirements']);
    $date_in = mysqli_real_escape_string($con, $_POST['date_in']);

    $sql = "INSERT INTO qualification (emp_ID, position, requirements, date_in) 
            VALUES ('$emp_ID', '$position', '$requirements', '$date_in')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Qualification added successfully');</script>";
        header("Location: ../../../admin/qualification.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Payroll</title>
</head>
<body>
    <div class="container my-5">
        <h3>Add Qualification</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Employee ID</label>
                <input type="text" class="form-control" name="emp_ID" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Position</label>
                <input type="text" class="form-control" name="position" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Requirements</label>
                <textarea class="form-control" name="requirements" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Date In</label>
                <input type="date" class="form-control" name="date_in" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

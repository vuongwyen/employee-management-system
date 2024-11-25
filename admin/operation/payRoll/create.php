<?php
include '../../../connection/connect.php';
if (!$con) {
    die(mysqli_error($con));
}

if (isset($_POST['submit'])) {
    $emp_ID = $_POST['emp_ID'];
    $job_ID = $_POST['job_ID'];
    $salary_ID = $_POST['salary_ID'];
    $leave_ID = $_POST['leave_ID'];
    $date = $_POST['date'];
    $report = $_POST['report'];
    $total_amount = $_POST['total_amount'];

    $sql = "INSERT INTO payroll (emp_ID, job_ID, salary_ID, leave_ID, date, report, total_amount) 
            VALUES ('$emp_ID', '$job_ID', '$salary_ID', '$leave_ID', '$date', '$report', '$total_amount')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Payroll added successfully');</script>";
        header("Location: ../../../admin/payRoll.php");
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
        <h3>Add Payroll</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Employee ID</label>
                <input type="text" class="form-control" name="emp_ID" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Job ID</label>
                <input type="text" class="form-control" name="job_ID" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Salary ID</label>
                <input type="text" class="form-control" name="salary_ID" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Leave ID</label>
                <input type="text" class="form-control" name="leave_ID">
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="date" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Report</label>
                <textarea class="form-control" name="report"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Amount</label>
                <input type="number" class="form-control" name="total_amount" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

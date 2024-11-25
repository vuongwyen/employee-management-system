<?php
include '../../../connection/connect.php';

if (!$con) {
    die("Connection error: " . mysqli_connect_error());
}

$payroll_ID = $_GET['updatepayroll_ID'];
$sql = "SELECT * FROM payroll WHERE payroll_ID = $payroll_ID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$emp_ID = $row['emp_ID'];
$job_ID = $row['job_ID'];
$salary_ID = $row['salary_ID'];
$leave_ID = $row['leave_ID'];
$date = $row['date'];
$report = $row['report'];
$total_amount = $row['total_amount'];

if (isset($_POST['submit'])) {
    $emp_ID = $_POST['emp_ID'];
    $job_ID = $_POST['job_ID'];
    $salary_ID = $_POST['salary_ID'];
    $leave_ID = $_POST['leave_ID'];
    $date = $_POST['date'];
    $report = $_POST['report'];
    $total_amount = $_POST['total_amount'];

    $sql = "UPDATE payroll 
            SET emp_ID='$emp_ID', job_ID='$job_ID', salary_ID='$salary_ID', 
                leave_ID='$leave_ID', date='$date', report='$report', total_amount='$total_amount' 
            WHERE payroll_ID = $payroll_ID";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Payroll updated successfully');</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Update Payroll</title>
</head>
<body>
    <div class="container my-5">
        <h3>Update Payroll</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Employee ID</label>
                <input type="text" class="form-control" name="emp_ID" value="<?php echo $emp_ID; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Job ID</label>
                <input type="text" class="form-control" name="job_ID" value="<?php echo $job_ID; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Salary ID</label>
                <input type="text" class="form-control" name="salary_ID" value="<?php echo $salary_ID; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Leave ID</label>
                <input type="text" class="form-control" name="leave_ID" value="<?php echo $leave_ID; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="date" value="<?php echo $date; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Report</label>
                <textarea class="form-control" name="report"><?php echo $report; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Amount</label>
                <input type="number" class="form-control" name="total_amount" value="<?php echo $total_amount; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

<?php
include '../../../connection/connect.php';

if (!$con) {
    die("Connection error: " . mysqli_connect_error());
}


$salary_ID = $_GET['updatesalary_ID'];


$sql = "SELECT * FROM salary_bonus WHERE salary_ID = $salary_ID";
$query = mysqli_query($con, $sql);

if (!$query) {
    die("Query failed: " . mysqli_error($con));
}


$row = mysqli_fetch_assoc($query);
$job_ID = $row['job_ID'];
$amount = $row['amount'];
$annual = $row['annual'];
$bonus = $row['bonus'];

if (isset($_POST['submit'])) {
    $job_ID = $_POST['job_ID'];
    $amount = $_POST['amount'];
    $annual = $_POST['annual'];
    $bonus = $_POST['bonus'];

    $sql = "UPDATE salary_bonus 
            SET job_ID = '$job_ID', 
                amount = '$amount', 
                annual = '$annual', 
                bonus = '$bonus'
            WHERE salary_ID = $salary_ID";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: ../../../admin/salaryBonus.php");
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
        <form method="POST" >
            <div class="mb-3">
                <label class="form-label">Job ID</label>
                <input type="text" class="form-control" name="job_ID" value="<?php echo $job_ID; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="text" class="form-control" name="amount" value="<?php echo $amount; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Annual</label>
                <input type="date" class="form-control" name="annual" value="<?php echo $annual; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Bonus</label>
                <input type="date" class="form-control" name="bonus" value="<?php echo $bonus; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

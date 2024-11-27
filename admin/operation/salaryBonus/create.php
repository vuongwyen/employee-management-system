<?php
include '../../../connection/connect.php';
if (!$con) {
    die("Connection failed: " . mysqli_error($con));
}

if (isset($_POST['submit'])) {
    $job_ID = $_POST['job_ID'];
    $amount = $_POST['amount'];
    $annual = $_POST['annual'];
    $bonus = $_POST['bonus'];

    $sql = "INSERT INTO salary_bonus (job_ID, amount, annual, bonus) 
            VALUES ('$job_ID', '$amount', '$annual', '$bonus')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "<script>alert('salaryBonus added successfully');</script>";
        header("Location: ../../../admin/salaryBonus.php");
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
        <h2 class="text-right">Add new salary bonus</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label">Job ID</label>
                <input type="text" class="form-control" name="job_ID" placeholder="Enter job ID" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">Amount</label>
                <input type="text" class="form-control" name="amount" placeholder="Enter amount" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Annual</label>
                <input type="date" class="form-control" name="annual" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Bonus</label>
                <input type="date" class="form-control" name="bonus" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Employee</button>
        </form>
    </div>
</body>
</html>

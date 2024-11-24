<?php
include '../../../connection/connect.php';

if (!$con) {
    die("Connection error: " . mysqli_connect_error());
}


$job_ID = $_GET['updatejob_ID'];


$sql = "SELECT * FROM job_department WHERE job_ID = $job_ID";
$query = mysqli_query($con, $sql);

if (!$query) {
    die("Query failed: " . mysqli_error($con));
}


$row = mysqli_fetch_assoc($query);
$job_dept = $row['job_dept'];
$name = $row['name'];
$description = $row['description'];
$salary_range = $row['salary_range'];

if (isset($_POST['submit'])) {
    $job_dept = $_POST['job_dept'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $salary_range = $_POST['salary_range'];

    $sql = "UPDATE job_department 
            SET job_dept = '$job_dept', name = '$name', description = '$description', salary_range = '$salary_range' 
            WHERE job_ID = $job_ID";
    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: ../../../admin/jobDepartment.php");
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
        <h2 class="text-center">Update Job Department</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label">Job Department</label>
                <input type="text" class="form-control" name="job_dept" value="<?php echo $job_dept ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3" required><?php echo $description ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Salary Range</label>
                <input type="text" class="form-control" name="salary_range" value="<?php echo $salary_range ?>" required>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Update Job Department</button>
        </form>
    </div>
</body>
</html>

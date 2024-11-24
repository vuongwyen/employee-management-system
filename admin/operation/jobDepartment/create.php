<?php
include '../../../connection/connect.php';
if (!$con) {
    die("Connection failed: " . mysqli_error($con));
}

if (isset($_POST['submit'])) {
    $job_ID = $_POST['job_ID'];
    $job_dept = $_POST['job_dept'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $salary_range = $_POST['salary_range'];

    $sql = "INSERT INTO job_department (job_ID, job_dept, name, description, salary_range) 
            VALUES ('$job_ID', '$job_dept', '$name', '$description', '$salary_range')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "<script>alert('Job Department added successfully');</script>";
        header("Location: ../../../admin/jobDepartment.php");
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
    <title>Add Job Department</title>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-right">Add New Job Department</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label">Job Department</label>
                <input type="text" class="form-control" name="job_dept" placeholder="Enter Job Department" required>
            </div>
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Enter Description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Salary Range</label>
                <input type="text" class="form-control" name="salary_range" placeholder="Enter Salary Range" required>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Add Job Department</button>
        </form>
    </div>
</body>
</html>

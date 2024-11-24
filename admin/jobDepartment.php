<?php
@include '../connection/connect.php';
$select = "SELECT * FROM job_department";
if (isset($_POST['search'])) {
    $search_keyword = mysqli_real_escape_string($con, $_POST['search_keyword']);
    $select .= " WHERE job_dept LIKE '%$search_keyword%'";
}
$result = mysqli_query($con, $select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- Main content -->
        <div class="main p-3">
            <div class="text-center">
                <h1>
                    Job Department
                </h1>
            </div>
            <form method="post">
                <div class="row mb-3">
                    <div class="col-sm">
                        <input type="text" name="search_keyword" class="form-control" placeholder="Search by FullName" value="<?php echo isset($search_keyword) ? $search_keyword : ''; ?>">
                    </div>
                    <div class="col-sm">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            <button class="btn btn-primary">
                <a href="operation/jobDepartment/create.php" class="text-light">Add job department</a>
            </button>
            <table class="table table-inverse">
            <thead>
                <tr>
                    <th>Job ID</th>
                    <th>Job Dept</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Salary Range</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $job_ID = $row['job_ID'];
                        $job_dept = $row['job_dept'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $salary_range = $row['salary_range'];
                        
                        echo '<tr>
                            <td>'.$job_ID.' </td>
                            <td>'.$job_dept.' </td>
                            <td>'.$name.' </td>
                            <td>'.$description.' </td>
                            <td>'.$salary_range.' </td>
                            <td>
                                <button class="btn btn-success"><a href="operation/jobDepartment/update.php?updatejob_ID='.$job_ID.'" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="operation/jobDepartment/delete.php?deletejob_ID='.$job_ID.'" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>
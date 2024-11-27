<?php
@include '../connection/connect.php';
$select = "SELECT * FROM salary_bonus";
if (isset($_POST['search'])) {
    $search_keyword = mysqli_real_escape_string($con, $_POST['search_keyword']);
    $select .= " WHERE amount LIKE '%$search_keyword%'";
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
            <div class="text-center mb-5">
                <h1>
                    Salary bonus
                </h1>
            </div>
            <form method="post">
                <div class="row mb-3">
                    <div class="col-sm">
                        <input type="text" name="search_keyword" class="form-control" placeholder="Search by amount" value="<?php echo isset($search_keyword) ? $search_keyword : ''; ?>">
                    </div>
                    <div class="col-sm">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            <button class="btn btn-primary">
                <a href="operation/salaryBonus/create.php" class="text-light">Add salary bonus</a>
            </button>
            <table class="table table-inverse">
            <thead>
                <tr>
                    <th>Salary ID</th>
                    <th>Job ID</th>
                    <th>Amount</th>
                    <th>Annual</th>
                    <th>Bonus</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $salary_ID = $row['salary_ID'];
                        $job_ID = $row['job_ID'];
                        $amount = $row['amount'];
                        $annual = $row['annual'];
                        $bonus = $row['bonus'];
                        echo '<tr>
                            <td>'.$salary_ID.' </td>
                            <td>'.$job_ID.' </td>
                            <td>'.$amount.' </td>
                            <td>'.$annual.' </td>
                            <td>'.$bonus.' </td>
                            <td>
                                <button class="btn btn-success"><a href="operation/salaryBonus/update.php?updatesalary_ID='.$salary_ID.'" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="operation/salaryBonus/delete.php?deletesalary_ID='.$salary_ID.'" class="text-light">Delete</a></button>
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
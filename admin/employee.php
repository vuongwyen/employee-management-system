<?php
@include '../connection/connect.php';
$select = "SELECT * FROM employee";
if (isset($_POST['search'])) {
    $search_keyword = mysqli_real_escape_string($con, $_POST['search_keyword']);
    $select .= " WHERE lname LIKE '%$search_keyword%'";
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
                    Employee
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
                <a href="operation/employee/create.php" class="text-light">Add employee</a>
            </button>
            <table class="table table-inverse">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Contact Address</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $emp_ID = $row['emp_ID'];
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            $gender = $row['gender'];
                            $age = $row['age'];
                            $contact_add = $row['contact_add'];
                            $emp_email = $row['emp_email'];
                            $emp_pass = $row['emp_pass'];
                            echo '<tr>
                                <td>' . $emp_ID . ' </td>
                                <td>' . $fname . ' </td>
                                <td>' . $lname . ' </td>
                                <td>' . $gender . ' </td>
                                <td>' . $age . ' </td>
                                <td>' . $contact_add . ' </td>
                                <td>' . $emp_email . ' </td>
                                <td>' . $emp_pass . ' </td>
                                <td>
                                    <button class="btn btn-success"><a href="operation/employee/update.php?updateemp_ID=' . $emp_ID . '" class="text-light">Update</a></button>
                                    <button class="btn btn-danger"><a href="operation/employee/delete.php?deleteemp_ID=' . $emp_ID . '" class="text-light">Delete</a></button>
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
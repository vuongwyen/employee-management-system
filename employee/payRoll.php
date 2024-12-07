<?php
@include '../connection/connect.php';
session_start();
$emp_ID = $_SESSION['emp_ID'];
$sql = "SELECT emp_ID, first_name, last_name, position, total_salary, bonus_amount, bonus_date FROM vemployeedetails WHERE emp_ID = '$emp_ID'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $position = $row['position'];
        $total_salary = $row['total_salary'];
        $bonus_amount = $row['bonus_amount'];
        $bonus_date = $row['bonus_date'];
    }
} else {
    echo "No data";
}
$con->close();

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
                    Pay Roll
                </h1>
            </div>
            <table class="table table-inverse">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Position</th>
                        <th>Total salary</th>
                        <th>Bonus amount</th>
                        <th>Bonus date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $emp_ID ?></td>
                        <td><?php echo $first_name ?></td>
                        <td><?php echo $last_name ?></td>
                        <td><?php echo $position ?></td>
                        <td><?php echo $total_salary ?></td>
                        <td><?php echo $bonus_amount ?></td>
                        <td><?php echo $bonus_date ?></td>
                    </tr>
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
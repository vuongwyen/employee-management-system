<?php
@include '../connection/connect.php';
session_start();
$emp_ID = $_SESSION['emp_ID'];
$select = "SELECT * FROM employee where emp_ID = '$emp_ID'";
$result = mysqli_query($con, $select);
if($row = mysqli_fetch_assoc($result)){
    $emp_ID = $row['emp_ID'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $gender = $row['gender'];
    $age = $row['age'];
    $contact_add = $row['contact_add'];
    $emp_email = $row['emp_email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee dashboard</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                    Hello <?php echo htmlspecialchars($fname) . ' ' . htmlspecialchars($lname); ?>!
                </h1>
            </div>
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
                </tr>
            </thead>
            <tbody>
                <td><?php echo $emp_ID ?></td>
                <td><?php echo $fname ?></td>
                <td><?php echo $lname ?></td>
                <td><?php echo $gender ?></td>
                <td><?php echo $age ?></td>
                <td><?php echo $contact_add ?></td>
                <td><?php echo $emp_email ?></td>
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
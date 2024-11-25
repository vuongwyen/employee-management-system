<?php
@include '../connection/connect.php';
session_start();
$emp_ID = $_SESSION['emp_ID'];
$select = "SELECT * FROM vemployeedetails where emp_ID = '$emp_ID'";
$result = mysqli_query($con, $select);
if($row = mysqli_fetch_assoc($result)){
    $emp_ID = $row['emp_ID'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $gender = $row['gender'];
    $age = $row['age'];
    $contact_address = $row['contact_address'];
    $email = $row['email'];
    $position = $row['position'];
    $requirements = $row['requirements'];
    $qualification_date = $row['qualification_date'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style/style.css">
    
    
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- Main content -->
        <div class="main p-3">
        <div class="container my-5">
        <!-- Profile Section -->
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="https://eurekapuzzles.com/cdn/shop/files/57431.png?v=1712509014" class="rounded-circle mb-3 avatar-employee" alt="Profile Picture" style="max-width: 100px; height: 100px; margin: 0px; width: 100px;">
                <h4><?php echo htmlspecialchars($first_name) . " " . htmlspecialchars($last_name); ?></h4>
                <p class="text-muted"><?php echo $position ?></p>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Personal Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong> First Name</strong>
                        <p> <?php echo $first_name ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Last Name:</strong>
                        <p> <?php echo $last_name ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Email Address</strong>
                        <p> <?php echo $email ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Phone</strong>
                        <p> <?php echo $contact_address ?></p>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Address -->
        <div class="card">
            <div class="card-header">
                <h5>Profession</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Position</strong>
                        <p><?php echo $position ?> </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Experience</strong>
                        <p><?php  echo $requirements ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Qualification date </strong>
                        <p> <?php echo $qualification_date ?></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>
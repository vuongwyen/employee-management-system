<?php
    include "../connection/connect.php";
    $sql= "SELECT COUNT(*) AS total_employee FROM employee";
    $result = $con->query($sql);
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- Main content -->
        <div class="main p-3">
            <div class="text-center">
                <h1>
                    Hello admin!
                </h1>
                <div class="square-box">
                    <div class="icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="info">
                        Tổng nhân viên <br>
                        <?php
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo $row['total_employee'];
                            } else {
                                echo "Không tìm thấy dữ liệu.";
                            }
                        ?>
                    </div>
                </div>

            <!-- phòng ban -->
            <div class="job-container">              
                <div class="big-square">
                    <h2 class="title-box">JOB DEPARTMENT</h2>
                    <!-- Bên trái -->
                    <div class="column">
                        <div class="small-square">Human Resources</div>
                        <div class="small-square">Information Technology</div>
                        <div class="small-square">Sales Department</div>
                        <div class="small-square">Marketing Team</div>
                        <div class="small-square">Finance Team</div>
                        
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
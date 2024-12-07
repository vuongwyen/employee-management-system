<?php
include '../connection/connect.php';
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$totalEmployeesQuery = "SELECT COUNT(*) AS total FROM employee";
$totalEmployeesResult = $con->query($totalEmployeesQuery);
$totalEmployees = $totalEmployeesResult->fetch_assoc()['total'];

$totalDepartmentsQuery = "SELECT COUNT(*) AS total FROM job_department";
$totalDepartmentsResult = $con->query($totalDepartmentsQuery);
$totalDepartments = $totalDepartmentsResult->fetch_assoc()['total'];

$totalSalariesQuery = "SELECT SUM(total_amount) AS total FROM payroll";
$totalSalariesResult = $con->query($totalSalariesQuery);
$totalSalaries = $totalSalariesResult->fetch_assoc()['total'];

$deptSalaryQuery = "
    SELECT jd.job_dept AS department, SUM(p.total_amount) AS total_salary
    FROM payroll p
    JOIN job_department jd ON p.job_ID = jd.job_ID
    GROUP BY jd.job_dept
";
$deptSalaryResult = $con->query($deptSalaryQuery);

$departments = [];
$departmentSalaries = [];

if ($deptSalaryResult && $deptSalaryResult->num_rows > 0) {
    while ($row = $deptSalaryResult->fetch_assoc()) {
        $departments[] = $row['department'];
        $departmentSalaries[] = $row['total_salary'];
    }
}

$topSalaryQuery = "
    SELECT e.fname, e.lname, p.total_amount
    FROM payroll p
    JOIN employee e ON p.emp_ID = e.emp_ID
    ORDER BY p.total_amount DESC
    LIMIT 5
";
$topSalaryResult = $con->query($topSalaryQuery);

$employeeNames = [];
$employeeSalaries = [];

if ($topSalaryResult && $topSalaryResult->num_rows > 0) {
    while ($row = $topSalaryResult->fetch_assoc()) {
        $employeeNames[] = $row['fname'] . ' ' . $row['lname'];
        $employeeSalaries[] = $row['total_amount'];
    }
}
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
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="style/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- Main content -->
        <div class="main container my-4 bg-white">
            <h1 class="text-center">Admin Dashboard</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total number of employees</h5>
                            <p class="card-text display-4" id="totalEmployees"><?php echo $totalEmployees; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">General Department</h5>
                            <p class="card-text display-4" id="totalDepartments"><?php echo $totalDepartments; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total monthly salary</h5>
                            <p class="card-text display-4" id="totalSalaries"><?php echo $totalSalaries; ?>$</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <h4>Notifications</h4>
                        <ul class="list-group">
                            <li class="list-group-item">New hire: John Doe joined the IT department.</li>
                            <li class="list-group-item">Annual performance review starts next week.</li>
                            <li class="list-group-item">Company retreat scheduled for December 15th.</li>
                            <li class="list-group-item">Submit your monthly reports by the end of this week.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="container mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Total salary by department</h3>
                        <canvas id="deptSalaryChart" width="600" height="300"></canvas>
                    </div>
                    <div class="col-md-6">
                        <h3>Top 5 employees with the highest salary</h3>
                        <canvas id="topSalaryChart" width="600" height="300"></canvas>
                    </div>
                </div>
            </div>


            <script>
                console.log("Labels for departments:", <?php echo json_encode($departments); ?>);
                console.log("Salaries for departments:", <?php echo json_encode($departmentSalaries); ?>);
                console.log("Top employee names:", <?php echo json_encode($employeeNames); ?>);
                console.log("Top employee salaries:", <?php echo json_encode($employeeSalaries); ?>);

                const deptLabels = <?php echo json_encode($departments); ?>;
                const deptData = <?php echo json_encode($departmentSalaries); ?>;

                const ctx1 = document.getElementById('deptSalaryChart').getContext('2d');
                if (deptLabels.length > 0 && deptData.length > 0) {
                    new Chart(ctx1, {
                        type: 'bar',
                        data: {
                            labels: deptLabels,
                            datasets: [{
                                label: 'Total salary by department',
                                data: deptData,
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: false,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                } else {
                    console.error("No data available for department salary chart.");
                }

                const topLabels = <?php echo json_encode($employeeNames); ?>;
                const topData = <?php echo json_encode($employeeSalaries); ?>;

                const ctx2 = document.getElementById('topSalaryChart').getContext('2d');
                if (topLabels.length > 0 && topData.length > 0) {
                    new Chart(ctx2, {
                        type: 'pie',
                        data: {
                            labels: topLabels,
                            datasets: [{
                                label: 'Salary',
                                data: topData,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.5)',
                                    'rgba(54, 162, 235, 0.5)',
                                    'rgba(255, 206, 86, 0.5)',
                                    'rgba(75, 192, 192, 0.5)',
                                    'rgba(153, 102, 255, 0.5)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: false,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                } else {
                    console.error("No data available for top salary chart.");
                }
            </script>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">List of employees</div>
                        <div class="card-body">
                            <table id="employeeTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $employeesQuery = "
                            SELECT e.fname, e.lname, e.emp_email, q.position
                            FROM employee e
                            LEFT JOIN qualification q ON e.emp_ID = q.emp_ID";
                                    $employeesResult = $con->query($employeesQuery);

                                    // Kiểm tra và hiển thị dữ liệu
                                    if ($employeesResult && $employeesResult->num_rows > 0) {
                                        while ($row = $employeesResult->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['lname']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['emp_email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['position'] ?? 'Intern') . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No staff</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <h4>Employee Growth Over Time</h4>
                        <canvas id="employeeGrowthChart" width="500" height="250"></canvas>
                    </div>
                </div>
            </div>
            <script>
                const employeeGrowthLabels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                const employeeGrowthData = [5, 7, 9, 11, 15, 18, 20, 22, 25, 28, 30, 35];

                const ctxGrowth = document.getElementById('employeeGrowthChart').getContext('2d');
                new Chart(ctxGrowth, {
                    type: 'line',
                    data: {
                        labels: employeeGrowthLabels,
                        datasets: [{
                            label: 'Number of Employees',
                            data: employeeGrowthData,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true
                            },
                            tooltip: {
                                enabled: true
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Months'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Number of Employees'
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
    <script src="script/script.js"></script>
</body>

</html>
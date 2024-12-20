<?php
@include '../connection/connect.php';

// Truy vấn cơ bản
$select = "SELECT * FROM payroll";

// Xử lý tìm kiếm theo từ khóa và khoảng thời gian
if (isset($_POST['search'])) {
    $search_keyword = mysqli_real_escape_string($con, $_POST['search_keyword']);
    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);

    $conditions = [];

    // Thêm điều kiện tìm kiếm theo từ khóa
    if (!empty($search_keyword)) {
        $conditions[] = "date LIKE '%$search_keyword%'";
    }

    // Thêm điều kiện tìm kiếm theo khoảng thời gian
    if (!empty($start_date) && !empty($end_date)) {
        $conditions[] = "date BETWEEN '$start_date' AND '$end_date'";
    }

    // Gộp các điều kiện lại thành câu lệnh WHERE
    if (!empty($conditions)) {
        $select .= " WHERE " . implode(' AND ', $conditions);
    }
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
                    Payroll
                </h1>
            </div>
            <form method="post" class="me-auto right" style="max-width: 400px;">
                <div class="mb-3">
                    <div class="col-12 mb-2">
                        <input type="text" name="search_keyword" class="form-control" placeholder="Search by Date"
                            value="<?php echo isset($search_keyword) ? $search_keyword : ''; ?>">
                    </div>
                    <div class="col-12 mb-2">
                        <input type="date" name="start_date" class="form-control"
                            value="<?php echo isset($start_date) ? $start_date : ''; ?>">
                    </div>
                    <div class="col-12 mb-2">
                        <input type="date" name="end_date" class="form-control"
                            value="<?php echo isset($end_date) ? $end_date : ''; ?>">
                    </div>
                    <div class="col-12 mb-2">
                        <button type="submit" name="search" class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </form>
            <button class="btn btn-primary">
                <a href="operation/payRoll/create.php" class="text-light">Add payroll</a>
            </button>
            <table class="table table-inverse">
            <thead>
                <tr>
                    <th>Payrool ID</th>
                    <th>Employee ID</th>
                    <th>Job ID</th>
                    <th>Salary ID</th>
                    <th>Leave ID</th>
                    <th>Date</th>
                    <th>Report</th>
                    <th>Total Amount</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $payroll_ID = $row['payroll_ID'];
                        $emp_ID = $row['emp_ID'];
                        $job_ID = $row['job_ID'];
                        $salary_ID = $row['salary_ID'];
                        $leave_ID = $row['leave_ID'];
                        $date = $row['date'];
                        $report = $row['report'];
                        $total_amount = $row['total_amount'];
                        echo '<tr>
                            <td>'.$payroll_ID.' </td>
                            <td>'.$emp_ID.' </td>
                            <td>'.$job_ID.' </td>
                            <td>'.$salary_ID.' </td>
                            <td>'.$leave_ID.' </td>
                            <td>'.$date.' </td>
                            <td>'.$report.' </td>
                            <td>'.$total_amount.' </td>
                            <td>
                                <button class="btn btn-success"><a href="operation/payRoll/update.php?updatepayroll_ID='.$payroll_ID.'" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="operation/payRoll/delete.php?deletepayroll_ID='.$payroll_ID.'" class="text-light">Delete</a></button>
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
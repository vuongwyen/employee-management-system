<?php
include('connection/connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $user_type = $_POST['user_type']; // 'employee' hoặc 'admin'

    // Kiểm tra email có tồn tại
    if ($user_type == 'admin') {
        $sql = "SELECT * FROM users WHERE admin_email = ?";
    } else {
        $sql = "SELECT * FROM employee WHERE emp_email = ?";
    }
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Tạo token và lưu vào bảng password_resets
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $sql = "INSERT INTO password_resets (email, token, expiry, user_type) 
                VALUES (?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE token = ?, expiry = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssss", $email, $token, $expiry, $user_type, $token, $expiry);
        $stmt->execute();

        // Gửi link reset mật khẩu
        $reset_link = "http://localhost/employee-management-system/reset_password.php?token=$token&user_type=$user_type";
        echo "<div class='alert alert-success mt-4' role='alert'>
                <h4 class='alert-heading'>Yêu cầu đặt lại mật khẩu đã được gửi!</h4>
                <p>Vui lòng nhấn vào link bên dưới để đặt lại mật khẩu:</p>
                <hr>
                <a href='$reset_link' class='btn btn-primary' target='_blank'>Đặt lại mật khẩu</a>
            </div>";
    } else {
        echo "<script>
        alert('Email không tồn tại.');
        window.location.href = 'forgot_password.php'; // Redirect lại trang nếu cần
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>

<body>
    <div class="form position-absolute top-50 start-50 translate-middle">
        <h1>Forgot password</h1>
        <br>
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="email">Enter your email</label>
            </div>
            <div class="form-outline mb-4">
                <input type="email" name="email" id="" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="user_type">Chọn loại tài khoản:</label>
                <select name="user_type" class="form-select" required>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
            </div>
            <input type="submit" value="Send request" class="btn btn-primary btn-block mb-4">
        </form>
    </div>
</body>

</html>
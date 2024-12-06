<?php
include('connection/connect.php');

if (isset($_GET['token']) && isset($_GET['user_type'])) {
    $token = $_GET['token'];
    $user_type = $_GET['user_type'];

    // Kiểm tra token
    $sql = "SELECT * FROM password_resets WHERE token = ? AND user_type = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $token, $user_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // Xử lý khi người dùng gửi mật khẩu mới
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_password = md5($_POST['password']);
            $confirm_password = md5($_POST['confirm_password']);

            if ($new_password === $confirm_password) {
                // Cập nhật mật khẩu trong bảng tương ứng
                if ($user_type == 'admin') {
                    $sql = "UPDATE users SET admin_pass = ? WHERE admin_email = ?";
                } else {
                    $sql = "UPDATE employee SET emp_pass = ? WHERE emp_email = ?";
                }
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ss", $new_password, $email);
                $stmt->execute();

                // Xóa token sau khi đặt lại mật khẩu thành công
                $sql = "DELETE FROM password_resets WHERE email = ? AND user_type = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ss", $email, $user_type);
                $stmt->execute();

                echo "<div class='alert alert-success'>Mật khẩu của bạn đã được đặt lại thành công! <a href='index.php'>Đăng nhập ngay</a></div>";
            } else {
                echo "<div class='alert alert-danger'>Mật khẩu xác nhận không khớp. Vui lòng thử lại.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Token không hợp lệ hoặc đã hết hạn. <a href='forgot_password.php'>Gửi lại yêu cầu</a></div>";
        exit; // Ngừng hiển thị form nếu token không hợp lệ
    }
} else {
    echo "<div class='alert alert-danger'>Yêu cầu không hợp lệ.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Reset Password</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Đặt lại mật khẩu</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu mới</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
        </form>
    </div>
</body>

</html>
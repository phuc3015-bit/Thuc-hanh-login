<?php
require 'db.php';
session_start();
$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$user]);
    $user_data = $stmt->fetch();

    if ($user_data && password_verify($pass, $user_data['password'])) {
        $_SESSION['user'] = $user_data['username'];
        header("Location: welcome.php"); // Chuyển hướng khi thành công
        exit();
    } else {
        $msg = "<div class='msg error'>Đăng nhập thất bại!</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <h2>Đăng Nhập</h2>
        <?php echo $msg; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit" class="btn-login">Đăng Nhập</button>
        </form>
        <p style="text-align:center">Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
    </div>
</body>
</html>
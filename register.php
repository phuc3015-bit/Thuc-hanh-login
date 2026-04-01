<?php
require 'db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Yêu cầu Hashing

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$user, $pass]);
        $msg = "<div class='msg success'>Đăng ký thành công! <a href='login.php'>Đăng nhập</a></div>";
    } catch (Exception $e) {
        $msg = "<div class='msg error'>Tên đăng nhập đã tồn tại!</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <h2>Đăng Ký</h2>
        <?php echo $msg; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit" class="btn-reg">Tạo tài khoản</button>
        </form>
    </div>
</body>
</html>
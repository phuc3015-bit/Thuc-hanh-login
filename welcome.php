<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <h2>Chào mừng, <?php echo $_SESSION['user']; ?>!</h2>
        <p style="text-align:center">Bạn đã đăng nhập thành công.</p>
        <a href="logout.php"><button class="btn-login" style="background:gray">Đăng xuất</button></a>
    </div>
</body>
</html>
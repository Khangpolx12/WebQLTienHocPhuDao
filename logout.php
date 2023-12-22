<?php
// Gỡ bỏ các giá trị của tên tài khoản và mật khẩu và đăng xuất đưa đến trang login.
ob_start();
session_start();
unset($_SESSION['rainbow_name']);
unset($_SESSION['rainbow_uid']);
unset($_SESSION['rainbow_username']);
echo '<script type="text/javascript">window.location="login.php"; </script>';


?>
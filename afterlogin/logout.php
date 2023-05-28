<?php

	session_start();
	unset($_SESSION['user_login']);
    $_SESSION['user_logout'] = 'ออกจากระบบเรียบร้อย';
    header("location:../beforelogin/home.php");
?>
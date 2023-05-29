<?php

	session_start();
	unset($_SESSION['staff_login']);
    header("location:index.php");
?>
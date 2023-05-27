<?php

	session_start();
	require_once '../db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logrestyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;300&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <title>Login ArHereLee</title>
</head>
<body>
<form name="inpfrm" method="post" action="login_to.php">
    <?php if(isset($_SESSION['error'])) { ?>
    <div class="alert alert-danger"  role="alert">
            <?php
                echo $_SESSION['error'];
                unset ($_SESSION['error']);
            ?>
    </div>
    <?php  } ?>
    <?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success"  role="alert">
            <?php
                echo $_SESSION['success'];
                unset ($_SESSION['success']);
            ?>
    </div>
    <?php  } ?>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-- ใส่รูป -->
                    <img src="chef.png" alt="">
                    <div class="text">
                        <p>Welcome To Food AR HERE LEE</p>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <header>Login Account</header>
                        <div class="input-field">
                            <input name="email" type="email" class="input" required>
                            <label for="username">Email</label>
                        </div>
                        <div class="input-field">
                            <input name="password" type="password" class="input" id="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <input name="signin" type="submit" class="submit" Value="Sign In">
                        </div>
                        <div class="signin">
                            <span>Already haven't an account?<a href="register.php"> Register Here</a></span>
                        </div>
                        <div class="back-tomain">
                            <a href="home.php"><span>Back to Home Page</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
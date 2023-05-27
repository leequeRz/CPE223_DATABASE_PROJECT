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
                            <input type="text" class="input" id="username" required>
                            <label for="username">Email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" Value="Sign In">
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
</body>
</html>
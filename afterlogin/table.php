<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require ('condb.php');
//query
$query = "SELECT * FROM seat_reserve ORDER BY reserve_id ASC";
$result = mysqli_query($condb, $query);
// $row = mysqli_fetch_array($result);
    session_start();
	require_once '../db.php';
    if(!isset($_SESSION['user_login'])){
        header('location:../beforelogin/home.php');
        // echo 'ไม่มีข้อมูล';
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Table</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">  

    <link rel="stylesheet" href="/database_project/beforelogin/style.css">
</head>

<body>
    <section id="header">
        <a href="afterlogin.php" class="headerlogo">ARHERELEE</a>
            
        <div>
            <ul id="navbar">
                <li><a href="afterlogin.php">HOME</a></li>
                <li><a href="afshop.php">SHOP</a></li>
                <li><a class="active" href="table.php">TABLE</a></li>
                <!-- <li><a href="blog.php">BLOG</a></li> -->
                <li><a href="logout.php">LOGOUT</a></li>
                <li><a href="accountsetting2.php?edit=<?php echo $_SESSION['user_login']; ?>">ACCOUNT SETTING</a></li>
                <li id="lg-bag"><a href="afcart.php"><i class='bx bx-shopping-bag'></i></a></li>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class='bx bx-shopping-bag'></i></a>
            <i id="bar" class="fas fa-outdent"></i>
                
        </div>
    </section>

    <section id="page-table">
    </section>

    <!-- <section id="title" class="section-p3">
        <h2>TABLES</h2>
    </section> -->

    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-md-2"></div>
            <div class="col-12 col-sm-11 col-md-7" style="text-align: center;">
                <br>
                <h3 align="center" style="color: red;">รายการโต๊ะทั้งหมดของร้าน</h3>
                <h2 align="center" style="color: red;"><b>ARHERELEE</b></h2>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="alert alert-warning h2" role="alert">
                            <center>Tables</center>
                        </div>
                        <hr>
                        <div class="row" style="margin-bottom: 20px;margin-left: 50px",>
                            <?php foreach ($result as $row) {
                                if ($row['table_status'] == 0) { //ว่าง
                                    // $_SESSION['table_name']=$row['table_name'];
                                    echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                                    
                                    echo '<a href="booking.php?id=' . $row["reserve_id"] . '&act=booking "class="btn btn-success" target="_blank">' . $row['table_name'] . '</a></div>';
                                    
                                } else { //ถูกจอง
                                    // $_SESSION['table_name']=$row['table_name'];
                                    echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                                    echo '<a href="#" class="btn btn-secondary disabled" target="_blank">' . $row['table_name'] . '</a></div>';
                                    
                                }
                            } ?>
                        </div>
                        <p>*เขียว = ว่าง, เทา = ไม่ว่าง</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</body>

</html>
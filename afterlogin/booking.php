<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'condb.php';
//query
$query = "SELECT * FROM seat_reserve sr,seat_type st WHERE sr.reserve_id=$_GET[id] AND sr.seat_type_id=st.seat_type_id";
$result = mysqli_query($condb, $query);
$row = mysqli_fetch_array($result);
//print_r($row);
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
    <title>แสดงข้อมูลโต๊ะเพื่อทำการจอง</title>
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
            <ul id="navbar-after">
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

    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-md-2"></div>
            <div class="col-12 col-sm-11 col-md-7" style="margin-top: 50px;">
                <br>
                <h2 align="center" style="color: red;">บันทึกข้อมูล</h2>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <center>
                                <font color="red"> <p class="h4"> บันทึกการเลือกโต๊ะ *ลูกค้าสามารถกดจองโต๊ะตามขนาดที่เลือกไว้ได้เลย* </p>
                                </font>
                            </center>
                        </div>
                        <hr>
                        <div style="margin-left: 20px;">


                        <!--  save_booking.php  -->
                            <form action="save_booking.php" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-2 ">เลขโต๊ะ</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="table_name" class="form-control" disabled
                                            value="<?php echo $row['table_name']; ?>">
                                            <?php $_SESSION['table_name'] = $row['table_name'];?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 ">ขนาดโต๊ะ</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="sizetable" class="form-control" disabled
                                            value="<?php echo $row['sizetable']; ?>">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label class="col-sm-2 ">ผู้จอง</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="booking_name" class="form-control" required
                                            placeholder="ชื่อผู้จอง" minlength="5">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                    <label class="col-sm-2 ">วันที่</label>
                                    <div class="col-sm-5">
                                        <input type="date" name="booking_date" class="form-control" required
                                            value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>"
                                            max="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <label class="col-sm-1 ">เวลา</label>
                                    <div class="col-sm-3">
                                        <input type="time" name="booking_time" class="form-control" required
                                            placeholder="เวลา">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                    <label class="col-sm-2 ">เบอร์โทร</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="booking_phone" class="form-control" required
                                            placeholder="เบอร์โทร" minlength="10" maxlength="10">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="col-sm-2 ">จำนวนที่นั่ง</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="booking_staff" class="form-control" disabled
                                            value="<?php echo $row['sizevalue']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 "></label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="table_id" value="<?php echo $_GET['id']; ?>">
                                        <button type="submit" class="btn btn-success">บันทึกการจอง</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</body>

</html>
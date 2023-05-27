<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop</title>
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

        <link rel="stylesheet" href="/database_project/beforelogin/style.css">
    </head>

    <body>
        <section id="header">
            <a href="afterlogin.php" class="headerlogo">ARHERELEE</a>
            
            <div>
                <ul id="navbar-after">
                    <li><a href="afterlogin.php">HOME</a></li>
                    <li><a class="active" href="afshop.php">SHOP</a></li>
                    <li><a href="table.php">TABLE</a></li>
                    <!-- <li><a href="blog.php">BLOG</a></li> -->
                    <li><a href="/beforelogin/index.php">LOGOUT</a></li>
                    <li><a href="accountsetting.php">ACCOUNT SETTING</a></li>
                    <li id="lg-bag"><a href="cart.php"><i class='bx bx-shopping-bag'></i></a></li>
                    <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.php"><i class='bx bx-shopping-bag'></i></a>
                <i id="bar" class="fas fa-outdent"></i>
                
            </div>
        </section>

        <section id="prodetails" class="section-p1">
            <div class="single-pro-image">
                <img src="/database_project/img/products/ข้าวผัดปู.jpg" width="100%" height="500px" id="MainImg" alt="">
                <!-- <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="/database_project/img/products/f1.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="/database_project/img/products/f2.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="/database_project/img/products/f3.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="/database_project/img/products/f4.jpg" width="100%" class="small-img" alt="">
                    </div>
                </div> -->
            </div>

            <div class="single-pro-details">
                <h7>Thai Food</h7>
                <h4>ข้าวผัดปู</h4>
                <h2>80 บาท</h2>
                <!-- <select>
                    <option>select size</option>
                    <option>XL</option>
                    <option>XXL</option>
                    <option>Small</option>
                    <option>Large</option>
                </select> -->
                <input type="number" value="1">
                <button class="normal">ADD TO CART</button>
                <h4>Product detail</h4>
                <span>ข้าวผัดปูหอมกลิ่นคั่วกระทะ หอมหวนเย้ายวนไม่ลองไม่ได้ล้าวว</span>
            </div>
        </section>

        <section id="product1" class="section-p1">
            <h2>Featured Food</h2>
            <p>เมนู Recomment ของทางร้าน</p>
            <div class="pro-container">
                <div class="pro" onclick="window.location.href='afsproduct5.php';">
                    <img src="/database_project/img/products/ซาลาเปาหมูสับไข่เค็ม.jpg" alt="">
                    <div class="des">
                        <span>Chinese Food</span>
                        <h5>ซาลาเปาหมูสับไข่เค็ม</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>30 บาท</h4>
                    </div>
                    <a href="afsproduct5.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='afsproduct3.php';">
                    <img src="/database_project/img/products/ขนมจีบกุ้ง.jpg" alt="">
                    <div class="des">
                        <span>Chinese Food</span>
                        <h5>ขนมจีบกุ้ง</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>25 บาท</h4>
                    </div>
                    <a href="afsproduct3.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='afsproduct.php';">
                    <img src="/database_project/img/products/burger.jpg" alt="">
                    <div class="des">
                        <span>Fast Food</span>
                        <h5>Burger คำโตๆ</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>79 บาท</h4>
                    </div>
                    <a href="/afterlogin/afsproduct.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='afsproduct8.php';">
                    <img src="/database_project/img/products/ผัดไทยทะเล.jpeg" alt="">
                    <div class="des">
                        <span>Thai Food</span>
                        <h5>ผัดไททะเล</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>70 บาท</h4>
                    </div>
                    <a href="/afterlogin/afsproduct8.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
            </div>
        </section>
        
        <script src="/beforelogin/script.js"></script>
        <script src="https://kit.fontawesome.com/10876e5229.js" crossorigin="anonymous"></script>
    </body>

</html>
<?php

	session_start();
	require_once '../db.php';
    if(!isset($_SESSION['user_login'])){
        // header('location: index.php');
        echo 'ไม่มีข้อมูล';
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome To ArHereLee</title>
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <link rel="stylesheet" href="/database_project/beforelogin/style.css">
    </head>

    <body>
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
        <section id="header">
            <a href="afterlogin.php" class="headerlogo">ARHERELEE</a>
            
            <div>
                <ul id="navbar-after">
                    <li><a class="active" href="afterlogin.php">HOME</a></li>
                    <li><a href="afshop.php">SHOP</a></li>
                    <!-- <li><a href="blog.php">BLOG</a></li> -->
                    <li><a href="table.php">TABLE</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                    <li><a href="accountsetting.php">ACCOUNT SETTING</a></li>
                    <li id="lg-bag"><a href="afcart.php"><i class='bx bx-shopping-bag'></i></a></li>
                    <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.php"><i class='bx bx-shopping-bag'></i></a>
                <i id="bar" class="fas fa-outdent"></i>
                
            </div>
        </section>

        <!-- <section id="hero">
            <h4>ยินดีต้อนรับสู่ร้านของเรา</h4>
            <h2>AR-HERE-LEE</h2>
            <h1>เรามีเมนูที่หลากหลาย</h1>
            <p>เอนจอยค้าบโผม</p>
            <a href="afshop.php"><button>Order Now</button></a>
        </section> -->

        <section id="hero-banner">
            <div class="slider">
                <div class="slide active">
                    <img src="/database_project/img/banner/banner1.png" alt="">
                    <div class="info">
                        <div class="info2">
                            <h2>Welcome to ARHERELEE</h2>
                            <p>เราเป็นหนึ่งทางด้านอาหารและมีเมนูที่หลากหลาย</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <img src="/database_project/img/banner/banner2.png"
                        alt="">
                    <div class="info">
                        <div class="info2">
                            <h2>เราคัดเลือกอาหารทุกส่วนอย่างมีคุณภาพ</h2>
                            <p>เพราะเราคำนึงถึงลูกค้าในทุกการกินเพื่อให้ได้รับประสบการณ์ที่ดีที่สุด</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <img src="/database_project/img/banner/banner3.png" alt="">
                    <!-- <div class="info">
                        <div class="info2">
                            <h2>ORDER NOW</h2>
                            <p>อร่อยสุดซึ้งหนึ่งคำขึ้นสมอง คำที่สองขึ้นสวรรค์ :)</p>
                        </div>
                    </div> -->
                </div>
    
                <div class="navigation">
                    <i class="fas fa-chevron-left prev-btn"></i>
                    <i class="fas fa-chevron-right next-btn"></i>
                </div>
                <div class="navigation-visibility">
                    <div class="slide-icon active"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                </div>
            </div>
        </section>

        
        <section id="feature-head" class="section-p1">
            <div class="boxtext-feature">
                <div class="textfeature">
                    <h2>Features :)</h2>
                </div>
            </div>
        </section>

        <section id="feature" class="section-p1">
            <div class="fe-box">
                <img src="/database_project/img/features/free shipping.png" alt="">
                <h6>Online Shop</h6>
            </div>
            <div class="fe-box">
                <img src="/database_project/img/features/fresh food.png" alt="">
                <h6>Free Shipping</h6>
            </div>
            <div class="fe-box">
                <img src="/database_project/img/features/online seat.png" alt="">
                <h6>Fresh Food</h6>
            </div>
            <div class="fe-box">
                <img src="/database_project/img/features/online-shop.png" alt="">
                <h6>Seat Online</h6>
            </div>
            <div class="fe-box">
                <img src="/database_project/img/features/food inter.png" alt="">
                <h6>All Food Nationality</h6>
            </div>
        </section>

        <section id="feature-head" class="section-p1">
            <div class="boxtext-product">
                <div class="textproduct">
                    <h2>Wanna try this?</h2>
                    <p>เมนู Recomment ของทางร้าน</p>
                </div>
            </div>
        </section>

        <section id="product1" class="section-p1">
            <div class="pro-container">
                <div class="pro" onclick="window.location.href='afsproduct.php';">
                    <img src="/database_project/img/products/burger.jpg" alt="">
                    <div class="des">
                        <span>Fast food</span>
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
                <div class="pro" onclick="window.location.href='afsproduct10.php';">
                    <img src="/database_project/img/products/เป็ดปักกิ่งง.jpg" alt="">
                    <div class="des">
                        <span>Chinese Food</span>
                        <h5>เป็ดปักกื่งแสนอร่อย</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>109 บาท</h4>
                    </div>
                    <a href="/afterlogin/afsproduct10.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='afsproduct2.php';">
                    <img src="/database_project/img/products/กะเพราหมูกรอบ.jpg" alt="">
                    <div class="des">
                        <span>Thai Food</span>
                        <h5>กระเพราหมูกรอบ</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>70 บาท</h4>
                    </div>
                    <a href="/afterlogin/afsproduct2.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='afsproduct6.php';">
                    <img src="/database_project/img/products/ต้มยำกุ้ง.jpg" alt="">
                    <div class="des">
                        <span>Thai Food</span>
                        <h5>ต้มยำกุ้ง</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>80 บาท</h4>
                    </div>
                    <a href="/afterlogin/afsproduct6.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='afsproduct9.php';">
                    <img src="/database_project/img/products/ส้มตำไทย.jpg" alt="">
                    <div class="des">
                        <span>Thai Food</span>
                        <h5>ส้มตำไทย</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>50 บาท</h4>
                    </div>
                    <a href="/afterlogin/afsproduct9.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='afsproduct7.php';">
                    <img src="/database_project/img/products/บัวลอยไข่หวาน.jpg" alt="">
                    <div class="des">
                        <span>Dessert</span>
                        <h5>บัวลอยไข่หวาน</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>40 บาท</h4>
                    </div>
                    <a href="/afterlogin/afsproduct7.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='afsproduct11.php';">
                    <img src="/database_project/img/products/แกงส้มกุ้ง.jpeg" alt="">
                    <div class="des">
                        <span>Thai Food</span>
                        <h5>แกงส้มกุ้ง</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>60 บาท</h4>
                    </div>
                    <a href="/afterlogin/afsproduct11.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
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
                    <a href="/afterlogin/afsproduct5.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
            </div>
        </section>

        <script src="script.js"></script>
        <script src="https://kit.fontawesome.com/10876e5229.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            const slider = document.querySelector(".slider");
            const nextBtn = document.querySelector(".next-btn");
            const prevBtn = document.querySelector(".prev-btn");
            const slides = document.querySelectorAll(".slide");
            const slideIcons = document.querySelectorAll(".slide-icon");
            const numberOfSlides = slides.length;
            var slideNumber = 0;

            //image slider next button
            nextBtn.addEventListener("click", () => {
                slides.forEach((slide) => {
                    slide.classList.remove("active");
                });
                slideIcons.forEach((slideIcon) => {
                    slideIcon.classList.remove("active");
                });

                slideNumber++;

                if (slideNumber > (numberOfSlides - 1)) {
                    slideNumber = 0;
                }

                slides[slideNumber].classList.add("active");
                slideIcons[slideNumber].classList.add("active");
            });

            //image slider previous button
            prevBtn.addEventListener("click", () => {
                slides.forEach((slide) => {
                    slide.classList.remove("active");
                });
                slideIcons.forEach((slideIcon) => {
                    slideIcon.classList.remove("active");
                });

                slideNumber--;

                if (slideNumber < 0) {
                    slideNumber = numberOfSlides - 1;
                }

                slides[slideNumber].classList.add("active");
                slideIcons[slideNumber].classList.add("active");
            });

            //image slider autoplay
            var playSlider;

            var repeater = () => {
                playSlider = setInterval(function () {
                    slides.forEach((slide) => {
                        slide.classList.remove("active");
                    });
                    slideIcons.forEach((slideIcon) => {
                        slideIcon.classList.remove("active");
                    });

                    slideNumber++;

                    if (slideNumber > (numberOfSlides - 1)) {
                        slideNumber = 0;
                    }

                    slides[slideNumber].classList.add("active");
                    slideIcons[slideNumber].classList.add("active");
                }, 4000);
            }
            repeater();

            //stop the image slider autoplay on mouseover
            slider.addEventListener("mouseover", () => {
                clearInterval(playSlider);
            });

            //start the image slider autoplay again on mouseout
            slider.addEventListener("mouseout", () => {
                repeater();
            });
        </script>
    </body>

</html>
<?php

	session_start();
	require_once 'condb.php';
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
            <h2>MENU ARHERELEE</h2>
            <div class="pro-container">
            <?php 
                    $select_product = mysqli_query($condb, "SELECT * FROM product") or die('query failed');
                    if(mysqli_num_rows($select_product) > 0){
                        while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <form method="post" class="box" action="afcart.php">
                        <div class="pro">
                        <img src="../products/<?php echo $fetch_product['image']; ?>">
                        <div class="des">
                        <?php  
                        $category_id = $fetch_product['category_id']; 
                        $select_category = mysqli_query($condb, "SELECT * FROM category WHERE category_id = '$category_id'");
                        $row = mysqli_fetch_assoc($select_category);
                        { ?>  
                        
 
                            <span><?php echo $row['category_name']; ?> </span>
                        <?php } ?> 
                            <h5><?php echo $fetch_product['product_name']; ?></h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4><?php echo $fetch_product['price']; ?></h4>
                            <input type="number" min="1" name="product_quantity" value="1">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                        </div>
                        <!-- <a href="afcart.php"><i class='bx bx-cart cartbuy'></i></a> -->
                    </div>
                    </form>
                <?php
                    };
                };
            ?>

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
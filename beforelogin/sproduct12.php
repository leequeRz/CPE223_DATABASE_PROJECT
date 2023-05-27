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

        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <section id="header">
            <a href="index.php" class="headerlogo">ARHERELEE</a>
            
            <div>
                <ul id="navbar">
                    <li><a href="index.php">HOME</a></li>
                    <li><a class="active" href="shop.php">SHOP</a></li>
                    <!-- <li><a href="blog.php">BLOG</a></li> -->
                    <li><a href="login.php">LOGIN NOW</a></li>
                    <li id="lg-bag"><a href="/cart.php"><i class='bx bx-shopping-bag'></i></a></li>
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
                <img src="/project_database/img/products/โกโก้ปั่น.jpg" width="100%"  height="500px" id="MainImg" alt="">
                <!-- <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="/project_database/img/products/f1.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="/project_database/img/products/f2.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="/project_database/img/products/f3.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="/project_database/img/products/f4.jpg" width="100%" class="small-img" alt="">
                    </div>
                </div> -->
            </div>

            <div class="single-pro-details">
                <h7>Drink</h7>
                <h4>โกโก้ปั่น</h4>
                <h2>30 บาท</h2>
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
                <span>โกโก้ปั่นสูตรเด็ดอร่อยสุดซึ้ง ปอเต๊กตึ้งยืนรอ</span>
            </div>
        </section>

        <section id="product1" class="section-p1">
            <h2>Featured Food</h2>
            <p>เมนู Recomment ของทางร้าน</p>
            <div class="pro-container">
                <div class="pro" onclick="window.location.href='sproduct14.php';">
                    <img src="/project_database/img/products/pepsi 550ml.jpg" alt="">
                    <div class="des">
                        <span>Drink</span>
                        <h5>เป๊ปซี่</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>20 บาท</h4>
                    </div>
                    <a href="sproduct14.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='sproduct15.php';">
                    <img src="/project_database/img/products/sprite.jpg" alt="">
                    <div class="des">
                        <span>Drink</span>
                        <h5>สไปร์ท</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>20 บาท</h4>
                    </div>
                    <a href="sproduct15.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='sproduct13.php';">
                    <img src="/project_database/img/products/โกโก้เย็น.jpg" alt="">
                    <div class="des">
                        <span>Drink</span>
                        <h5>โกโก้เย็น</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>25 บาท</h4>
                    </div>
                    <a href="sproduct13.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
                <div class="pro" onclick="window.location.href='sproduct16.php';">
                    <img src="/project_database/img/products/น้ำแร่.jpg" alt="">
                    <div class="des">
                        <span>Drink</span>
                        <h5>น้ำแร่</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15 บาท</h4>
                    </div>
                    <a href="sproduct16.php"><i class='bx bx-cart cartbuy'></i></a>
                </div>
            </div>
        </section>

        <script>
            var MainImg = document.getElementById("MainImg");
            var smallimg = document.getElementsByClassName("small-img");

            smallimg[0].onclick = function(){
                MainImg.src = smallimg[0].src;
            }
            smallimg[1].onclick = function(){
                MainImg.src = smallimg[1].src;
            }
            smallimg[2].onclick = function(){
                MainImg.src = smallimg[2].src;
            }
            smallimg[3].onclick = function(){
                MainImg.src = smallimg[3].src;
            }
        </script>
        
        <script src="script.js"></script>
        <script src="https://kit.fontawesome.com/10876e5229.js" crossorigin="anonymous"></script>
    </body>

</html>
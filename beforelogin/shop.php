<?php

	session_start();
	require_once 'condb.php';

?>

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
            <a href="home.php" class="headerlogo">ARHERELEE</a>
            
            <div>
                <ul id="navbar">
                    <li><a href="home.php">HOME</a></li>
                    <li><a class="active" href="shop.php">SHOP</a></li>
                    <!-- <li><a href="blog.php">BLOG</a></li> -->
                    <li><a href="login.php">LOGIN NOW</a></li>
                    <!-- <li id="lg-bag"><a href="cart.php"><i class='bx bx-shopping-bag'></i></a></li> -->
                    <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.php"><i class='bx bx-shopping-bag'></i></a>
                <i id="bar" class="fas fa-outdent"></i>
                
            </div>
        </section>

        <section id="page-header">
            
            <!-- <h2>NEW USER GET CODE FOR DISCOUNT 10%</h2><br>
            <h2>"NEWUSER10"</h2> -->
            
        </section>

        <!-- <section id="feature-head" class="section-p1">
                <div class="boxtext-product">
                    <div class="textproduct">
                        <h2>Menu ARHERELEE :)</h2>
                    </div>
                </div>
        </section> -->

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
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        </div>
                        <!-- <a href="afcart.php"><i class='bx bx-cart cartbuy'></i></a> -->
                    </div>
                    </form>
                <?php
                    };
                };
            ?>

        <!-- <section id="pagination" class="section-p1">
            <a href="/database_project/beforelogin/shop.php">1</a>
            <a href="/database_project/beforelogin/shop2.php">2</a>
            <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
        </section> -->
        
        <script src="/beforelogin/script.js"></script>
        <script src="https://kit.fontawesome.com/10876e5229.js" crossorigin="anonymous"></script>
    </body>

</html>
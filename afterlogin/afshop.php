<?php

	session_start();
	require_once 'condb.php';
    if(!isset($_SESSION['user_login'])){
        // header('location: index.php');
        echo 'ไม่มีข้อมูล';
    }

    if(isset($_POST['add_to_cart'])){
        
        $user_id=$_SESSION['user_login'];
        $product_id = $_POST['product_id'];
        $product_quantity = $_POST['product_quantity'];
     
        $select_cart = mysqli_query($condb, "SELECT * FROM `cart` WHERE product_id = '$product_id' AND user_id = '$user_id'") or die('query failed');
     
        if(mysqli_num_rows($select_cart) > 0){
           $message[] = 'product already added to cart!';
        }else{
           mysqli_query($condb, "INSERT INTO `cart`(product_id, user_id, quantity) VALUES('$product_id', '$user_id', '$product_quantity')") or die('query failed');
           $message[] = 'product added to cart!';
        }
     
     };

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

        <link rel="stylesheet" href="/database_project/beforelogin/style.css">
        <link rel="stylesheet" href="afcart_afshop.css">
    </head>

    <body>
        <section id="header">
            <a href="afterlogin.html" class="headerlogo">ARHERELEE</a>
            
            <div>
                <ul id="navbar-after">
                    <li><a href="afterlogin.php">HOME</a></li>
                    <li><a class="active" href="afshop.php">SHOP</a></li>
                    <li><a href="table.php">TABLE</a></li>
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

        <section id="page-header">
            
            <!-- <h2>AR-HERE-LEE</h2>
            
            <p>เอนจอยค้าบโผม</p> -->
            
        </section>

        <section id="product1" class="section-p1">
            <h2>MENU ARHERELEE</h2>
            <div class="pro-container">
            <?php 
                    $select_product = mysqli_query($condb, "SELECT * FROM product") or die('query failed');
                    if(mysqli_num_rows($select_product) > 0){
                        while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <form method="post" class="box" action="">
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
                            <h4><?php echo $fetch_product['price']; ?> บาท</h4>
                            <input type="number" min="1" name="product_quantity" value="1">
                            <input type="hidden" name="product_id" value="<?php echo $fetch_product['product_id']; ?>">
                            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                        </div>
                        <!-- <a href="afcart.php"><i class='bx bx-cart cartbuy'></i></a> -->
                    </div>
                    </form>
                <?php
                    };
                };
            ?>

        </section>

        <!-- <section id="pagination" class="section-p1">
            <a href="/database_project/afterlogin/afshop.php">1</a>
            <a href="/database_project/afterlogin/afshop2.php">2</a>
            <a href="/database_project/afterlogin/afshop2.php"><i class="fa-solid fa-arrow-right"></i></a>
        </section> -->
        
        <script src="/beforelogin/script.js"></script>
        <script src="https://kit.fontawesome.com/10876e5229.js" crossorigin="anonymous"></script>
    </body>

</html>
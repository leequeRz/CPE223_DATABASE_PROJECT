<?php

    session_start();
    require_once '../config/db.php';

    if(!isset($_SESSION['staff_login'])){
        // header('location: index.php');
        echo 'ไม่มีข้อมูล';
    }

    $id = $_GET['edit'];

    if(isset($_POST['update_product'])) {

        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];
        $product_price = $_POST['product_price'];
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        $product_image_folder = '../img/'.$product_image;

        $update = "UPDATE product SET product_name='$product_name', category_id='$product_category', price='$product_price', image='$product_image' WHERE product_id = $id";

        $result = mysqli_query($conn, $update);

        if($result) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            header("Loacation: edit_product.php");
        }
        else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>

    <!-- CSS style -->
    <link rel="stylesheet" href="../css/style.css">
        
    <!-- Material icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
</head>
<body>
    <div class="container">
        <!----------------- Sidebar ----------------->
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../img/main-logo.png">
                    <h2>ARHERELEE</h2>
                </div>

                <div class="close" id="close-bin">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <div class="sidebar">
                <a href="home.php">
                    <i class="ri-dashboard-fill"></i>
                    <h3>Dashboard</h3>
                </a>
                <a href="customer.php">
                    <i class="ri-user-3-line"></i>
                    <h3>Customers</h3>
                </a>
                <a href="staff.php">
                    <i class="ri-team-line"></i>
                    <h3>Staff</h3>
                </a>
                <a href="order.php">
                    <i class="ri-file-list-3-line"></i>
                    <h3>Orders</h3>
                </a>
                <a href="product.php">
                    <i class="ri-survey-line"></i>
                    <h3>Products</h3>
                </a>
                <a href="promotion.php">
                    <i class="ri-coupon-3-line"></i>
                    <h3>Promotions</h3>
                </a>
                <a href="seat.php">
                    <span class="material-symbols-outlined">chair</span>
                    <h3>Seat</h3>
                </a>
                <a href="edit_staff.php?edit=<?php echo $_SESSION['staff_login']; ?>">
                    <i class="ri-settings-5-fill"></i>
                    <h3>Setting</h3>
                </a>
                <a href="add_product.php">
                    <i class="ri-add-line"></i>
                    <h3>Add Product</h3>
                </a>
                <a href="add_promotion.php">
                    <i class="ri-add-line"></i>
                    <h3>Add Promotion</h3>
                </a>
                <a href="logout.php">
                    <i class="ri-logout-box-r-line"></i>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        
        <!----------------- Main content ----------------->
        <main>
            <!-- Open Form button -->
            <!-- <div>
                <button class="open-button" onclick="openForm()">Add Product</button>
            </div> -->
            
            <!-- <div class="form-popup" id="myForm"> -->

                    <?php

                        $select = mysqli_query($conn, "SELECT * FROM product WHERE product_id = $id");
                        
                        while($row = mysqli_fetch_assoc($select)){

                    ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="form-container">

                    <h1>Update Product</h1>
                    <br>

                    <label for="name"><h2>Product Name</h2></label>
                    <input type="text" placeholder="<?php echo $row['product_name']; ?>" value="<?php $row['product_name']; ?>" name="product_name" required>
                    <div>
                        <h2>Category</h2>
                        <label class="selectdiv" name="product_category">
                            <select id="product_category" name="product_category" required>
                                <?php
                                $categoryOptions = array(
                                    "CG001" => "Fast food",
                                    "CG002" => "Thai food",
                                    "CG003" => "Chinese food",
                                    "CG004" => "Dessert",
                                    "CG005" => "Drink"
                                );

                                foreach ($categoryOptions as $value => $label) {
                                    $selected = ($row['category_id'] === $value) ? "selected" : "";
                                    echo '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
                                }
                                ?>
                            </select>
                        </label>

                    </div> 
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    
                    <label for="price"><h2>Price</h2></label>
                    <input type="number" placeholder="<?php echo $row['price']; ?>" value="<?php $row['price']; ?>" name="product_price" required>
                    
                    <br>
                    
                    <label for="image"><h2>Image</h2></label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" value="<?php $row['image']; ?>" name="product_image" required>

                    <br>
                    
                    <?php
                        $imagePath = '../img/' . $row['image'];
                        if (!empty($row['image']) && file_exists($imagePath)) {
                            echo '<img src="' . $imagePath . '">';
                        }
                    ?>

                    <br>
                    <br>

                    <a href="product.php"><button type="submit" class="btn" name="update_product">Update</button></a>
                    <a href="product.php"><button type="button" class="btn cancel" name="cancel">Cancel</button></a>
                </form>

                <?php }; ?>
            <!-- </div> -->
        </main>

        <!----------------- Right ----------------->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <i class="ri-menu-line"></i>
                </button>
                <div class="theme-toggler">
                    <i class="ri-sun-fill active"></i>
                    <i class="ri-moon-fill"></i>
                </div>
                <!-- query ชื่อ user จาก db -->
                <div class="profile">
                    <div class="info">
                    <?php 
                    if(isset($_SESSION['staff_login'])){
                        $staff_id = $_SESSION['staff_login'];
                        $select = mysqli_query($conn, "SELECT * FROM staff_info si, staff_position sp WHERE staff_id = $staff_id AND si.position_id = sp.position_id");
                        $row = mysqli_fetch_assoc($select);
                    }
                    ?>
                    <p>Hi!, <b><?php echo $row['staff_firstname'] ?></b></p>
                    <small class="text-muted"><?php echo $row['position_name']?></small>
                    </div>
                    <div class="profile-photo">
                        <img src="../img/default-profile.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>
</body>
</html>
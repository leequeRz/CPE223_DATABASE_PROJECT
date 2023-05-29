<?php
    session_start();
    require_once '../config/db.php';
    if(!isset($_SESSION['staff_login'])){
        header('location: index.php');
        // echo 'ไม่มีข้อมูล';
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
            <h1>Orders</h1>

            <!-- <div class="date">
                <input type="date">
            </div> -->

            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <!-- query ข้อมูลจาก db -->
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>Payment</th>
                            <th>Order Type</th>
                            <th>Recipient</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                            $select = mysqli_query($conn, "SELECT * FROM billing b, payment_method pm, order_type ot WHERE b.payment_id = pm.payment_id AND b.order_type_id = ot.order_type_id");

                            while($row = mysqli_fetch_assoc($select)) {

                            if(isset($_GET['delete'])) {
                                $id = $_GET['delete'];
                                mysqli_query($conn, "DELETE FROM billing WHERE order_id = $id");
                                header('location:order.php');
                            }
                            ?>

                            <tr>
                                <td><?php echo $row['order_id']; ?></td>
                                <td><?php echo $row['total_price']; ?></td>
                                <?php 
                                    if ($row['payment_type'] == 'CARD') {
                                        echo '<td class="primary">' . $row['payment_type'] . '</td>';
                                    } else {
                                        echo '<td class="warning">' . $row['payment_type'] . '</td>';
                                    }
                                ?>
                                <!-- <td class="primary"><?php echo $row['payment_type']; ?></td> -->
                                <?php 
                                    if ($row['order_type_name'] == 'ONLINE') {
                                        echo '<td class="success">' . $row['order_type_name'] . '</td>';
                                    } else {
                                        echo '<td class="danger">' . $row['order_type_name'] . '</td>';
                                    }
                                ?>
                                <!-- <td class="success"><?php echo $row['order_type_name']; ?></td> -->
                                <!-- <td><a href="#" class="button-detail">Details</a></td> -->
                                <td><a href="order.php?delete=<?php echo $row['order_id']; ?>" class="button-delete">Delete</a></td>
                            </tr>

                        <?php }; ?>
                    </tbody>
                </table>
            </div>
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
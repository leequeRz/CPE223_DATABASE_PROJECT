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
            <h1>Seat</h1>

            <!-- <div class="date">
                <input type="date">
            </div> -->

            <div class="recent-orders">
                <h2>Recent Reservation</h2>
                <!-- query ข้อมูลจาก db -->
                <table>
                    <thead>
                        <tr>
                            <th>table_name</th>
                            <th>table_size</th>
                            <th>user_id</th>
                            <th>status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                            $select = mysqli_query($conn, "SELECT * FROM seat_reserve sr, seat_type st WHERE sr.seat_type_id = st.seat_type_id ");

                            while ($row = mysqli_fetch_assoc($select)){

                            // if(isset($_GET['delete'])) {
                            //     $id = $_GET['delete'];
                            //     mysqli_query($conn, "DELETE FROM seat_reserve WHERE reserve_id = $id");
                            //     header('location:seat.php');
                            // }
                            ?>

                                <tr>
                                        <td><?php echo $row['table_name']; ?></td>
                                        <td><?php echo $row['seat_type_id']; ?></td>
                                        <td class="primary"><?php echo $row['user_id']; ?></td>
                                        <?php if ($row['table_status'] == 1): ?>
                                            <td class="danger">จอง</td>
                                        <?php else: ?>
                                            <td class="success">ว่าง</td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="seat_reset.php?edit=<?php echo $row['reserve_id']; ?>" class="button-edit">Edit</a>
                                        </td>
                                    </tr>

                                    <?php
                                    // $_SESSION['reserve_id'] = $row['reserve_id'];
                                }; ?>


                        
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
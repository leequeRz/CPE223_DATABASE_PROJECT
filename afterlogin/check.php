<?php
session_start();
require_once 'condb.php';

if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'ไม่มีข้อมูล';
    header('location: afcart2.php');
    exit; // Stop further execution if user is not logged in
}

// $grand_total = 100 ;

if (isset($_POST['check_coupon']) && !empty($_POST['coupon'])) {
    $coupon = $_POST['coupon'];
    $grand_total = $_POST['total'];
    // Prepare the query using prepared statements to prevent SQL injection
    $select = mysqli_prepare($condb, "SELECT * FROM promotion WHERE promotion_id = ?");
    mysqli_stmt_bind_param($select, "s", $coupon);
    mysqli_stmt_execute($select);

    $result = mysqli_stmt_get_result($select);

    if ($row = mysqli_fetch_assoc($result)) {
        $minimumCost = $row['minimum_cost'];

        if ($grand_total >= $minimumCost) {
            $_SESSION['success'] = 'ใช้คูปองส่วนลดสำเร็จ'.$row['discount'];
            $_SESSION['coupon'] = $row['discount'];
            $_SESSION['minimum'] = $minimumCost;
            header('location: afcart2.php');
            exit; // Stop further execution after redirecting
        } else {
            $_SESSION['error'] = 'ไม่สามารถใช้งานคูปองได้ เนื่องจากสั่งไม่ถึงจำนวนยอดที่ต้องการ';
        }
    } else {
        $_SESSION['error'] = 'ไม่สามารถใช้งานคูปองได้';
    }
} else {
    $_SESSION['error'] = 'กรุณากรอกข้อมูลคูปอง';
}

header('location: afcart2.php');
exit; // Stop further execution after redirecting

?>

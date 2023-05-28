<?php

    session_start();
	require_once 'condb.php';
    if(!isset($_SESSION['user_login'])){
        // header('location: index.php');
        echo 'ไม่มีข้อมูล';
    }
 
 if(isset($_POST['check_coupon']) && $_POST['coupon']!="" ){
    $coupon=$_POST['coupon'];
    $select = mysqli_query($condb, "SELECT * FROM promotion WHERE promotion_id = '$coupon' ") ;
    $row = mysqli_fetch_assoc($select);
    if($row['promotion_id']==$coupon){
        if($grand_total > $row['minimum_cost']){
            $grand_total=$grand_total-$row['discount'];
            header('location:afcart.php');
            $_SESSION['success']='ใช้คูปองสำเร็จ';
        }
        $_SESSION['error']='ไม่สามารถใช้งานคูปองได้ เนื่องจากสั่งไม่ถึงจำนวนยอด';
        header('location:afcart.php');
    }
    $_SESSION['error']="ไม่สามารถใช้งานคูปองได้ ";
    header('location:afcart.php');
    
 }
//  header('location:afcart.php'); 
?>
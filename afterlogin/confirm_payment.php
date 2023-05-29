
<?php
session_start();
require_once 'condb.php';
if (!isset($_SESSION['user_login'])) {
    echo 'ไม่มีข้อมูล';
    exit; // Stop further execution if user is not logged in
}
$user_id = $_SESSION['user_login'];
$payment = @$_POST['paymethod'];
$order_type = @$_POST['ordertype'];
$total = $_SESSION['total'];
     
if(isset($_POST['confirm_payment'])) {
//วิธีการจ่ายตั้งแบบบัตรเครดิต
    if($payment =='PAY1'){
        $select = mysqli_query($condb, "SELECT * FROM user WHERE user_id = '$user_id' ") ;
        $row = mysqli_fetch_assoc($select);
        if($row['card_number'] != NULL){
            if($order_type == 'OT001'){
                $sel = mysqli_query($condb, "SELECT * FROM user_address WHERE user_id = '$user_id' ") ;
                $row1 = mysqli_fetch_assoc($sel);
                if($row1['user_address_line1'] != NULL){
                    $_SESSION['success']='ทำการสั่งซื้อสำเร็จ';
                    // $update = "UPDATE billing SET user_id='$user_id' , total_price='$total', order_type_id='$order_type', payment_id='$payment'";
                    $update = "INSERT INTO billing( user_id , total_price, order_type_id, payment_id) 
                    VALUES ('$user_id','$total','$order_type','$payment')";
                    mysqli_query($condb, $update);
                    header('location:afterlogin.php');
                }else{
                    $_SESSION['error']="กรุณากรอก address <a href='accountsetting.php' class='alert-link'>accountsetting</a>";
                    header('location:afcart.php');
                }
            }else{
                $_SESSION['success']='ทำการสั่งซื้อสำเร็จ';
                // $update = "UPDATE billing SET user_id='$user_id' , total_price='$total', order_type_id='$order_type', payment_id='$payment'";
                $update = "INSERT INTO billing( user_id , total_price, order_type_id, payment_id)  VALUES ('$user_id','$total','$order_type','$payment')";
                mysqli_query($condb, $update);
                header('location:afterlogin.php');
            }
        }else {
            $_SESSION['error']="กรุณากรอก card number <a href='accountsetting.php' class='alert-link'>accountsetting</a>";
            header('location:afcart.php');
        }
//วิธีการจ่ายตังแบบเงินสด
    }else{
        if($order_type == 'OT001'){
            $sel = mysqli_query($condb, "SELECT * FROM user_address WHERE user_id = '$user_id' ") ;
            $row1 = mysqli_fetch_assoc($sel);
            if($row1['user_address_line1'] != NULL){
                $_SESSION['success']='ทำการสั่งซื้อสำเร็จ';
                // $update = "UPDATE billing SET user_id='$user_id' , total_price='$total', order_type_id='$order_type', payment_id='$payment'";
                $update = "INSERT INTO billing( user_id , total_price, order_type_id, payment_id)  VALUES ('$user_id','$total','$order_type','$payment')";
                mysqli_query($condb, $update);
                header('location:afterlogin.php');
            }else{
                $_SESSION['error']="กรุณากรอก address <a href='accountsetting.php' class='alert-link'>accountsetting</a>";
                header('location:afcart.php');
            }
        }else{
            $_SESSION['success']='ทำการสั่งซื้อสำเร็จ';
            // $update = "UPDATE billing SET user_id='$user_id' , total_price='$total', order_type_id='$order_type', payment_id='$payment'";
            $update = "INSERT INTO billing( user_id , total_price, order_type_id, payment_id)  VALUES ('$user_id','$total','$order_type','$payment')";
            // $update = "INSERT INTO billing( user_id , total_price)  VALUES ('$user_id','$total')";
            mysqli_query($condb, $update);
            header('location:afterlogin.php');
        }
    }

}


?>






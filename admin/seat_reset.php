<?php
    session_start();
    require_once '../config/db.php';
    $id = $_GET['edit'];

    if (!isset($_SESSION['staff_login'])) {
        echo 'ไม่มีข้อมูล';
    } else {

        // $reserve_id = $_SESSION['reserve_id'];
        // echo $reserve_id;
        $staff_id=$_SESSION['staff_login'];
        $select = mysqli_query($conn, "SELECT * FROM seat_reserve WHERE reserve_id = '$id'");
        $row = mysqli_fetch_assoc($select);
            if ($row['table_status'] == 1) {
                $sqlUpdate = "UPDATE seat_reserve SET table_status = 0 WHERE reserve_id = '$id'";
                $update = mysqli_query($conn, $sqlUpdate);
                $sql = "UPDATE seat_reserve SET user_id = NULL WHERE reserve_id = '$id'";
                $up = mysqli_query($conn, $sql);
                header('location: seat.php');
                exit;
            } else if($row['table_status'] == 0){
                $sqlUpdate = "UPDATE seat_reserve SET table_status = 1 WHERE reserve_id = '$id'";
                $update = mysqli_query($conn, $sqlUpdate);
                header('location: seat.php');
                exit;
            }
    }
?>

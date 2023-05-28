<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'condb.php';
session_start();
	require_once '../db.php';
    if(!isset($_SESSION['user_login'])){
        // header('location: index.php');
        echo 'ไม่มีข้อมูล';
    } else if(!isset($_SESSION['table_name'])){
        // header('location: index.php');
        echo 'ไม่มีข้อมูล table_name';
    }
//print_r($_POST);
 
	else if (isset($_SESSION['user_login'])) {
		
		$user_id=$_SESSION['user_login']; 
		//การใช้ Transection ประกอบด้วย  BEGIN COMMIT ROLLBACK 
		
		$table_name=$_SESSION['table_name'];
		//update table status
		$sqlUpdate ="UPDATE seat_reserve SET table_status=1 WHERE table_name = '$table_name'"; //1=จอง
		$rsUpdate = mysqli_query($condb, $sqlUpdate);
		
		
		if($rsUpdate){ //ตรรวจสอบถ้า 2 ตัวแปรทำงานได้ถูกต้องจะทำการบันทึก แต่ถ้าเกิดข้อผิดพลาดจะ Rollback คือไม่บันทึกข้อมูลใดๆ
				mysqli_query($condb, "COMMIT");
				$_SESSION['success'] = 'บันทึกข้อมูลการจองเรียบร้อยแล้ว';
				$query ="UPDATE seat_reserve SET user_id = $user_id WHERE table_name = '$table_name'"; //1=จอง
				mysqli_query($condb, $query);
				header("Location:afterlogin.php");
				// echo 'บันทึกข้อมูลการจองเรียบร้อยแล้ว <a href="afterlogin.php"> กลับหน้าหลัก </a>';
			}else{
				mysqli_query($condb, "ROLLBACK");  
				$_SESSION['error'] = 'ไม่ทราบผมผิดอะไร';
				$msg = 'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ  <a href="index.php"> กลับหน้าหลัก </a>';
				echo $msg;	
			}
	} //iset 
	else{
			header("Location: ../afterlogin/afterlogin.php");
			echo 'ผิดอะไรก็ไม่รู้';	
	}
		//ลองเอาไปประยุกต์ใช้ดูครับ devbanban.com
?>
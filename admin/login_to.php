<?php

	session_start();
	require_once '../config/pdo.php';

    if (isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = trim($_POST['password']);
        $passwordHash = password_hash($password,PASSWORD_DEFAULT);
        
        if(empty($email)){
            $_SESSION['error'] = 'กรุณากรอก email';
            header("location: index.php");
        } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'รูปแบบไม่ถูกต้อง';
            header("location: index.php");
        } else if(empty($password)){
            $_SESSION['error'] = 'กรุณากรอกรหัส';
            header("location: index.php");
        } else if(strlen($_POST['password']) > 20 || strlen($_POST['password'] < 5 )){
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวรหว่าง 5 ถึง 20 ';
            header("location: index.php");
        }
            
        else { 
            try{
                $check_data = $conn->prepare("SELECT * FROM staff_info WHERE staff_email =:email ");
                $check_data->bindParam(":email",$email);
                // $check_data->bindParam(":password",$password);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);
                
                if($check_data->rowCount()>0){

                    if($email == $row['staff_email']){
                        if ($password === $row['staff_password']) {
                        //if(password_verify($password,$row['staff_password'])){
                        //if(true){
                            if($row['position_id'] == 'PST01'){
                                $_SESSION['staff_login'] = $row['staff_id'];
                                header("location: home.php");
                                //ต้องแก้ไขให้แต่ละ position header ต่างกัน
                            } else {
                                $_SESSION['staff_login'] = $row['staff_id'];
                                header("location: home.php");
                            }
                        }else {
                              $_SESSION['error'] = 'incorrect password';
                              header("location: index.php");}
                        
                    } else {$_SESSION['error'] = 'incorrect email';
                      header("location: index.php");}
                
                } 
                else{
                    $_SESSION['error'] = 'incorrect email or password';
                    header("location: index.php");
                    }
            } catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>
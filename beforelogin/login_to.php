<?php

	session_start();
	require_once '../db.php';

    if (isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = trim($_POST['password']);
        
        
        if(empty($email)){
            $_SESSION['error'] = 'กรุณากรอก email';
            header("location: login.php");
        } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'รูปแบบไม่ถูกต้อง';
            header("location: login.php");
        } else if(empty($password)){
            $_SESSION['error'] = 'กรุณากรอกรหัส';
            header("location: login.php");
        } else if(strlen($_POST['password']) > 20 || strlen($_POST['password'] < 5 )){
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวรหว่าง 5 ถึง 20 ';
            header("location: login.php");
        }
            
        else { 
            try{
                $check_data = $conn->prepare("SELECT * FROM user WHERE user_email =:email ");
                $check_data->bindParam(":email",$email);
                // $check_data->bindParam(":password",$password);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);
                
                if($check_data->rowCount()>0){

                    if($email == $row['user_email']){
                        if ($password === $row['user_password']) {
                        //if(password_verify($password,$row['user_password'])){
                        //if(true){
                            
                                $_SESSION['user_login'] = $row['user_id'];
                                header("location: ../afterlogin/afterlogin.php");
       
                        }else {
                              $_SESSION['error'] = 'incorrect password';
                              header("location: login.php");}
                        
                    } else {$_SESSION['error'] = 'incorrect email';
                      header("location: login.php");}
                
                } 
                else{
                    $_SESSION['error'] = 'incorrect email or password';
                    header("location: login.php");
                    }
            } catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>
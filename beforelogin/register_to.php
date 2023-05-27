<?php

	session_start();
	require_once '../db.php';

    if (isset($_POST['signup'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm= $_POST['confirm-password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $tel = $_POST['tel'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        
        if(empty($email)){
            $_SESSION['error'] = 'กรุณากรอก email';
            header("location: register.php");
        } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'รูปแบบไม่ถูกต้อง';
            header("location: register.php");
        } else if(empty($password)){
            $_SESSION['error'] = 'กรุณากรอกรหัส';
            header("location: register.php");
        } else if(strlen($_POST['password']) > 20 || strlen($_POST['password'] < 5 )){
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวรหว่าง 5 ถึง 20 ';
            header("location: register.php");
        } else if($password != $confirm){
            $_SESSION['error'] = 'กรุณาใส่รหัสให้ตรงกัน';
            header("location: register.php");
        } else if(empty($firstname)){
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: register.php");
        } else if(empty($lastname)){
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: register.php");
        } else if(empty($tel)){
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทร';
            header("location: register.php");
        } else if(empty($date)){
            $_SESSION['error'] = 'กรุณากรอกวันเกิด';
            header("location: register.php");
        } else if(empty($gender)){
            $_SESSION['error'] = 'กรุณากรอกเพศ';
            header("location: register.php");
        }  
        else { 
            //เช็คอีเมลซ้ำในระบบ
            try{
                $check_email = $conn->prepare("SELECT user_email FROM user WHERE user_email =:email");
                $check_email->bindParam(":email",$email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);
                
                if(is_array($row) && $row['user_email']==$email){
                    $_SESSION['warning']="มีอีเมลนี้อยู่ในระบบแล้ว <a href='login.php'>sign-in</a>";
                    header("location: register.php");
                } else if(!isset($_SESSION['error'])){
                    // $passwordHash = password_hash($password,PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO user(user_firstname,user_lastname,user_tel,user_DOB,user_email,user_password,user_gender) 
                    VALUES(:firstname, :lastname,:tel ,:date, :email, :password,:gender)");
                    $stmt->bindParam(":firstname",$firstname);
                    $stmt->bindParam(":lastname",$lastname);
                    $stmt->bindParam(":tel",$tel);
                    $stmt->bindParam(":date",$date);
                    $stmt->bindParam(":email",$email);
                    $stmt->bindParam(":password",$password);
                    // $stmt->bindParam(":password",$passwordHash);
                    $stmt->bindParam(":gender",$gender);
                    $stmt->execute();
                    // if ($vehicle_id == "") {
                    //     $query = "UPDATE staff_info SET vehicle_id = NULL WHERE staff_email = :email";
                    //     $statement = $conn->prepare($query);
                    //     $statement->bindParam(':email', $email);  // Updated the parameter name here
                    //     $statement->execute();
                    //     $_SESSION['success'] = "ลงทะเบียนเรียบร้อย <a href='login.php' class='alert-link'>sign-in</a>";
                    //     header("location: testsignup.php");
                    // } else {
                        $_SESSION['success'] = "ลงทะเบียนเรียบร้อย <a href='login.php' class='alert-link'>sign-in</a>";
                        header("location: login.php");
                    // }                    
                } else{
                    $_SESSION['error'] = 'มีบางอย่างผิดพลาด';
                    header("location: register.php");
                }
            } catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>
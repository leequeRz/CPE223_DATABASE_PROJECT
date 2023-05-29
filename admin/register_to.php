<?php

	session_start();
	require_once '../config/pdo.php';

    if (isset($_POST['signup'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm= $_POST['confirm-password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $tel = $_POST['tel'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $position = $_POST['position'];
        $vehicle_id = $_POST['vehicle_id'];
        
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
        } else if(empty($position)){
            $_SESSION['error'] = 'กรุณากรอกตำแหน่ง';
            header("location: register.php");
        }
            
        else { 
            //เช็คอีเมลซ้ำในระบบ
            try{
                $check_email = $conn->prepare("SELECT staff_email FROM staff_info WHERE staff_email =:email");
                $check_email->bindParam(":email",$email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);
                
                if(is_array($row) && $row['staff_email']==$email){
                    $_SESSION['warning']="มีอีเมลนี้อยู่ในระบบแล้ว <a href='index.php'>sign-in</a>";
                    header("location: register.php");
                } else if(!isset($_SESSION['error'])){
                    // $passwordHash = password_hash($password,PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO staff_info(staff_firstname,staff_lastname,staff_tel,staff_DOB,staff_email,staff_password,staff_gender,vehicle_id,position_id) 
                    VALUES(:firstname, :lastname,:tel ,:date, :email, :password,:gender,:vehicle_id,:position)");
                    $stmt->bindParam(":firstname",$firstname);
                    $stmt->bindParam(":lastname",$lastname);
                    $stmt->bindParam(":tel",$tel);
                    $stmt->bindParam(":date",$date);
                    $stmt->bindParam(":email",$email);
                    $stmt->bindParam(":password",$password);
                    // $stmt->bindParam(":password",$passwordHash);
                    $stmt->bindParam(":gender",$gender);
                    $stmt->bindParam(":vehicle_id",$vehicle_id);
                    $stmt->bindParam(":position",$position);
                    $stmt->execute();
                    if ($vehicle_id == "") {
                        $query = "UPDATE staff_info SET vehicle_id = NULL WHERE staff_email = :email";
                        $statement = $conn->prepare($query);
                        $statement->bindParam(':email', $email);  // Updated the parameter name here
                        $statement->execute();
                        $_SESSION['success'] = "ลงทะเบียนเรียบร้อย <a href='index.php' class='alert-link'>sign-in</a>";
                        header("location: register.php");
                    } else {
                        $_SESSION['success'] = "ลงทะเบียนเรียบร้อย <a href='index.php' class='alert-link'>sign-in</a>";
                        header("location: register.php");
                    }                    
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
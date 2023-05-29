<?php

    session_start();
    require_once 'condb.php';

    if(!isset($_SESSION['user_login'])){
        // header('location: index.php');
        echo 'ไม่มีข้อมูล';
    }

    $id = $_GET['edit'];

    if(isset($_POST['update_user'])) {

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_tel = $_POST['user_tel'];
        $user_dob = $_POST['user_DOB'];
        $user_gender = $_POST['user_gender'];
    //    $vehicle_id = $_POST['vehicle_id'];
        if(($user_firstname !="") && ($user_lastname !="")&& ($user_tel !="")){
            $update = "UPDATE user SET user_firstname='$user_firstname', user_lastname='$user_lastname', user_tel='$user_tel', user_DOB='$user_dob', user_gender='$user_gender' WHERE user_id = $id";

            $result = mysqli_query($condb, $update);

            if($result) {
    
                    $_SESSION['success'] = "update ข้อมูลสำเร็จ";
                    header("Loacation: accountsetting2.php");
            } 
            else {
                $_SESSION['error'] ='ไม่พบข้อมูล';
                header("Loacation: accountsetting2.php");
            }
        } else {
            $_SESSION['error'] ='กรอกข้อมูลไม่ครบ';
            header("Loacation: accountsetting2.php");
        }
    }

    if(isset($_POST['update_user_password'])) {

        $oldpassword = $_POST['old-password'];
        $newpassword = $_POST['new-password'];
        $confirmpassword = $_POST['confirm-password'];
        
        $query = "SELECT* FROM user WHERE user_id = $id";
        $select = mysqli_query($condb, $query);
        $row = mysqli_fetch_assoc($select);
       if(($newpassword !="") && ($oldpassword !="")&& ($confirmpassword !="")){
            if($row['user_password'] == $oldpassword){
                if($newpassword==$confirmpassword){
                    $update = "UPDATE user SET user_password='$newpassword' WHERE user_id = $id";
                    mysqli_query($condb, $update);
                    $_SESSION['success'] ='อัพเดท password สำเร็จ';
                    header("Loacation: accountsetting2.php");
                }else{
                    $_SESSION['error'] ='password ไม่ตรงกัน!!!';
                    header("Loacation: accountsetting2.php");
                }
            }else{
                $_SESSION['error'] ='password ไม่ถูกต้อง!!!';
                header("Loacation: accountsetting2.php");
            }
        }else{
            $_SESSION['error'] ='กรอกข้อมูลไม่ครบ';
            header("Loacation: accountsetting2.php");
        }

    }
    
    if(isset($_POST['update_user_address'])) {

        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $postalcode = $_POST['postal-code'];
        if(($address1 !="") && ($city !="")&& ($province !="")&& ($postalcode !="")){
            
            $query = "SELECT* FROM user_address WHERE user_id = $id";
            $select = mysqli_query($condb, $query);
            $row = mysqli_fetch_assoc($select);
            
            if($row > 0){
                
                    $update = "UPDATE user_address SET user_address_line1='$address1' WHERE user_id = $id ";
                    mysqli_query($condb, $update);
                    $update = "UPDATE user_address SET user_address_line2='$address2' WHERE user_id = $id ";
                    mysqli_query($condb, $update);
                    $update = "UPDATE user_address SET user_city='$city' WHERE user_id = $id ";
                    mysqli_query($condb, $update);
                    $update = "UPDATE user_address SET user_province='$province' WHERE user_id = $id ";
                    mysqli_query($condb, $update);
                    $update = "UPDATE user_address SET user_postal_code='$postalcode' WHERE user_id = $id ";
                    mysqli_query($condb, $update);
                    $_SESSION['success'] ='อัพเดท address สำเร็จ';
                    header("Loacation: accountsetting2.php");
                
            }else{
                $insert = "INSERT INTO user_address( user_id , user_address_line1, user_address_line2, user_city, user_province, user_postal_code) VALUES ('$id','$address1','$address2','$city','$province','$postalcode')";
                $result = mysqli_query($condb, $insert);
                if ($address2 == "") {
                    $query = "UPDATE user_address SET address2 = NULL WHERE user_id = $id";
                    mysqli_query($condb, $query);
                    $_SESSION['success'] = "เพิ่ม address สำเร็จ";
                    header("Loacation: accountsetting2.php");
                } else {
                    $_SESSION['success'] ='เพิ่ม address สำเร็จ';
                    header("Loacation: accountsetting2.php");
                }    
                
            }
        }else {
            $_SESSION['error'] ='กรอกข้อมูลไม่ครบ';
            header("Loacation: accountsetting2.php");
        }        
    }

    // if (isset($_POST['update_user_card'])) {
    //     $card_number = $_POST['card_number'];
    //     $cvv = $_POST['cvv'];
    //     $exp = $_POST['expire_month'];
    //     $card_type = $_POST['card_type_id'];
    
    //     if ($card_number != "" && $cvv != "" && $exp != "") {
    //         // $query = "SELECT * FROM user u JOIN payment_card pc ON u.card_number = pc.card_number WHERE u.user_id = $id";
    //         // $select = mysqli_query($condb, $query);
    //         // $row = mysqli_fetch_assoc($select);
    //         $query = "SELECT * FROM user WHERE user_id = $id";
    //         $select = mysqli_query($condb, $query);
    //         $row = mysqli_fetch_assoc($select);
    
    //         if ($row['card_number'] != NULL) {
    //             $update_card = "UPDATE payment_card SET card_number='$card_number', cvv='$cvv', expire_month='$exp', card_type_id='$card_type'";
    //             mysqli_query($condb, $update_card);
    //             $update_user = "UPDATE user SET card_number='$card_number' WHERE user_id = $id";
    //             mysqli_query($condb, $update_user);
    //             $_SESSION['success'] = 'อัพเดท card สำเร็จ';
    //             header("Location: accountsetting2.php");
    //         } else {
    //             $update_user = "UPDATE user SET card_number='$card_number' WHERE user_id = $id";
    //             mysqli_query($condb, $update_user);
    //             $insert = "INSERT INTO payment_card(card_number, cvv, expire_month, card_type_id) VALUES ('$card_number','$cvv','$exp','$card_type')";
    //             $result = mysqli_query($condb, $insert);
    
    //             $_SESSION['success'] = "เพิ่ม card สำเร็จ";
    //             header("Location: accountsetting2.php");
    //         }
    //     } else {
    //         $_SESSION['error'] = 'กรอกข้อมูลไม่ครบ';
    //         header("Location: accountsetting2.php");
    //     }
    // }
    
    if(isset($_POST['update_user_card'])) {

        $card_number = $_POST['card_number'];
        $cvv = $_POST['cvv'];
        $exp = $_POST['expire_month'];
        $card_type = $_POST['card_type_id'];

        if(($card_number !="") && ($cvv !="")&& ($exp !="")){
            
            $query = "SELECT * FROM user u, payment_card pc WHERE u.user_id = $id AND u.card_number = pc.card_number";
            $select = mysqli_query($condb, $query);
            $row = mysqli_fetch_assoc($select);
            
            echo $row;
            if($row > 0){
                
                    $update = "UPDATE payment_card SET card_number='$card_number', cvv='$cvv', expire_month='$exp', card_type_id='$card_type' WHERE user_id = $id";
                    mysqli_query($condb, $update);
                    $_SESSION['success'] ='อัพเดท card สำเร็จ';
                    header("Loacation: accountsetting2.php");
                
            }else{
                $insert = "INSERT INTO payment_card(card_number, cvv, expire_month, card_type_id) VALUES ('$card_number','$cvv','$exp','$card_type')";

                $result = mysqli_query($condb, $insert);

                $_SESSION['success'] = "เพิ่ม card สำเร็จ";
                header("Loacation: accountsetting2.php");
            }
        }else {
            $_SESSION['error'] ='กรอกข้อมูลไม่ครบ';
            header("Loacation: accountsetting2.php");
        }        
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
    <link rel="stylesheet" type="text/css" href="acsettingstyle.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <!-- error pop-up -->
    <?php if(isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php
                echo $_SESSION['error'];
                unset ($_SESSION['error']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  } ?>

    <!-- success pop-up -->
    <?php if(isset($_SESSION['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
                echo $_SESSION['success'];
                unset ($_SESSION['success']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  } ?>


    <?php

        $select = mysqli_query($condb, "SELECT * FROM user WHERE user_id = $id");

        while($row = mysqli_fetch_assoc($select)){

    ?>

    <section class="py-5 my-5">
            <div class="container">
                <h1 class="mb-5">Account Settings</h1>
                <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                    <div class="profile-tab-nav border-right">
                        <div class="p-4">
                            <div class="img-circle text-center mb-3">
                                <!-- query iamge มาใส่ -->
                                <?php
                                    // Fetch the image path from the database
                                    //$imagePath = $row['user_image'];

                                    // if (!empty($imagePath)) {
                                    //     // Display the existing profile image
                                    //     echo '<img src="'.$imagePath.'" class="shadow">';
                                    // } else {
                                        // Display a default image if no profile image is set
                                        echo '<img src="../img/default-profile.jpg" class="shadow">';
                                    
                                ?>
                            </div>
                            <!-- query firstname lastname มาใส่ -->
                            <h4 class="text-center"><?php echo $row['user_firstname']; ?></h4>
                            <h4 class="text-center"><?php echo $row['user_lastname']; ?></h4>
                            <!-- update รูป -->
                            <!-- <label class="update-profile" for="input-file">Update</label>
                            <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file"> -->
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                                <i class="fa fa-home text-center mr-1"></i> 
                                Account
                            </a>
                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                                <i class="fa fa-key text-center mr-1"></i> 
                                Password
                            </a>
                            <a class="nav-link" id="address-tab" data-toggle="pill" href="#address" role="tab" aria-controls="address" aria-selected="false">
                                <i class="fa fa-user text-center mr-1"></i> 
                                Address
                            </a>
                            <a class="nav-link" id="card-tab" data-toggle="pill" href="#card" role="tab" aria-controls="card" aria-selected="false">
                                <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                Card
                            </a>
                            <!-- <a class="nav-link" id="promotion-tab" data-toggle="pill" href="#promotion" role="tab" aria-controls="promotion" aria-selected="false">
                                <i class="fa fa-tv text-center mr-1"></i> 
                                Promotion
                            </a> -->
                            <a href="afterlogin.php" class="nav-link"  aria-controls="back" aria-selected="false">
                                <i class="fa fa-tv text-center mr-1"></i> 
                                Back
                            </a>
                        </div>
                    </div>

                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="form-container">

                        <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <h3 class="mb-4">Account Settings</h3>
                                <div class="row">
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="abc@gmail.com">
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row['user_firstname']; ?>" name="user_firstname" value="<?php $row['user_firstname']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row['user_lastname']; ?>" name="user_lastname" value="<?php $row['user_lastname']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tel.</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row['user_tel']; ?>" name="user_tel" value="<?php $row['user_tel']; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="user_DOB" value="<?php echo $row['user_DOB']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sex</label>
                                            <form>
                                                <label for="gender">Gender:</label>
                                                <br>
                                                <select id="gender" name="user_gender">
                                                    <option value="M" <?php echo ($row['user_gender'] === 'M') ? 'selected' : ''; ?>>Male</option>
                                                    <option value="F" <?php echo ($row['user_gender'] === 'F') ? 'selected' : ''; ?>>Female</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="user.php"><button type="submit" class="btn btn-primary w-25" name="update_user">Update</button></a>
                                    <a href="user.php"><button type="button" class="btn btn-light w-25" name="cancel">Cancel</button></a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                <h3 class="mb-4">Password Settings</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Old password</label>
                                            <input name="old-password" type="password" class="form-control"  id="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>New password</label>
                                            <input name="new-password" type="password" class="form-control"  id="new-password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirm new password</label>
                                            <input name="confirm-password" type="password" class="form-control"  id="confirm-password" >
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="user.php"><button type="submit" class="btn btn-primary w-25" name="update_user_password">Update</button></a>
                                    <a href="user.php"><button type="button" class="btn btn-light w-25" name="cancel">Cancel</button></a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                <h3 class="mb-4">Address Settings</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address1</label>
                                            <input name="address1" id="address1" type="text" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address2</label>
                                            <input name="address2" id="address2" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input name="city" id="city" type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <input name="province" id="province"  type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input name="postal-code" id="postal-code" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="user.php"><button type="submit" class="btn btn-primary w-25" name="update_user_address">Update</button></a>
                                    <a href="user.php"><button type="button" class="btn btn-light w-25" name="cancel">Cancel</button></a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="card" role="tabpanel" aria-labelledby="card-tab">
                                <h3 class="mb-4">Card info</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control" name="card_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>cvv</label>
                                            <input type="text" class="form-control" name="cvv">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>EXP</label>
                                            <input type="month" class="form-control" name="expire_month" value="exp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Card type</label>
                                            <form>
                                                <label for="cardtype">Type:</label>
                                                <select id="cardtype" name="card_type_id">
                                                    <option value="CRE">CREDIT</option>
                                                    <option value="DEB">DEBIT</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                <a href="user.php"><button type="submit" class="btn btn-primary w-25"name="update_user_card">Update</button></a>   
                                    <a href="user.php"><button type="button" class="btn btn-light w-25" name="cancel">Cancel</button></a>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                    </form>

                <?php }; ?>
            </div>
    </section>

    <script src="../script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
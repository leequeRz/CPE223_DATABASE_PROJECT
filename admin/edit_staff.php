<?php

    session_start();
    require_once '../config/db.php';

    if(!isset($_SESSION['staff_login'])){
        header('location: index.php');
        // echo 'ไม่มีข้อมูล';
    }

    $id = $_GET['edit'];

    // if(isset($_POST['submit'])) {

        // $staff_image = $_FILES['staff_image']['name'];
        // $staff_image_tmp_name = $_FILES['staff_image']['tmp_name'];
        // $staff_image_folder = '../img/'.$staff_image;

    //     $update = "UPDATE product SET image='$staff_image' WHERE staff_id = $id";

    //     $result = mysqli_query($conn, $update);

    //     if($result) {
    //         move_uploaded_file($staff_image_tmp_name, $staff_image_folder);
    //         $_SESSION['success'] = "update รูปภาพสำเร็จ";
    //         header("Loacation: edit_staff.php");
    //     }
    //     else {
    //         $_SESSION['error'] ='ไม่พบข้อมูล';
    //         header("Loacation: edit_staff.php");
    //     }
    // }

    if(isset($_POST['update_staff'])) {

        $staff_firstname = $_POST['staff_firstname'];
        $staff_lastname = $_POST['staff_lastname'];
        $staff_tel = $_POST['staff_tel'];
        $staff_dob = $_POST['staff_DOB'];
        $staff_gender = $_POST['staff_gender'];
        $vehicle_id = $_POST['vehicle_id'];
        if(($staff_firstname !="") && ($staff_lastname !="")&& ($staff_tel !="")){
            $update = "UPDATE staff_info SET staff_firstname='$staff_firstname', staff_lastname='$staff_lastname', staff_tel='$staff_tel', staff_DOB='$staff_dob', staff_gender='$staff_gender', vehicle_id='$vehicle_id' WHERE staff_id = $id";

            $result = mysqli_query($conn, $update);

            if($result) {
                if ($vehicle_id == "") {
                    $query = "UPDATE staff_info SET vehicle_id = NULL WHERE staff_id = $id";
                    mysqli_query($conn, $query);
                    $_SESSION['success'] = "update ข้อมูลสำเร็จ";
                    header("Loacation: edit_staff.php");
                } else {
                    $_SESSION['success'] = "update ข้อมูลสำเร็จ";
                    header("Loacation: edit_staff.php");
                }      
            }
            else {
                $_SESSION['error'] ='ไม่พบข้อมูล';
                header("Loacation: edit_staff.php");
            }
      } else {
        $_SESSION['error'] ='กรอกข้อมูลไม่ครบ';
        header("Loacation: edit_staff.php");
      }
    }

    if(isset($_POST['update_staff_password'])) {

        $oldpassword = $_POST['old-password'];
        $newpassword = $_POST['new-password'];
        $confirmpassword = $_POST['confirm-password'];
        
        $query = "SELECT* FROM staff_info WHERE staff_id = $id";
        $select = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($select);
       
        if($row['staff_password'] == $oldpassword){
            if($newpassword==$confirmpassword){
                $update = "UPDATE staff_info SET staff_password='$newpassword' WHERE staff_id = $id";
                mysqli_query($conn, $update);
                $_SESSION['success'] ='อัพเดท password สำเร็จ';
                header("Loacation: edit_staff.php");
            }else{
                $_SESSION['error'] ='password ไม่ตรงกัน!!!';
                header("Loacation: edit_staff.php");
            }
        }else{
            $_SESSION['error'] ='password ไม่ถูกต้อง!!!';
            header("Loacation: edit_staff.php");
        }
    }
    
    if(isset($_POST['update_staff_address'])) {

        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $postalcode = $_POST['postal-code'];
        if(($address1 !="") && ($city !="")&& ($province !="")&& ($postalcode !="")){
            
            $query = "SELECT* FROM staff_address WHERE staff_id = $id";
            $select = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($select);
            
            if($row > 0){
                
                    $update = "UPDATE staff_address SET staff_address_line1='$address1' WHERE staff_id = $id ";
                    mysqli_query($conn, $update);
                    $update = "UPDATE staff_address SET staff_address_line2='$address2' WHERE staff_id = $id ";
                    mysqli_query($conn, $update);
                    $update = "UPDATE staff_address SET staff_city='$city' WHERE staff_id = $id ";
                    mysqli_query($conn, $update);
                    $update = "UPDATE staff_address SET staff_province='$province' WHERE staff_id = $id ";
                    mysqli_query($conn, $update);
                    $update = "UPDATE staff_address SET staff_postal_code='$postalcode' WHERE staff_id = $id ";
                    mysqli_query($conn, $update);
                    $_SESSION['success'] ='อัพเดท address สำเร็จ';
                    header("Loacation: edit_staff.php");
                
            }else{
                $insert = "INSERT INTO staff_address( staff_id , staff_address_line1, staff_address_line2, staff_city, staff_province, staff_postal_code) VALUES ('$id','$address1','$address2','$city','$province','$postalcode')";
                $result = mysqli_query($conn, $insert);
                if ($address2 == "") {
                    $query = "UPDATE staff_address SET address2 = NULL WHERE staff_id = $id";
                    mysqli_query($conn, $query);
                    $_SESSION['success'] = "เพิ่ม address สำเร็จ";
                    header("Loacation: edit_staff.php");
                } else {
                    $_SESSION['success'] ='เพิ่ม address สำเร็จ';
                    header("Loacation: edit_staff.php");
                }    
                
            }
        }else {
            $_SESSION['error'] ='กรอกข้อมูลไม่ครบ';
            header("Loacation: edit_staff.php");
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
    <link rel="stylesheet" type="text/css" href="../css/acsettingstyle.css">
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

        $select = mysqli_query($conn, "SELECT * FROM staff_info WHERE staff_id = $id");

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
                                    // Display a default image if no profile image is set
                                    echo '<img src="../img/default-profile.jpg" class="shadow">';
                                ?>
                            </div>
                            <!-- query firstname lastname มาใส่ -->
                            <h4 class="text-center"><?php echo $row['staff_firstname']; ?></h4>
                            <h4 class="text-center"><?php echo $row['staff_lastname']; ?></h4>
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
                            <!-- <a class="nav-link" id="card-tab" data-toggle="pill" href="#card" role="tab" aria-controls="card" aria-selected="false">
                                <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                Card
                            </a> -->
                            <!-- <a class="nav-link" id="promotion-tab" data-toggle="pill" href="#promotion" role="tab" aria-controls="promotion" aria-selected="false">
                                <i class="fa fa-tv text-center mr-1"></i> 
                                Promotion
                            </a> -->
                            <a href="staff.php" class="nav-link"  aria-controls="promotion" aria-selected="false">
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
                                            <input type="text" class="form-control" placeholder="<?php echo $row['staff_firstname']; ?>" name="staff_firstname" value="<?php $row['staff_firstname']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row['staff_lastname']; ?>" name="staff_lastname" value="<?php $row['staff_lastname']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tel.</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row['staff_tel']; ?>" name="staff_tel" value="<?php $row['staff_tel']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle ID</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row['vehicle_id']; ?>" name="vehicle_id" value="<?php $row['vehicle_id']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="staff_DOB" value="<?php echo $row['staff_DOB']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sex</label>
                                            <form>
                                                <label for="gender">Gender:</label>
                                                <br>
                                                <select id="gender" name="staff_gender">
                                                    <option value="M" <?php echo ($row['staff_gender'] === 'M') ? 'selected' : ''; ?>>Male</option>
                                                    <option value="F" <?php echo ($row['staff_gender'] === 'F') ? 'selected' : ''; ?>>Female</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="staff.php"><button type="submit" class="btn btn-primary w-25" name="update_staff">Update</button></a>
                                    <a href="staff.php"><button type="button" class="btn btn-light w-25" name="cancel">Cancel</button></a>
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
                                    <a href="staff.php"><button type="submit" class="btn btn-primary w-25" name="update_staff_password">Update</button></a>
                                    <a href="staff.php"><button type="button" class="btn btn-light w-25" name="cancel">Cancel</button></a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                <h3 class="mb-4">Address Settings</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address1</label>
                                            <input name="address1" id="address1" type="text" class="form-control" >
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
                                    <a href="staff.php"><button type="submit" class="btn btn-primary w-25" name="update_staff_address">Update</button></a>
                                    <a href="staff.php"><button type="button" class="btn btn-light w-25" name="cancel">Cancel</button></a>
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
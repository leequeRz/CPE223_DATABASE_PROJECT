if($_POST['paymethod']=='PAY1'){
    $select = mysqli_query($condb, "SELECT * FROM user WHERE user_id = '$user_id' ") ;
    $row = mysqli_fetch_assoc($select);
    if($row['card_number'] != NULL){
        header('location:afcart.php');
    }else {
        $_SESSION['error']="กรุณากรอก card number <a href='accountsetting.php' class='alert-link'>sign-in</a>";
        header('location:afcart.php');
    }
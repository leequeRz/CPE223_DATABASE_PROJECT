<?php
session_start();
require_once 'condb.php';
if (!isset($_SESSION['user_login'])) {
    echo 'ไม่มีข้อมูล';
    exit; // Stop further execution if user is not logged in
}
$user_id = $_SESSION['user_login'];

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($condb, "UPDATE `cart` SET quantity = '$update_quantity' WHERE cart_id = '$update_id'") or die('query failed');
    $_SESSION['success'] = 'Cart quantity updated successfully!';
    $minimumcost = 0;
    header('location: afcart.php');
    exit;
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($condb, "DELETE FROM `cart` WHERE cart_id = '$remove_id'") or die('query failed');
    $minimumcost = 0;
    header('location: afcart.php');
    exit;
}

if (isset($_GET['delete_all'])) {
    mysqli_query($condb, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    $minimumcost = 0;
    header('location: afcart.php');
    exit;
}

if (isset( $_SESSION['coupon'] )  ) {
    $discount = $_SESSION['coupon'];
    // if (isset( $_SESSION['minimum'] )){
        //$minimumcost = $_SESSION['minimum'];
    }
if (isset( $_SESSION['minimum'] )  ) {
       // $discount = $_SESSION['coupon'];
        // if (isset( $_SESSION['minimum'] )){
            $minimumcost = $_SESSION['minimum'];
        }
     
   



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;300&family=Poppins:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/database_project/beforelogin/style.css">
    <link rel="stylesheet" href="afcart_afshop.css">
</head>

<body>
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php } ?>
    <section id="header">
        <a href="index.php" class="headerlogo">ARHERELEE</a>

        <div>
            <ul id="navbar">
                <li><a href="afterlogin.php">HOME</a></li>
                <li><a href="afshop.php">SHOP</a></li>
                <li><a href="table.php">TABLE</a></li>
                <li><a href="index.php">LOGOUT</a></li>
                <!-- <li><a href="blog.php">BLOG</a></li> -->
                <li><a href="accountsetting2.php">ACCOUNT SETTING</a></li>
                <li id="lg-bag"><a class="active" href="afcart.php"><i class='bx bx-shopping-bag'></i></a></li>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class='bx bx-shopping-bag'></i></a>
            <i id="bar" class="fas fa-outdent"></i>

        </div>
    </section>

    <section id="page-header">

        <!-- <h2>AR-HERE-LEE</h2>

            <p>เอนจอยค้าบโผม</p> -->

    </section>

    <div class="shopping-cart">

        <table>
            <thead>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th>total price</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php
                $user_id = $_SESSION['user_login'];
                $cart_query = mysqli_query($condb, "SELECT * FROM `cart` WHERE user_id = $user_id ") or die('query failed');
                $grand_total = 0;
                if (mysqli_num_rows($cart_query) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                        $product_id = $fetch_cart['product_id'];
                        $select_product = mysqli_query($condb, "SELECT * FROM product WHERE product_id = '$product_id' ");
                        $row = mysqli_fetch_assoc($select_product);
                        $sub_total = ($row['price'] * $fetch_cart['quantity']);
                        $grand_total += $sub_total;
                ?>
                        <tr>
                            <td><img src="../products/<?php echo $row['image']; ?>" height="100" alt=""></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td>$<?php echo $row['price']; ?>/-</td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['cart_id']; ?>">
                                    <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                    <input type="submit" name="update_cart" value="update" class="option-btn">
                                </form>
                            </td>
                            <td>$<?php echo $sub_total; ?>/-</td>
                            <td><a href="afcart.php?remove=<?php echo $fetch_cart['cart_id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                }
                ?>
                <tr class="table-bottom">
                    <td colspan="4">grand total :</td>
                    <td>$<?php  
                        if($grand_total - $discount > 0 ){
                        $grand_totalx = $grand_total - $discount;
                         echo $grand_totalx;
                         $_SESSION['total']=$grand_totalx;
                        }else{
                            echo $grand_total;
                            $_SESSION['total']=$grand_total;
                        }
                        
                    ?>/-</td>
                    <td><a href="afcart.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- <form action="confirm_payment.php" method="post">
            <input type="submit" name="confirm_payment" value="Confirm" class="btn"> -->
    </form>
    <section id="card-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <form action="check.php" method="post">
                    <input type="text" name="coupon" class="input">
                    <input type="hidden" name="total" value="<?php  echo $grand_total;  ?>">
                    <input type="submit" name="check_coupon" value="Apply" class="option-btn">
                </form>
            </div>
        <form action="confirm_payment.php" method="post">
        <input type="submit" name="confirm_payment" value="Confirm" class="btn">
            <div class="halfpayhalforeder">
                <div class="payment-method">
                    <h3>Payment Method</h3>
                    <div class="form-group">
                        
                            <label for="paymethod">Type:</label>
                            <select id="paymethod" name="paymethod">
                                <option value="PAY1">CARD</option>
                                <option value="PAY2">CASH</option>
                            </select>
                        
                    </div>
                </div>
                <div class="order-type">
                    <h3>Order Type</h3>
                    <div class="form-group">
                    
                            <label for="ordertype">Type:</label>
                            <select id="ordertype" name="ordertype">
                                <option value="OT001">ONLINE</option>
                                <option value="OT002">ONSITE</option>
                            </select>
                    
                    </div>
                </div>
            </div>
            
        </div>

    </section>


    <script src="/beforelogin/script.js"></script>
    <script src="https://kit.fontawesome.com/10876e5229.js" crossorigin="anonymous"></script>

</body>

</html>

<!-- I have made the necessary changes to fix the issue with the grand total not updating in the cart. The calculation for the sub-total and grand total is now done inside the loop that fetches the cart items. I have also removed the unnecessary curly braces around the image, name, price, and action fields. -->

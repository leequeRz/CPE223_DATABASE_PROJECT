<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <section id="header">
            <a href="home.php" class="headerlogo">ARHERELEE</a>
            
            <div>
                <ul id="navbar">
                    <li><a href="/database_project/beforelogin/home.php">HOME</a></li>
                    <li><a href="/database_project/beforelogin/shop.php">SHOP</a></li>
                    <!-- <li><a href="blog.php">BLOG</a></li> -->
                    <li><a href="/database_project/beforelogin/login.php">LOGIN NOW</a></li>
                    <li id="lg-bag"><a class="active" href="cart.php"><i class='bx bx-shopping-bag'></i></a></li>
                    <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.php"><i class='bx bx-shopping-bag'></i></a>
                <i id="bar" class="fas fa-outdent"></i>
                
            </div>
        </section>

        <section id="page-cart">
            
            <!-- <h2>AR-HERE-LEE</h2>
            
            <p>เอนจอยค้าบโผม</p> -->
            
        </section>
<!--Cart Item Detail-->
        <section id="cart" class="section-p1">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                        <td><img src="/database_project/img/products/burger.jpg" alt=""></td>
                        <td>Burger</td>
                        <td>79 บาท</td>
                        <td><input type="number" value="1"></td>
                        <td>79 บาท</td>
                    </tr>
                    <tr>
                        <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                        <td><img src="/database_project/img/products/burger.jpg" alt=""></td>
                        <td>Burger</td>
                        <td>79 บาท</td>
                        <td><input type="number" value="1"></td>
                        <td>79 บาท</td>
                    </tr>
                    <tr>
                        <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                        <td><img src="/database_project/img/products/burger.jpg" alt=""></td>
                        <td>Burger</td>
                        <td>79 บาท</td>
                        <td><input type="number" value="1"></td>
                        <td>79 บาท</td>
                    </tr>
                </tbody>
            </table>
        </section>
        
        <section id="card-add" class="section-p1">
            <div id="coupon">
                <h3>Apply Coupon</h3>
                <div>
                    <input type="text" placeholder="Enter Your Coupon">
                    <button class="normal">Apply</button>
                </div>
                <div class="halfpayhalforeder">
                    <div class="payment-method">
                        <h3>Payment Method</h3>
                        <div class="form-group">
					        <form>
						        <label for="paymethod">Type:</label>
						        <select id="paymethod" name="paymethod">
							        <option value="CREDIT">CARD</option>
							        <option value="DEBIT">CASH</option>
						        </select>
					        </form>
				        </div>
                    </div>
                    <div class="order-type">
                        <h3>Order Type</h3>
                        <div class="form-group">
					        <form>
						        <label for="ordertype">Type:</label>
						        <select id="ordertype" name="ordertype">
							        <option value="ONLINE">ONLINE</option>
							        <option value="ONSITE">ONSITE</option>
						        </select>
					        </form>
				        </div>
                    </div>
                </div>
            </div>

            <div id="subtotal">
                <h3>Cart Totals</h3>
                <table>
                    <tr>
                        <td>Cart Subtotal</td>
                        <td>335 บาท</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>335 บาท</strong></td>
                    </tr>
                </table>
                <button class="normal">Proceed to Checkout</button>
            </div>
        </section>

        <script src="/beforelogin/script.js"></script>
        <script src="https://kit.fontawesome.com/10876e5229.js" crossorigin="anonymous"></script>
    </body>

</html>
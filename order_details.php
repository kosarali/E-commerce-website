<?php 
include('server/connection.php');


if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

    $order_id = $_POST['order_id'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id=?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order_details = $stmt->get_result();

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    
</head>
<body>

    <section id="header">
    <div class="logo"><a href="index.php" id="headertext"><img src="./img/logo7.png" alt=""></a></div>
        

        <div>
            <ul id="navbar">
                <li><a  href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                <li><a class="active" href="login.php">Login</a></li>
                <a href="#" id="close"><i class="fas fa-window-close" style="color: #000000;"></i></a>
            </ul>
        </div>

        <div id="mobile">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="cart" class="section-p1">
        <h3 style="text-align: center;">Your orders</h3>
        <table width="100%">
            <thead>
                <tr>
                    <td>Product Name</td>
                    <td>Product Image</td>
                    <td>Product price</td>
                    <td>Product Quantity</td>
                    
                </tr>
            </thead>
            <tbody>
                <?php while($row = $order_details->fetch_assoc()){ ?> 
                <tr>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><img src="assets/img/<?php echo $row['product_image']; ?>"></td>
                    <td><?php echo $row['product_price']; ?></td>
                    <td><?php echo $row['product_quantity']; ?></td>

                    
                </tr>
               
                <?php } ?>
            </tbody>
            
        </table>
    </section>


    <footer class="section-p1">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address</strong> : Demo</p>
            <p><strong>Phone</strong> : Demo</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="about.php">About us</a>
            <a href="privacy.php">Privacy Policy</a>
            <a href="terms.php">Terms & condition</a>
            <a href="contact.php">Contact us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="signup.php">Sign In</a>
            <a href="cart.php">View Cart</a>
            <a href="contact.php">Help</a>
        </div>
    </footer>

    
    <script src="assets/js/script.js"></script>
</body>
</html>
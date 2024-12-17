<?php   

session_start();
include('server/connection.php');

if(isset($_SESSION['logged_in'])){
   
}

if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location: login.php');
        exit;
    }
}

//get orders

if(isset($_SESSION['logged_in'])){

    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");

    $stmt->bind_param('i', $user_id);

    $stmt->execute();

    $orders = $stmt->get_result();



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
    <a href="index.php" id="headertext" class="logo"><img src="./img/logo7.png" alt=""></a>

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
            <a href="cart.php"><i class="fas fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    
    <div class="accInfo" id="account-info"> 
         <p style="color:green; text-align:center "><?php if(isset($_GET['message'])){ echo $_GET['message'];} ?></p>    
        <h2 style="text-align: center;" >Account details</h2>
            <div>
                <p style="text-align: center; font-weight:bold">Name: <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?></span></p>
                <p style="text-align: center; font-weight:bold">Email: <span><?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} ?></span></p>
                
                <p style="text-align: center; font-weight:bold"><a href="account.php?logout=1" id="logout-btn" class="normal">Logout</a></p>
            </div>
    </div>

    <section id="cart" class="section-p1">
        <h3 style="text-align: center;">Your orders</h3>
        <table width="100%">
            <thead>
                <tr>
                    <td>Order ID</td>
                    <td>Order Cost</td>
                    <td>Order Status</td>
                    <td>Order Date</td>
                    <td>Order Details</td>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $orders->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['order_cost']; ?></td>
                    <td><?php echo $row['order_status']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>

                    <td>
                        <form method="POST" action="order_details.php">
                            <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id"/>
                            <input class="normal" type="submit" name="order_details_btn" value="Details"/>
                        </form>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
            
        </table>
    </section>






    <footer class="section-p1">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address</strong> : Vadodara</p>
            <p><strong>Phone</strong> : 8320353917</p>
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
            <a href="about.html">About us</a>
            <a href="privacy.html">Privacy Policy</a>
            <a href="terms.html">Terms & condition</a>
            <a href="contact.html">Contact us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="signup.html">Sign In</a>
            <a href="cart.html">View Cart</a>
            <a href="contact.html">Help</a>
        </div>
    </footer>



    <script src="assets/js/script.js"></script>
</body>
</html>
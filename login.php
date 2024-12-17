<?php

session_start();

include('server/connection.php');

if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password =$_POST['password'];

    $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password from users WHERE user_email = ? LIMIT 1");

    $stmt->bind_param('s', $email);

    if($stmt->execute()){
        $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
        $stmt->store_result();
        if($stmt->num_rows() == 1){
            $row = $stmt->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true;

            header('location: account.php?message=Logged in successfully');

        }else{
            header('location: login.php?error=Could not find your account');
        }

        
        }else{
        //error
        header('location: login.php?error=something went wrong');
    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>

    <section id="header">
        <a href="index.php" id="headertext" class="logo"><img src="./img/logo7.png" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a  href="shop.php">Shop</a></li>
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

    <section id="section-p1">

    </section>

    <section id="login-details">
            <form action="login.php" method="post">
            <p style="color: red" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
              <h2 style="font-weight:bold; font-size:35px">Login</h2>

              <input type="text" name="email" placeholder="Email" required style="font-weight:bold">
              <input type="password" name="password" placeholder="Password" required style="font-weight:bold">
              <button class="normal" name="login_btn">Login</button>
              <span style="font-weight:bold">Don't have an account? <a href="signup.php">Sign Up</a></span>
            </form>
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
            <a href="about.php">About us</a>
            <a href="privacy.php">Privacy Policy</a>
            <a href="terms.php">Terms & condition</a>
            <a href="contact.php">Contact us</a>
            <a href="admin/login.php">Admin Login</a>

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
<?php
session_start();

include('server/connection.php');

if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

if(isset($_POST['register'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $confirmPassword = $_POST['confirmPassword'];

   if($password !== $confirmPassword){
    header('location: signup.php?error=passwords do not match');
   

   }elseif(strlen($password) < 6){
    header('location: signup.php?error=password must be atleast 6 characters');
   
   }else{
        $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email=?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

                    //if there is user already register with this email
        if($num_rows != 0 ){
            header('location: signup.php?error=User with this email already exists');
        }else{
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)");
            $stmt->bind_param('sss', $name, $email, md5($password));

            if($stmt->execute()){
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location: account.php?register=You Signed-up Successfully');

            }else{
                header('location: signup.php?error= Could not create account at the moment');
            }

        }

                    

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

    <section id="sign-details">
      
        <form action="signup.php" method="post">
            <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
            <h2  style="font-weight:bold; font-size:35px">Signup</h2>
            <input type="text" name="name" placeholder="Full Name" required style="font-weight:bold">
            <input type="text" name="email" placeholder="E-mail" required style="font-weight:bold">
            <input type="password" name="password" placeholder="Password" required style="font-weight:bold">
            <input type="password" name="confirmPassword" placeholder="Confirm password" required style="font-weight:bold">
            <button class="normal" name="register" style="font-weight:bold">Sign up</button>
            <span style="font-weight:bold">Already have an account? <a href="login.php">Log in</a></span>
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
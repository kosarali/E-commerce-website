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

<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p style='color: green;'>Thank you for your feedback!</p>";
}
?>

    <section id="header">
        <a href="index.php" id="headertext" class="logo"><img src="./img/logo7.png" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a class="active" href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                <li><a href="login.php">Login</a></li>
                <a href="#" id="close"><i class="fas fa-window-close" style="color: #000000;"></i></a>
            </ul>
        </div>

        <div id="mobile">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>
    
    <section id="page-header">
        <h1 style="font-weight:bold; color:black;">#Contact</h1>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>Contact</span>
            <h2>Contact Details</h2>
            <h3>Office</h3>
            <div>
                <li>
                    <i class="fas fa-map-pin"></i>
                    <p>Alkapuri, Vadodata</p>
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    <p>E-shop@gmail.com</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>8320353917</p>
                </li>
            </div>
        </div>

        <section id="form-details">
            <form action="submit_feedback.php" method="POST">
                <span>#FEEDBACK</span>
                <h2>Send your Feedback</h2>
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <textarea name="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
                <button type="submit" class="normal">Submit</button>
            </form>
        </section>
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
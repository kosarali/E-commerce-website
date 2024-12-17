<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>
<body>

    <section id="header">
        <div class="logo"><a href="index.php" id="headertext"><img src="./img/logo7.png" alt=""></a></div>
        
        <!-- Search bar form that submits to search.php -->
        <div class="search-container">
            <form method="GET" action="search.php">
                <input type="text" class="search-input" name="query" placeholder="Search for Products, Brands and More" required>
                <!-- <button type="submit" class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button> -->
            </form>
        </div>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
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

    <!-- Carousel and product display section -->
    <section id="container11" class="section-p1">
        <div class="carousel-container">
            <div class="carousel">
                <div class="slide">
                    <img src="./img/Banner_3.jpg" alt="Image 1">
                </div>
                <div class="slide">
                    <img src="./img/Banner_4.jpg" alt="Image 2">
                </div>
                <div class="slide">
                    <img src="./img/Banner_7.jpg" alt="Image 3">
                </div>
            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </section>    

    <section id="product1" class="section-p1">
        <h2>Products</h2>
        <div class="pro-container">
            <?php include('server/get_product1.php'); ?>

            <?php while($row = $product1->fetch_assoc()){ ?>
                <div class="pro">
                    <a href="<?php echo "sproduct.php?product_id=". $row['product_id'];  ?>">
                        <img src="assets/img/<?php echo $row['product_image']; ?>" alt="">
                    </a>
                    <div class="des">
                        <h5><?php echo $row['product_name']; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $row['product_price']; ?></h4>
                    </div>
                    <a href="<?php echo "sproduct.php?product_id=". $row['product_id'];  ?>"><i class="fas fa-shopping-cart cart"></i></a>
                </div>
            <?php } ?>
        </div>
    </section>


    <section id="product1" class="section-p1">
        <h2>Premium Products</h2>
        <div class="pro-container">

        <?php  include('server/get_premium.php');   ?>

        <?php while($row = $premium->fetch_assoc()){ ?>

            <div class="pro">
            <a href="<?php echo "sproduct.php?product_id=". $row['product_id'];  ?>">
                <img src="assets/img/<?php echo $row['product_image']; ?>" alt="" >
            </a>    
                <div class="des">
                    
                    <h5><?php echo $row['product_name']   ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₹<?php echo $row['product_price'];   ?></h4>
                </div>
                <a href="<?php echo "sproduct.php?product_id=". $row['product_id'];  ?>"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <?php  } ?>
        </div>
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
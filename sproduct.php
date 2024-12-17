<?php

include('server/connection.php');

if(isset($_GET['product_id'])){


   $product_id = $_GET['product_id']; 

    $stmt = $conn->prepare("Select * From products WHERE product_id = ? ");
    $stmt->bind_param("i",$product_id);

    $stmt->execute();

    $product = $stmt->get_result();

    //no product id was given
}else{

    header('location: index.php');
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
                <li><a href="index.php">Home</a></li>
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
    <!-- image call-->
    <section id="prodetails" class="section-p1">

    <?php while($row = $product->fetch_assoc()) { ?>
        <div class="single-pro-image">
            <img src="assets/img/<?php echo $row['product_image']; ?>" alt="" width="100%" id="MainImg">
        </div>
      

        <div class="single-product-details">
            <h4><?php echo $row['product_name']; ?></h4>
            <h2>₹<?php echo $row['product_price']; ?></h2>

            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />

                <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />

                <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />

                <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />

                <input type="number" name="product_quantity" value="1" min="1" max="10">

                  <!-- Size Dropdown -->
                  <!-- <label for="product_size">Size:</label>
                    <select name="product_size" required>
                        <option value="" disabled selected>Select Size</option>
                        <option value="S">Small</option>
                        <option value="M">Medium</option>
                        <option value="L">Large</option>
                        <option value="XL">Extra Large</option>
                    </select> -->
                <!-- End Size Dropdown -->

                <button class="normal" type="submit" name="add_to_cart">Add To Cart</button>

            </form>

            <h4>Product Deatils</h4>
            <span><?php echo $row['product_description']; ?></span>
        </div>  
        <?php } ?>
    </section>

    <section id="product1" class="section-p1">
        <h2>MORE PRODUCTS</h2>
        <div class="pro-container">

        <?php  include('server/get_popular_sproduct.php');   ?>

        <?php while($row = $product1->fetch_assoc()){ ?>
            <div class="pro">

                <a href="<?php echo "sproduct.php?product_id=". $row['product_id'];  ?>">
                    <img src="assets/img/<?php echo $row['product_image']; ?>" alt="" >
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
                    <h4>₹<?php echo $row['product_price'];   ?></h4>
                </div>
                <a href="<?php echo "sproduct.php?product_id=". $row['product_id'];  ?>"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
           
            <?php } ?>
            
        </div>
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
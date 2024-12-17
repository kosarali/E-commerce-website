<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    



    
</head>
<body>

    <section id="header">
        <a href="index.php" id="headertext" class="logo"><img src="./img/logo7.png" alt=""></a>

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
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
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

    <section id="dropdown" class="section-p1">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" style="background-color: #088178;" aria-expanded="false; border:none;">
              Select Category
            </button>
            <ul class="dropdown-menu">
              <li><a href="#product1" class="dropdown-item" type="button">Books</a></li>
              <li><a href="#product2" class="dropdown-item" type="button">T-Shirt</a></li>
              <li><a href="#product3" class="dropdown-item" type="button">Shirt</a></li>
              <li><a href="#product4" class="dropdown-item" type="button">Watches</a></li>
            </ul>
          </div>
    </section>
<!-- Vadodara -->
    <section id="product1" class="section-p1">
        <h2 id="vadodara">Books</h2>

        <div class="pro-container">

            <?php  include('server/get_Books_products.php');   ?>

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
<!-- Surat products -->
    <section id="product2" class="section-p1">
        <h2 id="T-Shirt">T-Shirt</h2>
        <div class="pro-container">

            <?php  include('server/get_T-Shirt_products.php');   ?>

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
    

<!-- Ahmedabad products -->
    <section id="product3" class="section-p1">
        <h2 id="ahmedabad">Shirt</h2>
        <div class="pro-container">
        <?php  include('server/get_Shirt_products.php');   ?>

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
<!-- Rajkot -->
    <section id="product4" class="section-p1">
        <h2 id="rajkot">Watches</h2>
        <div class="pro-container">
        <?php  include('server/get_Watches_products.php');   ?>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
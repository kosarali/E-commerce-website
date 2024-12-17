<?php


session_start();

if(isset($_POST['add_to_cart'])){


    //if user has already added a product to cart
    if(isset($_SESSION['cart'])){

        $product_array_ids = array_column($_SESSION['cart'],"product_id"); 
        //it will check if product already has been added to cart or not
        if( !in_array($_POST['product_id'], $product_array_ids) ){

            $product_array = array(
                                'product_id' => $_POST['product_id'],
                                'product_name' => $_POST['product_name'],
                                'product_price' => $_POST['product_price'],
                                'product_image' => $_POST['product_image'],
                                'product_quantity' => $_POST['product_quantity']
            );

            $_SESSION['cart'][$product_array['product_id']] = $product_array;



        //product has been already added
        }else{

            echo '<script>alert("Product was already to cart"); </script>';
            
        }


        //if this is the first product
    }else{

      $product_id = $_POST['product_id'];   
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image']; 
      $product_quantity = $_POST['product_quantity']; 

      $product_array = array(
                        'product_id' => $product_id,
                        'product_name' => $product_name,
                        'product_price' => $product_price,
                        'product_image' => $product_image,
                        'product_quantity' => $product_quantity
      );

      $_SESSION['cart'][$product_id] = $product_array;
      // every product array($product_array) is added it is assigned a unique id which is $product_id

    }

    //calculate total
    calculateTotalCart();


    //remove product from cart
}elseif(isset($_POST['remove_product'])){

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    //calculate total
    calculateTotalCart();

}elseif(isset($_POST['edit_quantity'])){
    
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    $product_array = $_SESSION['cart'][$product_id];

    $product_array['product_quantity'] = $product_quantity;

    $_SESSION['cart'][$product_id] = $product_array;

    //calculate total
    calculateTotalCart();

}else{
   // echo "Your cart is empty.";
}

function calculateTotalCart(){
    $total = 0;

    foreach($_SESSION['cart'] as $key => $value){
          $product = $_SESSION['cart'][$key];

          $price = $product['product_price'];
          $quantity = $product['product_quantity'];

          $total = $total + ($price * $quantity);
    }

    $_SESSION['total'] = $total;
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
                <li><a href="index.php">Home</a></li>
                <li><a  href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a class="active" href="./img/cart.jpg"><i class="fas fa-shopping-cart"></i></a></li>
                <li><a href="login.php">Login</a></li>
                <a href="#" id="close"><i class="fas fa-window-close" style="color: #000000;"></i></a>
            </ul>
        </div>

        <div id="mobile">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>
    
    <div class="banner-container">
        <div class="banner-content">
            <img src="./img/Banner_6.jpg" alt="Shopping cart with bags" class="banner-image">
        </div>
    </div>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>

                <?php foreach($_SESSION['cart'] as $key => $value){ ?>

                <tr>
                    <td>
                        <form method="POST" action="cart.php">
                        
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                            <button type="submit" class="normal" name="remove_product" value="remove">remove</button>
                        
                        </form>
                    </td>

                    <td><img src="assets/img/<?php echo $value['product_image']; ?>" alt=""></td>
                    <td><?php echo $value['product_name']; ?></td>
                    <td>₹<?php echo $value['product_price']; ?></td>

                    <td>
                        
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>" min="1" max="10">
                                <input type="submit" class="normal" name="edit_quantity" value="Edit">
                            </form>
                    </td>
                    
                    <td>₹<?php echo $value['product_quantity'] * $value['product_price']; ?></td>
                </tr>

                <?php } ?>      

            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        
        
        <div id="subtotal">
            <h3>Total Amount</h3>
            <table>
                <tr>
                    <td>Product Amount</td>
                    <td>₹<?php echo $_SESSION['total']; ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td>₹<?php echo $_SESSION['total']; ?></td>
                </tr>
            </table>
            <form method="post" action="checkout.php">
                <button class="normal" name="checkout">Checkout</button>          
            </form>
            
            
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
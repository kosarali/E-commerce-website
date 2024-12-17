<?php
session_start();
$apiKey = "rzp_test_rJ3y9UhdxOAO6h"; // Test API Key

if (!empty($_SESSION['cart']) && isset($_POST['checkout'])) {
    // Ensure the total amount is calculated and available
    $totalAmount = $_SESSION['total'] * 100; // Convert to subunits (paise)
} else {
    header('location: index.php');
    exit;
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
        </ul>
    </div>
</section>

<section id="form-details">
    <p style="color:green; text-align:center;"><?php if (isset($_GET['message'])) { echo $_GET['message']; } ?></p>
    <form action="server/place_order.php" method="post">
        <span>Order Form</span>
        <h2>Customer Details</h2>
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="phone" placeholder="Contact" required>
        <input type="email" name="email" placeholder="Email" required>

        <h2>Delivery Details</h2>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="city" placeholder="City" required>
        <input type="text" name="pincode" placeholder="Pincode" required>
        <p style="font-weight: bold;">Total Amount: ₹<?php echo $_SESSION['total']; ?></p>
        <input type="hidden" name="amount" value="<?php echo $_SESSION['total']; ?>">

        <button name="place_order" class="normal">Place Order/ COD</button>
    </form>

    <form action="checkout.php" method="POST" class="normal" id="razorpay-form">
        <input type="hidden" name="amount" value="<?php echo $_SESSION['total']; ?>">
        <input type="hidden" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
        <input type="hidden" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">

        <!-- Custom button to trigger Razorpay -->
        <button type="button" class="pay-button" id="pay-button">
            Pay with Razorpay
        </button>

        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            document.getElementById('pay-button').onclick = function(e) {
                e.preventDefault();
                var options = {
                    "key": "<?php echo $apiKey; ?>", // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
                    "amount": "<?php echo $totalAmount; ?>", // Amount is in currency subunits (paise).
                    "currency": "INR",
                    "name": "E-Shopping",
                    "description": "A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami",
                    "image": "https://example.com/your_logo.jpg",
                    "handler": function(response) {
                        if (response.error) {
                            alert("Payment Error: " + response.error.description);
                        } else {
                            // Handle successful payment here
                            alert("Payment ID: " + response.razorpay_payment_id);
                            // Optionally, you can redirect to a success page or update the order status
                        }
                    },
                    "prefill": {
                        "name": "<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>",
                        "email": "<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>",
                        "contact": "<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"
                    },
                    "theme": {
                        "color": "#F37254"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            };
        </script>
    </form>

</section>

<footer class="section-p1">
    <div class="col">
        <h4>Contact</h4>
        <p><strong>Address</strong> : Vadodara</p>
        <p><strong>Phone</strong> : 8320353917</p>
    </div>
    <div class="col">
        <h4>About</h4>
        <a href="about.php">About us</a>
        <a href="privacy.php">Privacy Policy</a>
        <a href="terms.php">Terms & condition</a>
        <a href="contact.php">Contact us</a>
    </div>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>

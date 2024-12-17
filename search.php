<?php
include('server/connection.php'); // Ensure this connects to your MySQL database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>
<body>

    <!-- Header Section -->
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

    <!-- Search Results Section -->
    <section id="product1" class="section-p1">
        <?php
        if (isset($_GET['query'])) {
            $search_query = mysqli_real_escape_string($conn, $_GET['query']); // Sanitize user input

            // SQL query to search in product_name, product_category, and Category
            $sql = "SELECT * FROM products WHERE product_name LIKE ? OR product_category LIKE ? OR Category LIKE ?";
            $search_term = "%" . $search_query . "%"; // Add wildcards for partial matches

            // Prepare the SQL statement
            $stmt = $conn->prepare($sql);
            
           // if (!$stmt) {
                // Display error if query preparation fails
               // echo "<h4>Error preparing statement: " . $conn->error . "</h4>";
           // } else {
                // Debug output
               // echo "<h4>SQL Query prepared successfully.</h4>";

                // Bind parameters and execute the query
                $stmt->bind_param("sss", $search_term, $search_term, $search_term);
                $stmt->execute();
                $result = $stmt->get_result();

                echo "<h2>Search Results for '" . htmlspecialchars($search_query) . "':</h2>";

                if ($result->num_rows > 0) {
                    echo "<div class='pro-container'>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='pro'>";
                        echo "<a href='sproduct.php?product_id=" . $row['product_id'] . "'>";
                        echo "<img src='assets/img/" . htmlspecialchars($row['product_image']) . "' alt=''>";
                        echo "</a>";
                        echo "<div class='des'>";
                        echo "<h5>" . htmlspecialchars($row['product_name']) . "</h5>";
                        echo "<div class='star'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                            </div>";
                        echo "<h4>₹" . htmlspecialchars($row['product_price']) . "</h4>";
                        echo "</div>";
                        echo "<a href='sproduct.php?product_id=" . $row['product_id'] . "'><i class='fas fa-shopping-cart cart'></i></a>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "<h4>No products found for '" . htmlspecialchars($search_query) . "'</h4>";
                }
                $stmt->close();
            }
         else {
            echo "<h2>Please enter a search term.</h2>";
        }
        ?>
    </section>

    <!-- Footer Section -->
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
<?php 
include('include/header.php'); 
include('../server/connection.php'); 

if(isset($_POST['create_product'])) {
    // Sanitize input
    $product_name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_category = mysqli_real_escape_string($conn, $_POST['category']);
    $product_description = mysqli_real_escape_string($conn, $_POST['description']);
    $product_price = mysqli_real_escape_string($conn, $_POST['price']);
    $product_location = mysqli_real_escape_string($conn, $_POST['location']);

    // Check if an image has been uploaded
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name']; // Get image file name
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION); // Get file extension
        $new_image_name = uniqid() . '.' . $image_extension; // Generate unique file name

        // Validate image file type
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if(in_array(strtolower($image_extension), $allowed_extensions)) {
            // Move uploaded file to assets/img folder
            $upload_dir = '../assets/img/';
            if(move_uploaded_file($image, $upload_dir . $new_image_name)) {
                // Insert product details into the database
                $stmt = $conn->prepare("INSERT INTO products (product_name, product_category, product_description, product_image, product_price, Category) 
                                        VALUES(?,?,?,?,?,?)"); 
                $stmt->bind_param('ssssss', $product_name, $product_category, $product_description, $new_image_name, $product_price, $product_location);

                if($stmt->execute()) {
                  //  header('location: products.php?product_created=Product has been created successfully');
                } else {
                    header('location: products.php?product_created=Error Occurred');
                }
            } else {
                echo "Failed to upload the image.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
    } else {
        echo "No image uploaded or there was an error uploading the file.";
    }
}
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Products</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="add_products.php" enctype="multipart/form-data"> <!-- Added enctype -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Enter Product Name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Category</label>
                                <input type="text" name="category" placeholder="Enter Product Category" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter Product Description" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="formFile" class="form-label">Choose Product Image</label>
                                <input class="form-control" name="image" type="file" id="formFile" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Price</label>
                                <input type="number" name="price" placeholder="Enter Product Price" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Location</label>
                                <input type="text" name="location" placeholder="Enter Location" class="form-control" required>
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="submit" name="create_product" value="ADD Product" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php');?>
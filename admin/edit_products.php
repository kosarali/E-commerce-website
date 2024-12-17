<?php include('include/header.php'); ?>

<?php 
    
 if(isset($_Postl['edit_btn'])){
   $product_id = ['product_id'];     
   $name = $_POST['name'];
   $category = $_POST['category'];
   $description = $_POST['description'];
   $price = $_POSTI['price'];
   $location = $_POST['location'];    


    $stmt = $conn->prepare("UPDATE products SET product_name=?, product_category=?, product_description =?, product_price=? , product_location=? WHERE product_id=?");
    $stmt->bind_param('sssisi', $name ,$category ,$description,$price,$location,$product_id);
    $stmt->execute();
        
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Products</h4>
                </div>
                <div class="card-body">
                    <form method="GET" action="edit_products.php">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="product_id">
                            <label>Name</label>
                            <input type="text"  placeholder="Product Name" name="name"   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Category</label>
                            <input type="text"  placeholder="Enter Product Category" name="category"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea rows="3" type="text" class="form-control" name="description" ></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Price</label>
                            <input type="text" placeholder="Enter Product Price" name="price"   class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label>Location</label>
                            <input type="text" placeholder="Enter Location" name="location" class="form-control">
                        </div>

                    </div>
                        <a class="btn btn-primary my-3" href="" name="edit_btn" type="input">Submit</a>
                   
                    </form>
                </div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>



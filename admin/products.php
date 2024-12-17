<?php include('include/header.php'); ?>
<?php 

  $stmt = $conn->prepare("SELECT * FROM products");
  $stmt->execute();
  $products = $stmt->get_result();

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <div class="container">
            <div class="row">

              <div class="col-sm-10">
                <h3>Product Details</h3>
              </div>

              <div class="col-sm-2">
                <a class="btn btn-primary" href="add_products.php" type="input">Add Product</a>
                <!-- <a class="btn btn-primary" href="edit_products.php" type="input">Edit Product</a> -->
              </div>

            </div>
          </div>

        </div>

        <div class="card-body">
          <table class="table mb-3">
            <thead>
              <tr>
                <th class="text-center">I.D</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Category Name</th>
                <th class="text-center">Product Image</th>
                <th class="text-center">Product Price</th>
                <th class="text-center">Product location</th>
               
              </tr>
            </thead>
            <tbody>
            <?php foreach($products as $product){ ?>
              <tr>
                <td class="text-center"><?php echo $product['product_id']; ?></td>
                <td class="text-center"><?php echo $product['product_name']; ?> </td>
                <td class="text-center"><?php echo $product['product_category']; ?></td>
                <td class="text-center"><img src="<?php echo "../assets/img/". $product['product_image']; ?>" style="width: 70px; height:70px"> </td>
                <td class="text-center"><?php echo $product['product_price']; ?></td>
                <td class="text-center"><?php echo $product['Category']; ?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('include/footer.php'); ?>
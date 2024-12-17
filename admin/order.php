<?php include('include/header.php'); ?>
<?php 

  $stmt = $conn->prepare("SELECT * FROM orders");
  $stmt->execute();
  $orders = $stmt->get_result();

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Order List</h3>
                </div>

                <div class="order-body">
                <table class="table mb-3">
            <thead>
              <tr>
                <th class="text-center">Order ID</th>
                <th class="text-center">Order Status</th>
                <th class="text-center">User ID</th>
                <th class="text-center">Order Date</th>
                <th class="text-center">User Phone</th>
                <th class="text-center">User Address</th>
                <th class="text-center">User pincode</th>

                
               
              </tr>
            </thead>
            <tbody>
            <?php foreach($orders as $order){ ?>
                <tr>
                    <td class="text-center"><?php echo $order['order_id']; ?></td>
                    <td class="text-center"><?php echo $order['order_status']; ?></td>
                    <td class="text-center"><?php echo $order['user_id']; ?></td>
                    <td class="text-center"><?php echo $order['order_date']; ?></td>
                    <td class="text-center"><?php echo $order['user_phone']; ?></td>
                    <td class="text-center"><?php echo $order['user_address']; ?></td>
                    <td class="text-center"><?php echo $order['user_pincode']; ?></td>
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
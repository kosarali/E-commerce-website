<?php include('include/header.php'); ?>
<?php 

  $stmt = $conn->prepare("SELECT * FROM users");
  $stmt->execute();
  $users = $stmt->get_result();

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>User Details</h3>

          <div>
            <table class="table ">
              <thead>
                <tr>
                  <th class="text-center">I.D</th>
                  <th class="text-center">Username </th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Registration Time</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php foreach($users as $user){ ?>
                <tr>
                  <td class="text-center"><?php echo $user['user_id']; ?></td>
                  <td class="text-center"><?php echo $user['user_name']; ?> </td>
                  <td class="text-center"><?php echo $user['user_email']; ?></td>
                  <td class="text-center"><?php echo $user['user_date']; ?></td>
                  
                  
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('include/footer.php'); ?>
<?php

include('connection.php');


$stmt = $conn->prepare("Select * From products WHERE product_category = 'popular' LIMIT 8 ");

$stmt->execute();

$product1 = $stmt->get_result();


?>
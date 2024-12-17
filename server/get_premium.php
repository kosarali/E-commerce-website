<?php

include('connection.php');


$stmt = $conn->prepare("Select * From products WHERE product_category = 'premium' LIMIT 8 ");

$stmt->execute();

$premium = $stmt->get_result();


?>
<?php

include('connection.php');


$stmt = $conn->prepare("Select * From products WHERE Category = 'Shirt' LIMIT 4 ");

$stmt->execute();

$product1 = $stmt->get_result();


?>
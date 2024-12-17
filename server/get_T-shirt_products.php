<?php

include('connection.php');


$stmt = $conn->prepare("Select * From products WHERE Category= 'T-shirt' LIMIT 4 ");

$stmt->execute();

$product1 = $stmt->get_result();


?>
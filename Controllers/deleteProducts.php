<?php
require '../Repositories/ProductRepository.php';
$productIDs = $_POST['productIDs'];
$productRepo = new ProductRepository();
echo json_encode($productRepo->deleteProducts($productIDs));

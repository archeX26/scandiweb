<?php

require '../Repositories/ProductRepository.php';




$productRepo = new ProductRepository();

echo json_encode($productRepo -> getAllProducts());

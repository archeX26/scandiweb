<?php

require '../Repositories/ProductRepository.php';

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$productType = $_POST['productType'];
$size = $_POST['size'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];
$weight = $_POST['weight'];

$info = array('status' => 'ok');
$productObj = new Product(null, $sku, $name, (float) $price, $productType,(float) $size, (float)$weight, (float)$height, (float)$width, (float)$length);

$productRepo = new ProductRepository();
if ($productRepo->checkSKU($sku)) {
    $res = $productRepo->saveProduct($productObj);
    $info['status'] = $res;
} else {
    $info['status'] = 'error';
    $info['message'] = 'duplicate_sku';
}
echo json_encode($info);

//$temporary = array('sku' => $sku, 'name' => $name, 'price' => $price, 'productType' => $productType,
//                   'size' => $size, 'height' => $height, 'width' => $width, 'length' => $length, 'weight' => $weight);
//
//echo json_encode($temporary);

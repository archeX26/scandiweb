<?php

interface IProduct
{
    //checks whether sku is unique or not
    public function checkSKU($sku);

    //saves product in database
    public function saveProduct($productObj);

    public function getAllProducts();

    //delete products
    public function deleteProducts($productIDs);


}
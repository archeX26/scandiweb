<?php

require '../Interfaces/IProduct.php';
require '../Controllers/DatabaseUtils.php';
require '../Models/Product.php';

class ProductRepository implements IProduct
{

    public function checkSKU($sku)
    {
        $dbOBJ = new DatabaseUtils();
        $handler = $dbOBJ->connect();
        $count = 0;

        try {
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $queryString = 'select count(SKU) from product where SKU = :sku';
            $statement = $handler->prepare($queryString);
            $statement->bindParam(':sku', $sku, PDO::PARAM_STR);
            $statement->execute();
            $count = (int)$statement->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $count == 0;
    }

    public function saveProduct($productObj)
    {
        $dbOBJ = new DatabaseUtils();
        $handler = $dbOBJ->connect();

        try {
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $queryString = 'insert into product(SKU, Name, Price, Type, MB, KG, Height, Width, Length)
                            values (:sku, :name, :price, :productType, :size, :weight, :height, :width, :length)';
            $statement = $handler->prepare($queryString);
            $statement->bindValue(':sku', $productObj->getSKU(), PDO::PARAM_STR);
            $statement->bindValue(':name', $productObj->getName(), PDO::PARAM_STR);
            $statement->bindValue(':price', $productObj->getPrice(), PDO::PARAM_STR);
            $statement->bindValue(':productType', $productObj->getType(), PDO::PARAM_STR);
            $statement->bindValue(':size', $productObj->getMB(), ($productObj->getMB() != null) ? PDO::PARAM_STR : PDO::PARAM_NULL);
            $statement->bindValue(':weight', $productObj->getKG(), ($productObj->getKG() != null) ? PDO::PARAM_STR : PDO::PARAM_NULL);
            $statement->bindValue(':height', $productObj->getHeight(), ($productObj->getHeight() != null) ? PDO::PARAM_STR : PDO::PARAM_NULL);
            $statement->bindValue(':width', $productObj->getWidth(), ($productObj->getWidth() != null) ? PDO::PARAM_STR : PDO::PARAM_NULL);
            $statement->bindValue(':length', $productObj->getLength(), ($productObj->getLength() != null) ? PDO::PARAM_STR : PDO::PARAM_NULL);

            $statement->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return 'error';
        }
        return 'success';
    }

    public function getAllProducts()
    {
        // TODO: Implement getAllProducts() method.
        $dbOBJ = new DatabaseUtils();
        $handler = $dbOBJ->connect();
        $info = array();

        $cont = [];

        try {
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $queryString = 'select ID, SKU, Name, Price, Type, MB, KG, Height, Width, Length from product';
            $statement = $handler->query($queryString);
            $statement->setFetchMode(PDO::FETCH_OBJ);
            while ($row = $statement->fetch()) {
                $cont[] = $row;
            }
            $info['status'] = 'success';
            $info['data'] = $cont;


        } catch (PDOException $e) {
            //echo $e->getMessage();
            $info['status'] = 'error';
            $info['message'] = $e->getMessage();
        }
        return $info;
    }

    public function deleteProducts($productIDs)
    {
        // TODO: Implement deleteProducts() method.
        $dbOBJ = new DatabaseUtils();
        $handler = $dbOBJ->connect();
        $info = array();
        try{
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $queryString = 'delete from product where ID in ('.implode(', ',$productIDs).')';
            $statement = $handler ->prepare($queryString);
            $statement -> execute();
            $info['status'] = 'success';
            $info['rowCount'] = $statement->rowCount();

        } catch (PDOException $e) {
            //echo $e->getMessage();
            $info['status'] = 'error';
            $info['message'] = $e->getMessage();
        }
        return $info;

    }
}
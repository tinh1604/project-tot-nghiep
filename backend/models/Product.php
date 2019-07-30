<?php
require_once 'models/Model.php';

class Product extends Model
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;


    public function getAll()
    {
        $connection = $this->openConnection();
        $querySelect = "SELECT * FROM product {$this->querySearch} LIMIT {$this->startpoint}, {$this->per_page}";
        $result = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $product;
    }

    public function insert($product)
    {
        $connection = $this->openConnection();
        $queryInsert = "INSERT INTO product(`name`, `english_name`, `img`, `price`, `description`, `status`)
    VALUES('{$product['name']}',
    '{$product['english_name']}',
    '{$product['img']}',
    '{$product['price']}',
    '{$product['description']}',
    '{$product['status']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeConnection($connection);
        return $isInsert;
    }

    public function update($product)
    {
        $connection = $this->openConnection();
        $queryUpdate = "UPDATE product SET 
                        `name` = '{$product['name']}', 
                        `english_name` = '{$product['english_name']}',
                        `img` = '{$product['img']}',
                        `price` = '{$product['price']}',
                        `description` = '{$product['description']}',
                        `status` = '{$product['status']}'
                        WHERE id = '{$product['id']}'";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        mysqli_close($connection);
        if($isUpdate){
            return true;
        }
        else{
            return false;
        }
    }
    public function getByID($id){
        $connection = $this->openConnection();
        $queryProduct = "SELECT * FROM product WHERE id = $id";
        $result = mysqli_query($connection, $queryProduct);
        $product = [];
        if(mysqli_num_rows($result)>0){
            $product = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $product = $product[0];
        }
        mysqli_close($connection);
        return $product;

    }
    public function delete($id){
        $connection = $this->openConnection();
        $queryDelete = "DELETE FROM product WHERE id = $id";
        $isDelete = mysqli_query($connection, $queryDelete);
        mysqli_close($connection);
        if($isDelete){
            return true;
        }
        else{
            return false;
        }
    }


}

?>
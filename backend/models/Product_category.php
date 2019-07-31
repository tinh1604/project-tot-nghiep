<?php
require_once 'models/Model.php';

class Product_category extends Model
{
  const STATUS_ENABLED = 1;
  const STATUS_DISABLED = 0;

    public function getAll()
    {
        $connection = $this->openConnection();
        $querySelect = "SELECT * FROM product_category";
        $results = mysqli_query($connection, $querySelect);
        $product_category = [];
        if (mysqli_num_rows($results) > 0) {
            $product_category = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);

        return $product_category;
    }

  public function insert($product_category)
  {
    $connection = $this->openConnection();
    $queryInsert = "INSERT INTO product_category
              (`name`,`description`, `status`)
        VALUES('{$product_category['name']}', 
        '{$product_category['description']}', 
        {$product_category['status']})";
    $isInsert = mysqli_query($connection, $queryInsert);
    $this->closeConnection($connection);

    return $isInsert;
  }

  public function delete($id)
  {
    $connection = $this->openConnection();
    $queryDelete = "DELETE FROM product_category WHERE id=$id";
    $isDelete = mysqli_query($connection, $queryDelete);
    $this->closeConnection($connection);
    //Chú ý, khi xóa dữ liệu ở bảng category, cần xóa các dữ liệu liên quan đến category bị xóa
//      tại bảng news
    $queryDeleteNews = "DELETE FROM product WHERE product_category_id = $id";
    mysqli_query($connection, $queryDeleteNews);

    return $isDelete;
  }

  public function getById($id)
  {
    $connection = $this->openConnection();
    $querySelect = "SELECT * FROM product_category WHERE id = $id";
    $results = mysqli_query($connection, $querySelect);
      $product_category = [];
    if (mysqli_num_rows($results) == 1) {
        $product_category = mysqli_fetch_all($results,
        MYSQLI_ASSOC);
        $product_category = $product_category[0];
    }
    return $product_category;
  }

  public function update($product_category = [])
  {
    $connection = $this->openConnection();
    $queryUpdate = "UPDATE product_category 
        SET `name` = '{$product_category["name"]}',
            `description` = '{$product_category["description"]}',
            `status` = {$product_category["status"]}
        WHERE `id` = {$product_category['id']}";
    $isUpdate = mysqli_query($connection, $queryUpdate);
    $this->closeConnection($connection);
    return $isUpdate;
  }

}
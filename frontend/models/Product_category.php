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


}
<?php
require_once 'models/Model.php';

class Product extends Model
{
    const HIGHLIGHT_ENABLED = 1;
    const HIGHLIGHT_DISABLED = 0;

    /**
     * Lấy dữ liệu có phân trang
     * @param array $arrSearch Mảng các từ khóa search nếu có
     * @return array|null
     */
    public function getAll()
    {

        $connection = $this->openConnection();
        $querySelect = "SELECT product.*, product_category.name as product_category_name FROM product
                    INNER JOIN product_category ON product_category.id = product.product_category_id 
                                        {$this->querySearch}  
                                       LIMIT {$this->startpoint}, {$this->per_page}
 ";
        $result = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $product;
    }

    public function get_highlight_product()
    {

        $connection = $this->openConnection();
        $querySelect = "SELECT product.*, product_category.name as product_category_name FROM product
                    INNER JOIN product_category ON product_category.id = product.product_category_id 
                    WHERE product.highlight = '1'
 ";
        $result = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $product;
    }


    public function get_lunch_food()
    {
        $connection = $this->openConnection();
        $querySelect = "SELECT product.*, product_category.name as product_category_name FROM product
                    INNER JOIN product_category ON product_category.id = product.product_category_id 
                    WHERE product.product_category_id = '2'
                    LIMIT {$this->startpoint}, {$this->per_page}
                    ";
        $result = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $product;
    }

    public function get_breakfast_food()
    {

        $connection = $this->openConnection();
        $querySelect = "SELECT product.*, product_category.name as product_category_name FROM product
                    INNER JOIN product_category ON product_category.id = product.product_category_id 
                    WHERE product.product_category_id = '1'
                    LIMIT {$this->startpoint}, {$this->per_page}

                    ";
        $result = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $product;
    }

    public function get_drink()
    {
        $connection = $this->openConnection();
        $querySelect = "SELECT product.*, product_category.name as product_category_name FROM product
                    INNER JOIN product_category ON product_category.id = product.product_category_id 
                    WHERE product.product_category_id = '3'
                    LIMIT {$this->startpoint}, {$this->per_page}
                    ";
        $result = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $product;
    }

    public function get_booze()
    {
        $connection = $this->openConnection();
        $querySelect = "SELECT product.*, product_category.name as product_category_name FROM product
                    INNER JOIN product_category ON product_category.id = product.product_category_id 
                    WHERE product.product_category_id = '4'
                    LIMIT {$this->startpoint}, {$this->per_page}
                    ";
        $result = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $product;
    }

    public function getById($id)
    {
        $connection = $this->openConnection();
        //do bảng products có các khóa ngoại nên cần join các bảng liên quan để lấy các thông tin cần thiết
        $querySelect = "SELECT product.*, product_category.name as product_category_name FROM product
                    INNER JOIN product_category ON product_category.id = product.product_category_id 
                    WHERE product.id = '$id'
                    ";

        $results = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($results) == 1) {
            $products = mysqli_fetch_all($results,
                MYSQLI_ASSOC);
            $product = $products[0];
        }
        $this->closeConnection($connection);
        return $product;
    }

    public function getProductCartById($id)
    {
        $connection = $this->openConnection();
        $querySelect = "
        SELECT id, name, price, avatar FROM products
        WHERE id = $id";

        $results = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($results) == 1) {
            $products = mysqli_fetch_all($results,
                MYSQLI_ASSOC);
            $product = $products[0];
        }
        $this->closeConnection($connection);
        return $product;
    }
    public function related_products($id)
    {
        $connection = $this->openConnection();
        $querySelect = "SELECT * FROM product WHERE id > $id AND id < $id+5";
        $results = mysqli_query($connection, $querySelect);
        $related_products = [];
        if (mysqli_num_rows($results) > 0) {
            $related_products = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $related_products;
    }

}
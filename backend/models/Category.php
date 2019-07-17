<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 7/12/2019
 * Time: 9:11 PM
 */
require_once 'models/Model.php';
class Category extends Model
{
    public function getAll() {
        $connection = $this->openConnection();
        $querySelect = "SELECT * FROM categories";
        $results = mysqli_query($connection, $querySelect);
        $categories = [];
        if(mysqli_num_rows($results) > 0) {
            $categories = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        return $categories;
    }
}
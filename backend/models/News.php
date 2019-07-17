<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 7/12/2019
 * Time: 9:11 PM
 */
require_once 'models/Model.php';
class News extends Model
{
    public function getAll() {
        $connection = $this->openConnection();
        $querySelect = "SELECT * FROM news";
        $results = mysqli_query($connection, $querySelect);
        $news = [];
        if(mysqli_num_rows($results) > 0) {
            $news = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        return $news;
    }
}
<?php
require_once 'models/Model.php';

class Category extends Model
{
  const STATUS_ENABLED = 1;
  const STATUS_DISABLED = 0;

  public function getAllPagination()
  {
    $connection = $this->openConnection();
    $querySelect = "SELECT * FROM categories 
                    ORDER BY categories.id DESC
                    LIMIT {$this->startpoint}, {$this->per_page}";
    $results = mysqli_query($connection, $querySelect);
    $categories = [];
    if (mysqli_num_rows($results) > 0) {
      $categories = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    $this->closeConnection($connection);

    return $categories;
  }

  public function getAll()
  {
    $connection = $this->openConnection();
    $querySelect = "SELECT * FROM categories";
    $results = mysqli_query($connection, $querySelect);
    $categories = [];
    if (mysqli_num_rows($results) > 0) {
      $categories = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    $this->closeConnection($connection);

    return $categories;
  }

  public function insert($category = [])
  {
    $connection = $this->openConnection();
    $queryInsert = "INSERT INTO categories
              (`name`, `avatar`, `description`, `status`)
        VALUES('{$category['name']}', 
        '{$category['avatar']}', 
        '{$category['description']}', 
        {$category['status']})";
    $isInsert = mysqli_query($connection, $queryInsert);
    $this->closeConnection($connection);

    return $isInsert;
  }

  public function delete($id = 0)
  {
    $connection = $this->openConnection();
    $queryDelete = "DELETE FROM categories WHERE id=$id";
    $isDelete = mysqli_query($connection, $queryDelete);
    $this->closeConnection($connection);
    //Chú ý, khi xóa dữ liệu ở bảng category, cần xóa các dữ liệu liên quan đến category bị xóa
//      tại bảng news
    $queryDeleteNews = "DELETE FROM news WHERE category_id = $id";
    mysqli_query($connection, $queryDeleteNews);

    return $isDelete;
  }

  public function getById($id)
  {
    $connection = $this->openConnection();
    $querySelect = "SELECT * FROM categories WHERE id = $id";
    $results = mysqli_query($connection, $querySelect);
    $category = [];
    if (mysqli_num_rows($results) == 1) {
      $categories = mysqli_fetch_all($results,
        MYSQLI_ASSOC);
      $category = $categories[0];
    }

    return $category;
  }

  public function update($category = [])
  {
    $connection = $this->openConnection();
    $queryUpdate = "UPDATE categories 
        SET `name` = '{$category["name"]}',
            `description` = '{$category["description"]}',
            `avatar` = '{$category["avatar"]}',
            `status` = {$category["status"]}
        WHERE `id` = {$category['id']}";
    $isUpdate = mysqli_query($connection, $queryUpdate);
    $this->closeConnection($connection);
    return $isUpdate;
  }

}
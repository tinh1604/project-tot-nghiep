<?php
require_once 'models/Model.php';
require_once 'helpers/Helper.php';

class User extends Model
{

    /**
     * Lấy dữ liệu có phân trang
     *
     * @return array|null
     */

    public function delete($id = 0)
    {
        $connection = $this->openConnection();
        $queryDelete = "DELETE FROM admins WHERE id=$id";
        $isDelete = mysqli_query($connection, $queryDelete);
//    do trong bảng news có liên kết đến bảng admin qua trường admin_id,
//    nên khi xóa admin thì cần xóa các bản ghi tin tức mà do admin này tạo ra
        $queryDeleteNews = "DELETE FROM news WHERE admin_id = $id";
        mysqli_query($connection, $queryDeleteNews);
        $this->closeConnection($connection);

        return $isDelete;
    }

    public function getById($id)
    {
        $connection = $this->openConnection();
        //do bảng admins có  khóa ngoại role_id nên cần join các bảng roles để lấy các thông tin cần thiết
        $querySelect = "
        SELECT admins.*, roles.name FROM admins
        INNER JOIN roles ON roles.id = admins.role_id
        WHERE admins.id = $id";

        $results = mysqli_query($connection, $querySelect);
        $admin = [];
        if (mysqli_num_rows($results) == 1) {
            $admin = mysqli_fetch_all($results,
                MYSQLI_ASSOC);
            $admin = $admin[0];
        }

        return $admin;
    }

    public function update($admin = [])
    {
        $connection = $this->openConnection();
        $queryUpdate = "UPDATE admins 
        SET `role_id` = {$admin["role_id"]},
            `username` = '{$admin["username"]}',
            `password` = '{$admin["password"]}'
        WHERE `id` = {$admin['id']}";

        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeConnection($connection);
        return $isUpdate;
    }

    public function getUserLogin($user)
    {
        $connection = $this->openConnection();
        $querySelect = "
                    SELECT * FROM users 
                    WHERE `email` = '{$user['email']}' AND `password` = '{$user['password']}' LIMIT 1";
        $results = mysqli_query($connection, $querySelect);
        $userArr = [];
        if (mysqli_num_rows($results) == 1) {
            $userArr = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $userArr = $userArr[0];
        }

        return $userArr;
    }
    public function insert_contact($contact)
    {
        $connection = $this->openConnection();
        $queryInsert = "INSERT INTO contact(`name`, `address`, `phone`, `email`)
    VALUES('{$contact['name']}',
    '{$contact['address']}',
    '{$contact['phone']}',
    '{$contact['email']}'
    )";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeConnection($connection);
        return $isInsert;
    }

    public function create($user)
    {
        $connection = $this->openConnection();
        $queryInsert = "INSERT INTO users(`first_name`, `last_name`, `email`, `password`)
    VALUES('{$user['first_name']}',
    '{$user['last_name']}',
    '{$user['email']}',
    '{$user['password']}'
    )";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeConnection($connection);
        return $isInsert;
    }

}
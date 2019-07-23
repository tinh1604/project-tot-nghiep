<?php
require_once 'models/Model.php';

class Doanchinh extends Model
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    public function getAll(){
        $connection = $this->openConnection();
        $querySelect = "SELECT * FROM doanchinh";
        $result = mysqli_query($connection,$querySelect);
        $doanchinh = [];
        if(mysqli_num_rows($result) > 0){
            $doanchinh = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $doanchinh;
    }
    public function insert($doanchinh=[]){
        $connection = $this->openConnection();
        $queryInsert = "INSERT INTO doanchinh(`Ten sp`, `Ten tieng Anh`, `Hinh anh`, `Gia`, `Mieu ta`, `Trang thai`)
    VALUES('{$doanchinh['name']}',
    '{$doanchinh['nameEnglish']}',
    '{$doanchinh['img']}',
    '{$doanchinh['price']}',
    '{$doanchinh['description']}',
    '{$doanchinh['status']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeConnection($connection);
        return $isInsert;
    }
    public function delete_doanchinh($STT){
        $connection = $this->openConnection();
        $queryDelete = "DELETE FROM doanchinh WHERE STT = $STT";
        $isDelete = mysqli_query($connection, $queryDelete);
        $this->closeConnection();
        return $isDelete;
    }


}
?>
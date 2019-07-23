<?php
require_once 'models/Model.php';
class Doansang extends Model
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    public function getAll(){
        $connection = $this->openConnection();
        $querySelect = "SELECT * FROM doansang";
        $result = mysqli_query($connection,$querySelect);
        $doansang = [];
        if(mysqli_num_rows($result) > 0){
            $doansang = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $doansang;
    }
    public function insert($doansang = []) {
        $connection = $this->openConnection();
        $queryInsert = "INSERT INTO doansang(`Ten sp`, `Ten tieng Anh`, `Hinh anh`, `Gia`, `Mieu ta`, `Trang thai`)
    VALUES('{$doansang['name']}',
    '{$doansang['nameEnglish']}',
    '{$doansang['img']}',
    '{$doansang['price']}',
    '{$doansang['description']}',
    '{$doansang['status']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeConnection($connection);

        return $isInsert;
    }

    public function delete_doansang($STT){
        $connection = $this->openConnection();
        $querydelete = "DELETE FROM doansang WHERE STT = $STT";
        $isDelete = mysqli_query($connection, $querydelete);
        mysqli_close($connection);
        return $isDelete;


    }

    public function getDoansangBySTT($STT){
        $connection = $this -> openConnection();
        $querySelect = "SELECT * FROM doansang WHERE STT = $STT LIMIT 1";
        $result = mysqli_query($connection, $querySelect);
        $doansang = [];
        if(mysqli_num_rows($result)>0){
            $doansang = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $doansang = $doansang[0];
        }
        mysqli_close($connection);
        return $doansang;
    }
    public function update_doansang($doansang){
        $connection = $this->openConnection();
        $queryUpdate = "UPDATE doansang SET Ten sp = '{$doansang['name']}',Ten tieng Anh = '{$doansang['nameEnglish']}',Hinhanh = '{$doansang['img']}',Gia = '{$doansang['price']}', Mieu ta = '{$doansang['description']}', Trang thai = '{$doansang['status']}' WHERE STT = '{$doansang['STT']}' ";
        $isUpdate = mysqli_query($connection,$queryUpdate);
        mysqli_close($connection);
        if($isUpdate){
            return true;
        }
        else{
            return false;
        }
    }

}
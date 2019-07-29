<?php
require_once 'models/Model.php';

class Doanchinh extends Model
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;


    public function getAll()
    {
        $connection = $this->openConnection();
        $querySelect = "SELECT * FROM doanchinh {$this->querySearch} LIMIT {$this->startpoint}, {$this->per_page}";
        $result = mysqli_query($connection, $querySelect);
        $doanchinh = [];
        if (mysqli_num_rows($result) > 0) {
            $doanchinh = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);
        return $doanchinh;
    }

    public function insert($doanchinh)
    {
        $connection = $this->openConnection();
        $queryInsert = "INSERT INTO doanchinh(`Ten_sp`, `Ten_tieng_Anh`, `Hinh_anh`, `Gia`, `Mieu_ta`, `Trang_thai`)
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

    public function update_doanchinh($doanchinh)
    {
        $connection = $this->openConnection();
        $queryUpdate = "UPDATE doanchinh SET 
                        `Ten_sp` = '{$doanchinh['name']}', 
                        `Ten_tieng_Anh` = '{$doanchinh['nameEnglish']}',
                        `Hinh_anh` = '{$doanchinh['img']}',
                        `Gia` = '{$doanchinh['price']}',
                        `Mieu_ta` = '{$doanchinh['description']}',
                        `Trang_thai` = '{$doanchinh['status']}'
                        WHERE STT = '{$doanchinh['id']}'";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        mysqli_close($connection);
        if($isUpdate){
            return true;
        }
        else{
            return false;
        }
    }
    public function getDoanchinhByID($id){
        $connection = $this->openConnection();
        $queryDoanchinh = "SELECT * FROM doanchinh WHERE STT = $id";
        $result = mysqli_query($connection, $queryDoanchinh);
        $doanchinh = [];
        if(mysqli_num_rows($result)>0){
            $doanchinh = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $doanchinh = $doanchinh[0];
        }
        mysqli_close($connection);
        return $doanchinh;

    }
    public function delete_doanchinh($id){
        $connection = $this->openConnection();
        $queryDelete = "DELETE FROM doanchinh WHERE STT = $id";
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
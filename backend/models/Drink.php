<?php
require_once 'models/Model.php';
class Drink extends Model {
    public function getAll(){
        $connection = $this->openConnection();
        $querySelect = "SELECT * FROM drink";
        $result = mysqli_query($connection, $querySelect);
        $drink = [];
        if(mysqli_num_rows($result)>0){
            $drink = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        mysqli_close($connection);
        return $drink;
    }
    public function insert($drink){
        $connection = $this->openConnection;
        $queryInsert = "INSERT INTO drink(`Name`, `NameEnglish`, `Img`, `Price`, `Description`, `Status`) VALUES(
                            '{$drink['name']}', '{$drink['nameEnglish']}', '{$drink['Img']}', '{$drink['price']}', '{$drink['description']}', '{$drink['status']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        mysqli_close($connection);
        return $isInsert;
    }
    public function getDrinkByID($id){
        $connection=$this->openConnection();
        $querySelect = "SELECT * FROM drink WHERE ID=$id";
        $result = mysqli_query($connection, $querySelect);
        $drink = [];
        if(mysqli_num_rows($result) > 0){
            $drink = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $drink = $drink[0];
        }
        mysqli_close($connection);
        return $drink;
    }
    public function update_drink($drink){
        $connection = $this->openConnection();
        $queryUpdate = "UPDATE drink SET 
                        `Name` = '{$drink['name']}',
                        `NameEnglish` = '{$drink['nameEnglish']}',
                        `Img` = '{$drink['img']}',
                        `Price` = '{$drink['price']}',
                        `Description` = '{$drink['descripton']}',
                        `Status` = '{$drink['status']}',
                        ";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        mysqli_close($connection);
        if($isUpdate){
            return true;
        }
        else{
            return false;
        }

    }
    public function delete_drink($id){
        $connection = $this->openConnection();
        $queryDelete = "DELETE FROM drink WHERE ID = $id";
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
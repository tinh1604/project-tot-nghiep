<?php
require_once 'configs/database.php';
class Model {
    /**
     * Hàm connect CSDL, được tạo ở lớp cha, các lớp con sẽ kế thừa từ lớp cha này để sử dụng
     * mà không cần phải khai báo lại
     * @return mysqli
     */
    public function openConnection() {
        $connection = mysqli_connect
        (DB_HOST, DB_USERNAME,
            DB_PASSWORD, DB_NAME,
            DB_PORT);
        if (!$connection) {
            die("Không thể kết nối! Lỗi: " .
                mysqli_connect_error());
        }

        return $connection;
    }

    /**
     * Đóng kết nối mysqli
     * @param $connection
     */
    public function closeConnection($connection) {
        mysqli_close($connection);
    }
}
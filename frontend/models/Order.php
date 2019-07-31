<?php
require_once 'models/Model.php';

class Order extends Model
{
  const STATUS_ENABLED = 1;
  const STATUS_DISABLED = 0;
  const PAYMENT_STATUS_DONE = 1; //đã thanh toán đơn hàng
  const PAYMENT_STATUS_DONE_TEXT = "Đã thanh toán"; //đã thanh toán đơn hàng
  const PAYMENT_STATUS_UNDONE = 0; //chưa thanh toán
  const PAYMENT_STATUS_UNDONE_TEXT = "Chưa thanh toán"; //chưa thanh toán

  /**
   * Insert bản ghi vào CSDL
   * @param array $order
   * @return bool|mysqli_result
   */
  public function insert($order = [])
  {
    $connection = $this->openConnection();
    $queryInsert = "INSERT INTO orders
                    (`user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`)
                 VALUES(
                  {$order['user_id']},
                  '{$order['fullname']}', 
                  '{$order['address']}', 
                  {$order['mobile']},
                   '{$order['email']}', 
                   '{$order['note']}', 
                   {$order['price_total']},
                    {$order['payment_status']}
                    )   
                    ";
//    thực thi truy vấn
    mysqli_query($connection, $queryInsert);
    //trả về id của lần insert cuối cùng, để lấy ra order_id insert tiếp vào bảng order_details
    $lastIdInsert = mysqli_insert_id($connection);
    $this->closeConnection($connection);

    return $lastIdInsert;
  }

}
<?php
require_once 'models/Model.php';

class OrderDetail extends Model
{
  /**
   * Insert bản ghi vào CSDL
   * @param array $orderDetail
   * @return bool|mysqli_result
   */
  public function insert($orderDetail = [])
  {
    $connection = $this->openConnection();
    $queryInsert = "INSERT INTO order_details
                    (`order_id`, `product_id`, `quantity`)
                 VALUES(
                  {$orderDetail['order_id']},
                  {$orderDetail['product_id']},
                  {$orderDetail['quantity']}
                    )   
                    ";
    $isInsert = mysqli_query($connection, $queryInsert);
    $this->closeConnection($connection);

    return $isInsert;
  }

}
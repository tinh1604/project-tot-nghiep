<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';

class OrderController extends Controller
{
  public function payment()
  {
    //nếu giỏ hàng trống thì không cho phép vào trang này
    if (!isset($_SESSION['cart'])) {
      $_SESSION['error'] = "Giỏ hàng của bạn đang trống, không thể truy cập trang này";
      header("Location: gio-hang-cua-ban");
      exit();
    }
    //nếu click nút Thanh toán
    if (isset($_POST['submit'])) {
      $fullname = $_POST['fullname'];
      $address = $_POST['address'];
      $mobile = $_POST['mobile'];
      $email = $_POST['email'];
      $note = $_POST['note'];
      //tạo đối tượng dạng mảng lưu các thông tin về order, tương ứng các trường trong bảng order để insert
      $order = [
        //nếu user đã đăng nhập thì sẽ tồn tại session này
        'user_id' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0,
        'fullname' => $fullname,
        'address' => $address,
        'mobile' => $mobile,
        'email' => $email,
        'note' => $note,
        //tổng giá trị đơn hàng được lấy từ giỏ  hàng
        'price_total' => $_SESSION['cart']['total'],
        //trạng thái thanh toán mặc định là chưa thanh toán
        'payment_status' => Order::PAYMENT_STATUS_UNDONE,
      ];

      $orderModel = new Order();
      //thay vì lấy ra giá trị true/fasle như mọi lần, lần này sẽ lấy ra id của bản ghi sau khi inser,
//      để tiếp tục insert vào bảng order_details
      $lastIdInsert = $orderModel->insert($order);
      if ($lastIdInsert) {
        //lặp giỏ hàng để thêm từng sản phẩm vào bảng order_details
        foreach ($_SESSION['cart'] as $id => $product) {
          //bỏ qua trường hợp key = total
          if (!is_numeric($id)) continue;
          $orderDetail = [
            'order_id' => $lastIdInsert,
            'product_id' => $id,
            'quantity' => $product['quantity'],
          ];
          $orderDetailModel = new OrderDetail();
          $orderDetailModel->insert($orderDetail);
        }
        //sau khi inser thành công vào 2 bảng orders và order_details thì xóa giỏ hàng
        unset($_SESSION['cart']);
        $_SESSION['success'] = "Đơn hàng của bạn đã được ghi nhận trên hệ thống, vui lòng chờ bộ phận kinh doanh xác nhận đơn hàng, 
        chúng tôi sẽ liên hệ lại với bạn thông qua sđt hoặc mail trong thời gian sớm nhất";
      } else {
        $_SESSION['error'] = "Có lỗi xảy ra, không thể tạo đơn hàng";
      }

      header("Location: gio-hang-cua-ban");
    }
    require_once 'views/orders/index.php';
  }
}
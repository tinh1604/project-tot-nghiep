<?php
require_once 'controllers/Controller.php';

class PaymentController extends Controller
{
    public function index()
    {
        //nếu giỏ hàng trống thì không cho phép vào trang này
        if (!isset($_SESSION['cart'])) {
            $_SESSION['error'] = "Giỏ hàng của bạn đang trống, không thể truy cập trang này";
            header("Location: gio-hang-cua-ban");
            exit();
        }
        require_once 'views/payments/index.php';
    }

}
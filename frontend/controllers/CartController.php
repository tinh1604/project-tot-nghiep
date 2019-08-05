<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
  public function index()
  {
//    //xử lý khi update giỏ hàng
//    if (isset($_POST['submit'])) {
//      //set lại tổng giá trị đơn hàng về 0
//      $_SESSION['cart']['total'] = 0;
//      foreach ($_SESSION['cart'] as $id => $product) {
//        //bỏ qua key = total
//        if (!is_numeric($id)) continue;
//        //gán lại quantity cho từng sản phẩm trong giỏ hàng
//        //dựa vào số lượng mà user đã thay đổi
//        $_SESSION['cart'][$id]['quantity'] = $_POST[$id];
//        //tính toán lại tổng giá trị cho đơn hàng dựa theo
//        // số lượng sản phẩm mới
//        $_SESSION['cart']['total'] +=
//          $_SESSION['cart'][$id]['price'] * $_POST[$id];
//      }
//
//      if ($_SESSION['cart']['total'] == 0) {
//        unset($_SESSION['cart']);
//      }
//
//      //do url bên frontend đã được rewrite, khác với url bên backend,
//      // nên cần lấy url dạng đầy đủ sử dụng biến $_SERVER['SCRIPT_NAME'] để set url
//      $urlCartList = $_SERVER['SCRIPT_NAME'];
//      $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
//      header("Location: $urlCartList/gio-hang-cua-ban");
//      exit();
//    }
    require_once 'views/carts/index.php';
  }

  public function add()
  {
    //do trong file .htaccess đã bắt trường hợp
    // chỉ cho phép id là số
//      nên ko cần bắt validate bằng code php tại đây
    $id = $_GET['id'];
    $productModel = new Product();
    $product = $productModel->getProductCartById($id);
//        echo "<pre>";
//        print_r($product);
//        die;
    $cartObj = [
      'name' => $product['name'],
      'price' => $product['price'],
      'avatar' => $product['avatar'],
      'quantity' => 1,
    ];

    //trường hợp giỏ hàng đang trống, thì thực hiện thêm mới
    //đồng thời luioon tính toán tổng giá trị đơn hàng
    //sử dụng key total
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'][$id] = $cartObj;
      $_SESSION['cart']['total'] = $product['price'];
    } //trường hợp giỏ hàng đã tồn tại rồi
    else {
      //trường hợp sản phẩm thêm vào giỏ hàng đã tồn tại
      //thì chỉ cập nhập số lượng của sản phẩm đã có tăng lên 1
      //đồng thời luioon tính toán tổng giá trị đơn hàng
      if (array_key_exists($id, $_SESSION['cart'])) {
        $_SESSION['cart'][$id]['quantity']++;
      } //ngược lại thì sẽ thêm mới sản phẩm vào giỏ hàng
      else {
        $_SESSION['cart'][$id] = $cartObj;
      }

      //tính toán lại tổng giá trị đơn hàng
      $_SESSION['cart']['total'] += $_SESSION['cart'][$id]['price'];
    }
    $_SESSION['success'] = "Thêm sản phẩm vào giỏ hàng thành công";
    // nên cần lấy url dạng đầy đủ sử dụng biến $_SERVER['SCRIPT_NAME'] để set url
    $urlCartList = $_SERVER['SCRIPT_NAME'];
    header("Location: $urlCartList/gio-hang-cua-ban");
    exit();
  }

  public function delete()
  {
    $id = $_GET['id'];
    //để xóa thì sẽ unset sản phẩm muốn xóa theo id truyền lên
//        và tính toán lại tổng giá trị đơn hàng bằng cách trừ đi
//    giá * số lượng của sản phẩm vừa xóa
    $_SESSION['cart']['total'] -=
      $_SESSION['cart'][$id]['price'] *
      $_SESSION['cart'][$id]['quantity'];
    unset($_SESSION['cart'][$id]);

    if ($_SESSION['cart']['total'] == 0) {
      unset($_SESSION['cart']);
    }
    $_SESSION['success'] = "Xóa sản phẩm trong giỏ hàng thành công";
    // nên cần lấy url dạng đầy đủ sử dụng biến $_SERVER['SCRIPT_NAME'] để set url
    $urlCartList = $_SERVER['SCRIPT_NAME'];
    header("Location: $urlCartList/gio-hang-cua-ban");
    exit();
  }
}
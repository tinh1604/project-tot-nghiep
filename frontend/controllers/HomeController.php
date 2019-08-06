<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
require_once 'models/Product.php';
require_once 'models/Product_category.php';
class HomeController extends Controller {
    public function index() {
        $title = 'Trang chủ';
        $productModel = new Product();
        $product = $productModel->get_highlight_product();
        //lấy thông tin danh mục cho phần search
        $product_category_model = new Product_category();
        $product_category = $product_category_model->getAll();
        require_once 'views/homes/index.php';
    }

}
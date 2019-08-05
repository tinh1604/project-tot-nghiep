<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Product_category.php';

class ProductController extends Controller
{
    public function detail()
    {
        $title = 'Chi tiết sản phẩm';
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getById($id);
        require_once 'views/products/detail.php';
    }
    public function index()
    {
        $title = 'Thực đơn';
        $product_category_name = 'Thực đơn';

        //xử lý khi submit form search
        $arrSearch = [];
        if (isset($_GET['submit_search'])) {
            $name = $_GET['name'];
            $product_category_id = $_GET['product_category_id'];
            $price = $_GET['price'];
            $arrSearch = [
                'name' => $name,
                'product_category_id' => $product_category_id,
                'price' => $price,
            ];
        }

        $productModel = new Product();
        $product = $productModel->getAll($arrSearch);
        $pages = $productModel->getPagination('product');

        //lấy thông tin danh mục cho phần search
        $product_category_model = new Product_category();
        $product_category = $product_category_model->getAll();

        require_once 'views/products/product.php';
    }
    public function lunch_food() {
        $title = 'Món chính';
        $product_category_name = 'Món chính';
        $productModel = new Product();
        $product = $productModel->get_lunch_food();
        $pages = $productModel->getPagination('product');
        require_once 'views/products/product.php';
    }
    public function breakfast_food() {
        $title = 'Điểm tâm sáng';
        $product_category_name = 'Điểm tâm sáng';
        $productModel = new Product();
        $product = $productModel->get_breakfast_food();
        $pages = $productModel->getPagination('product');
        require_once 'views/products/product.php';
    }
    public function drink() {
        $title = 'Thức uống';
        $product_category_name = 'Thức uống';
        $productModel = new Product();
        $product = $productModel->get_drink();
        $pages = $productModel->getPagination('product');
        require_once 'views/products/product.php';
    }
    public function booze() {
        $title = 'Rượu';
        $product_category_name = 'Rượu';
        $productModel = new Product();
        $product = $productModel->get_booze();
        $pages = $productModel->getPagination('product');
        require_once 'views/products/product.php';
    }
}
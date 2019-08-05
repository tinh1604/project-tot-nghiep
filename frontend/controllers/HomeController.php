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

    public function intro() {
        $title = 'Giới thiệu';
        $newsModel = new News();
        $news = $newsModel->getAllPagination();

        $pagerNews = $newsModel->getPagination('news');
        //lấy danh sách sản phẩm đang có trên hệ thống
        //mục đích để demo chức năng giỏ hàng
        $productModel = new Product();
        $products = $productModel->getAll();
        require_once 'views/homes/intro.php';
    }
    public function service() {
        $title = 'Dịch vụ';
        $newsModel = new News();
        $news = $newsModel->getAllPagination();

        $pagerNews = $newsModel->getPagination('news');
        //lấy danh sách sản phẩm đang có trên hệ thống
        //mục đích để demo chức năng giỏ hàng
        $productModel = new Product();
        $products = $productModel->getAll();
        require_once 'views/homes/service.php';
    }
    public function contact() {
        $title = 'Liên hệ';
        $newsModel = new News();
        $news = $newsModel->getAllPagination();

        $pagerNews = $newsModel->getPagination('news');
        //lấy danh sách sản phẩm đang có trên hệ thống
        //mục đích để demo chức năng giỏ hàng
        $productModel = new Product();
        $products = $productModel->getAll();
        require_once 'views/homes/contact.php';
    }

}
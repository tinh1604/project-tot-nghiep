<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
require_once 'models/Product.php';
class HomeController extends Controller {
    public function index() {
        $newsModel = new News();
        $news = $newsModel->getAllPagination();

        $pagerNews = $newsModel->getPagination('news');
        //lấy danh sách sản phẩm đang có trên hệ thống
        //mục đích để demo chức năng giỏ hàng
        $productModel = new Product();
        $products = $productModel->getAll();
        require_once 'views/homes/index.php';
    }
}
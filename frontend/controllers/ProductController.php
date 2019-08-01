<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class ProductController extends Controller
{
    public function detail()
    {
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getById($id);
        require_once 'views/products/detail.php';
    }
    public function lunch_food() {
        $productModel = new Product();
        $product = $productModel->get_lunch_food();
        $pages = $productModel->getPagination('product');
        require_once 'views/products/lunch_food.php';
    }
}
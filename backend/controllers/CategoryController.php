<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
/**
 * Thao tác với bảng news
 * Class NewsController
 */
class CategoryController extends Controller
{
    public function index() {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        //lấy thông tin tất cả tin tức
        require_once 'views/categories/index.php';
    }
}
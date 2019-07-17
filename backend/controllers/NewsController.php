<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
/**
 * Thao tác với bảng news
 * Class NewsController
 */
class NewsController extends Controller
{
    public function index() {
        $newsModel = new News();
        $news = $newsModel->getAll();
        //lấy thông tin tất cả tin tức
        require_once 'views/news/index.php';
    }
}
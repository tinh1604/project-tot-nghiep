<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';

class NewsController extends Controller
{
    public function detail()
    {
        $id = $_GET['id'];
        $newsModel = new News();
        $news = $newsModel->getById($id);
        require_once 'views/news/detail.php';
    }

    public function intro() {
        $title = 'Giới thiệu';
        $newsModel = new News();
        $news = $newsModel->getAllPagination();

        $pagerNews = $newsModel->getPagination('news');

        require_once 'views/news/intro.php';
    }
    public function service() {
        $title = 'Dịch vụ';
        $newsModel = new News();
        $news = $newsModel->getAllPagination();

        $pagerNews = $newsModel->getPagination('news');

        require_once 'views/news/service.php';
    }
}
<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';

class NewsController extends Controller
{
    public function index() {
        $newsModel = new News();
        $news = $newsModel->getAll();
        require_once 'views/news/index.php';
    }
}
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
}
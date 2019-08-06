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
    public function contact()
    {
        $title = 'Liên hệ';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $content = $_POST['content'];

            if (empty($name) || empty($address) || empty($phone) || empty($email) || empty($content)) {
                $_SESSION['error'] = 'Không được để trống các trường';
                require_once 'views/news/contact.php';
                return;
            }

            $contact = [
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'content' => $content
            ];

            $newsModel = new News();
            $isInsert = $newsModel->insert_contact($contact);
            if ($isInsert) {
                $_SESSION['success'] = 'Gửi ý kiến thành công';
            } else {
                $_SESSION['error'] = 'Gửi ý kiến không thành công';
            }
            header("Location: index.php?controller=news&action=contact");
            exit();
        }
        require_once 'views/news/contact.php';
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
        require_once 'views/news/intro.php';
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
        require_once 'views/news/service.php';
    }
}
<?php
require_once 'models/News.php';
require_once 'models/Category.php';
require_once 'controllers/Controller.php';

class NewsController extends Controller
{

  public function index()
  {
    $arrSearch = [];
    //xử lý khi submit form search
    if (isset($_GET['submit_search'])) {
      $title = $_GET['title'];
      $category_id = $_GET['category_id'];
      $comment_total = $_GET['comment_total'];
      $author = $_GET['author'];
      $arrSearch = [
        'title' => $title,
        'category_id' => $category_id,
        'comment_total' => $comment_total,
        'author' => $author,
      ];
    }
    $newsModel = new News();
    $news = $newsModel->getAllPagination($arrSearch);
    //hàm lấy phân trang
    $pages = $newsModel->getPagination('news');
    //lấy thông tin danh mục cho phần search
    $category_model = new Category();
    $categories = $category_model->getAll();

    //truyền ra views
    require_once 'views/news/index.php';
  }


  public function create()
  {
    $category_model = new Category();
    $categories = $category_model->getAll();

    //xử lý khi người dùng submit form
    if (isset($_POST['submit'])) {
      $title= $_POST['title'];
      $category_id = $_POST['category_id'];
      $summary = $_POST['summary'];
      $content = $_POST['content'];
      $comment_total = $_POST['comment_total'];
      $author = $_POST['author'];
      $status = $_POST['status'];
      $avatarArr = $_FILES['avatar'];

      if (empty($title)) {
        $_SESSION['error'] = 'Title không được để trống';
        require_once 'views/news/create.php';
        return;
      }
      if ($avatarArr['size'] > 0 && $avatarArr['error'] == 0) {
        $extension = pathinfo($avatarArr['name'],
          PATHINFO_EXTENSION);
        if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
          $_SESSION['error'] = "Cần upload định dạng ảnh";
          $isError = 1;
          require_once 'views/news/create.php';
          return;
        } else if ($avatarArr['size'] > 2 * 1024 * 1024) {
          $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
          require_once 'views/news/create.php';
          return;
        }

      }
      $avatar = '';
      if ($avatarArr['size'] > 0 && $avatarArr['error'] == 0) {
        $dirUpload = '/uploads';
        $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
        if (!file_exists($absolutePathUpload)) {
          mkdir($absolutePathUpload);
        }
        $fileName = 'news-' . time() . $avatarArr['name'];
        $isUpload = move_uploaded_file($avatarArr['tmp_name'],
          $absolutePathUpload . '/' . $fileName);
        if ($isUpload) {
          $avatar = $fileName;
        }
      }
      $news = [
        'title' => $title,
        'category_id' => $category_id,
        'admin_id' => isset($_SESSION['admin']) ? $_SESSION['admin']['id'] : 0,
        //trường avatar sẽ đưuọc sinh ra
        //sau khi upload file thành công
        'avatar' => $avatar,
        'summary' => $summary,
        'content' => $content,
        'comment_total' => $comment_total,
        'author' => $author,
        'status' => $status,
      ];

      $newsModel = new News();
      $isInsert = $newsModel->insert($news);
      if ($isInsert) {
        $_SESSION['success'] = 'Insert thành công';
      } else {
        $_SESSION['error'] = 'Insert thất bại';
      }
      header("Location: index.php?controller=news&action=index");
      exit();
    }
    require_once 'views/news/create.php';
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php?controller=news&action=index");
      exit();
    }
    $category_model = new Category();
    $categories = $category_model->getAll();

    $newsModel = new News();
    $news = $newsModel->getById($_GET['id']);
    //xử lý khi người dùng submit form
    if (isset($_POST['submit'])) {
      $title= $_POST['title'];
      $category_id = $_POST['category_id'];
      $summary = $_POST['summary'];
      $content = $_POST['content'];
      $comment_total = $_POST['comment_total'];
      $author = $_POST['author'];
      $status = $_POST['status'];
      $avatarArr = $_FILES['avatar'];
      if (empty($title)) {
        $_SESSION['error'] = 'Title không được để trống';
        require_once 'views/news/create.php';
        return;
      }
      if ($avatarArr['size'] > 0 && $avatarArr['error'] == 0) {
        $extension = pathinfo($avatarArr['name'],
          PATHINFO_EXTENSION);
        //xử lý trường hợp upload ko phải dạng ảnh
        if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
          $_SESSION['error'] = "Cần upload định dạng ảnh";
          $isError = 1;
          require_once 'views/news/create.php';
          return;
        } else if ($avatarArr['size'] > 2 * 1024 * 1024) {
          $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
          require_once 'views/news/create.php';
          return;
        }

      }
      $avatar = $news['avatar'];
      if ($avatarArr['size'] > 0 && $avatarArr['error'] == 0) {
        $dirUpload = '/uploads';
        $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
        if (!empty($avatar)) {
          @unlink($absolutePathUpload . '/' . $avatar);
        }
        if (!file_exists($absolutePathUpload)) {
          mkdir($absolutePathUpload);
        }
        $fileName = 'news-' . time() . $avatarArr['name'];
        $isUpload = move_uploaded_file($avatarArr['tmp_name'],
          $absolutePathUpload . '/' . $fileName);
        if ($isUpload) {
          $avatar = $fileName;
        }
      }
      $news = [
        'id' => $_GET['id'],
        'title' => $title,
        'category_id' => $category_id,
        'admin_id' => isset($_SESSION['admin']) ? $_SESSION['admin']['id'] : 0,
        //trường avatar sẽ đưuọc sinh ra
        //sau khi upload file thành công
        'avatar' => $avatar,
        'summary' => $summary,
        'content' => $content,
        'comment_total' => $comment_total,
        'author' => $author,
        'status' => $status,
      ];

      $newsModel = new News();
      $isInsert = $newsModel->update($news);
      if ($isInsert) {
        $_SESSION['success'] = 'Update thành công';
      } else {
        $_SESSION['error'] = 'Update thất bại';
      }
      header("Location: index.php?controller=news&action=index");
      exit();
    }
    require_once 'views/news/update.php';
  }

  public function delete() {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php?controller=news&action=index");
      exit();
    }

    $id = $_GET['id'];
    $newsModel = new News();
    $isDelete = $newsModel->delete($id);
    if ($isDelete) {
      $_SESSION['success'] = "Xóa bản ghi #$id thành công";
    }
    else {
      $_SESSION['error'] = "Xóa bản ghi #$id thất bại";
    }

    header("Location: index.php?controller=news&action=index");
    exit();
  }

  public function detail() {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php?controller=news&action=index");
      exit();
    }

    $id = $_GET['id'];
    $newsModel = new News();
    $news = $newsModel->getById($id);
    require_once 'views/news/detail.php';
  }

}
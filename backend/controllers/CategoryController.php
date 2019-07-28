<?php

require_once 'models/Category.php';
require_once 'controllers/Controller.php';

class CategoryController extends Controller
{

  public function index()
  {
    $categoryModel = new Category();
    $categories = $categoryModel->getAllPagination();
    //lấy phân trang
    $pages = $categoryModel->getPagination('categories');
    require_once 'views/categories/index.php';
  }


  public function create()
  {
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $status = $_POST['status'];
      if (empty($name)) {
        $_SESSION['error'] = 'Name không được để trống';
        require_once 'views/categories/create.php';
        return;
      }
      $category = [
        'name' => $name,
        'description' => $description,
        'status' => $status,
      ];

      $categoryModel = new Category();
      $isInsert = $categoryModel->insert($category);
      if ($isInsert) {
        $_SESSION['success'] = 'Insert thành công';
      } else {
        $_SESSION['error'] = 'Insert thất bại';
      }
      header("Location: index.php?controller=category&action=index");
      exit();

    }
    require_once 'views/categories/create.php';
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php");
      exit();
    }

    $id = $_GET['id'];
    $categoryModel = new Category();
    $category = $categoryModel->getById($id);

    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $status = $_POST['status'];
      $avatarArr = $_FILES['avatar'];
      if (empty($name)) {
        $_SESSION['error'] = 'Name không được để trống';
        require_once 'views/categories/update.php';
        return;
      }

      $category = [
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'status' => $status,
      ];

      $categoryModel = new Category();
      $isUpdate = $categoryModel->update($category);
      if ($isUpdate) {
        $_SESSION['success'] = 'Update thành công';
      } else {
        $_SESSION['error'] = 'Update thất bại';
      }
      header("Location: index.php?controller=category&action=index");
      exit();
    }
    require_once 'views/categories/update.php';
  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php");
      exit();
    }
    $id = $_GET['id'];
    $categoryModel = new Category();
    $isDelete = $categoryModel->delete($id);
    if ($isDelete) {
      $_SESSION['success'] = "Xóa bản ghi $id thành công";
    } else {
      $_SESSION['error'] = "Xóa bản ghi $id thất bại";
    }
    header("Location: index.php");
    exit();
  }

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php");
      exit();
    }
    $id = $_GET['id'];
    $categoryModel = new Category();
    $category = $categoryModel->getById($id);
    require_once 'views/categories/detail.php';
  }

}
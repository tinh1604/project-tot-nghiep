<?php

require_once 'models/Product_category.php';
require_once 'controllers/Controller.php';

class ProductcategoryController extends Controller
{

  public function index()
  {
    $categoryModel = new Product_category();
    $categories = $categoryModel->getAllPagination();
    //lấy phân trang
    $pages = $categoryModel->getPagination('categories');
    require_once 'views/product_categories/index.php';
  }


  public function create()
  {
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $status = $_POST['status'];
      if (empty($name)) {
        $_SESSION['error'] = 'Name không được để trống';
        require_once 'views/product_categories/create.php';
        return;
      }
      $category = [
        'name' => $name,
        'description' => $description,
        'status' => $status,
      ];

      $categoryModel = new Product_category();
      $isInsert = $categoryModel->insert($category);
      if ($isInsert) {
        $_SESSION['success'] = 'Insert thành công';
      } else {
        $_SESSION['error'] = 'Insert thất bại';
      }
        header("Location: index.php?controller=productcategory&action=index");
      exit();

    }
      require_once 'views/product_categories/create.php';
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php");
      exit();
    }

    $id = $_GET['id'];
    $categoryModel = new Product_category();
    $category = $categoryModel->getById($id);

    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $status = $_POST['status'];
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

      $categoryModel = new Product_category();
      $isUpdate = $categoryModel->update($category);
      if ($isUpdate) {
        $_SESSION['success'] = 'Update thành công';
      } else {
        $_SESSION['error'] = 'Update thất bại';
      }
        header("Location: index.php?controller=productcategory&action=index");
      exit();
    }
    require_once 'views/product_categories/update.php';
  }

    public function delete(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION = 'Tham số ID không hợp lệ';
            header("Location: index.php?controller=productcategory&action=index");
            exit();
        }

        $categoryModel = new Product_category();
        $id = $_GET['id'];
        $category = $categoryModel->getById($id);
        if(isset($_POST['submit'])){
            $isDelete = $categoryModel->delete($id);
            if($isDelete){
                $_SESSION['success'] = 'Xóa dữ liệu thành công';
            }
            else{
                $_SESSION['error'] = 'Xóa dữ liệu thất bại';
            }
            header("Location: index.php?controller=productcategory&action=index");
            exit();
        }
        require_once 'views/product_categories/delete.php';
    }

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php");
      exit();
    }
    $id = $_GET['id'];
    $categoryModel = new Product_category();
    $category = $categoryModel->getById($id);
    require_once 'views/product_categories/detail.php';
  }

}
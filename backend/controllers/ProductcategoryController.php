<?php

require_once 'models/Product_category.php';
require_once 'controllers/Controller.php';

class ProductcategoryController extends Controller
{

  public function index()
  {
      $product_categoryModel = new Product_category();
      $product_category = $product_categoryModel->getAll();
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
        $product_category = [
        'name' => $name,
        'description' => $description,
        'status' => $status,
      ];

      $product_categoryModel = new Product_category();
      $isInsert = $product_categoryModel->insert($product_category);
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
    $product_categoryModel = new Product_category();
      $product_category = $product_categoryModel->getById($id);

    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $status = $_POST['status'];
      if (empty($name)) {
        $_SESSION['error'] = 'Name không được để trống';
        require_once 'views/categories/update.php';
        return;
      }

        $product_category = [
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'status' => $status,
      ];

        $product_categoryModel = new Product_category();
      $isUpdate = $product_categoryModel->update($product_category);
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

        $product_categoryModel = new Product_category();
        $id = $_GET['id'];
        $product_category = $product_categoryModel->getById($id);
        if(isset($_POST['submit'])){
            $isDelete = $product_categoryModel->delete($id);
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
      $product_categoryModel = new Product_category();
      $product_category = $product_categoryModel->getById($id);
    require_once 'views/product_categories/detail.php';
  }

}
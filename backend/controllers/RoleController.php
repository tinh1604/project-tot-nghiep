<?php
require_once 'models/Role.php';
require_once 'controllers/Controller.php';

class RoleController extends Controller
{

  public function index()
  {
    $roleModel = new Role();
    $roles = $roleModel->getAll();
    require_once 'views/roles/index.php';
  }

   public function create()
  {
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      if (empty($name)) {
        $_SESSION['error'] = 'Name không được để trống';
        require_once 'views/roles/create.php';
        return;
      }
      $role = [
        'name' => $name,
        'description' => $description,
      ];

      $roleModel = new Role();
      $isInsert = $roleModel->insert($role);
      if ($isInsert) {
        $_SESSION['success'] = 'Insert role thành công';
      } else {
        $_SESSION['error'] = 'Insert role thất bại';
      }
      header("Location: index.php?controller=role&action=index");
      exit();
    }
    require_once 'views/roles/create.php';
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php?controller=role&action=index");
      exit();
    }

    $roleModel = new Role();
    $role = $roleModel->getById($_GET['id']);
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      if (empty($name)) {
        $_SESSION['error'] = 'Name không được để trống';
        require_once 'views/roles/create.php';
        return;
      }
      $role = [
        'id' => $_GET['id'],
        'name' => $name,
        'description' => $description,
      ];

      $isUpdate= $roleModel->update($role);
      if ($isUpdate) {
        $_SESSION['success'] = 'Update role thành công';
      } else {
        $_SESSION['error'] = 'Update role thất bại';
      }
      header("Location: index.php?controller=role&action=index");
      exit();
    }
    require_once 'views/roles/update.php';
  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php?controller=role&action=index");
      exit();
    }

    $id = $_GET['id'];
    $roleModel = new Role();
    $isDelete = $roleModel->delete($id);
    if ($isDelete) {
      $_SESSION['success'] = "Xóa bản ghi #$id thành công";
    } else {
      $_SESSION['error'] = "Xóa bản ghi #$id thất bại";
    }

    header("Location: index.php?controller=role&action=index");
    exit();
  }

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Tham số ID không hợp lệ';
      header("Location: index.php?controller=role&action=index");
      exit();
    }
    $id = $_GET['id'];
    $roleModel = new Role();
    $role = $roleModel->getById($id);
    require_once 'views/roles/detail.php';
  }

}
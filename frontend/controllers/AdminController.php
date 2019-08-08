<?php
require_once 'models/Admin.php';
require_once 'models/Role.php';
require_once 'controllers/Controller.php';

class AdminController extends Controller
{

    public function index()
    {
        $adminModel = new Admin();
        $admins = $adminModel->getAllPagination();
        $pages = $adminModel->getPagination('admins');
        require_once 'views/admins/index.php';
    }


    public function create()
    {
        $rolesModel = new Role();
        $roles = $rolesModel->getAll();

        if (isset($_POST['submit'])) {
            $role_id = $_POST['role_id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            if (empty($username) || empty($password)) {
                $_SESSION['error'] = 'Username hoặc password không được để trống';
                require_once 'views/admins/create.php';
                return;
            }

            if ($password != $password_confirm) {
                $_SESSION['error'] = 'Password nhập lại chưa đúng';
                require_once 'views/admins/create.php';
                return;
            }
            $admin = [
                'role_id' => $role_id,
                'username' => $username,
                //sử dụng mã hóa md5 cho password
                'password' => md5($password),
            ];

            $adminModel = new Admin();
            $isInsert = $adminModel->insert($admin);
            if ($isInsert) {
                $_SESSION['success'] = 'Insert admin thành công';
            } else {
                $_SESSION['error'] = 'Insert admin thất bại';
            }
            header("Location: index.php?controller=admin&action=index");
            exit();
        }
        require_once 'views/admins/create.php';
    }

    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header("Location: index.php?controller=admin&action=index");
            exit();
        }
        $id = $_GET['id'];
        $rolesModel = new Role();
        $roles = $rolesModel->getAll();
        $adminModel = new Admin();
        $admin = $adminModel->getById($id);
        if (isset($_POST['submit'])) {
            $role_id = $_POST['role_id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            if (empty($username) || empty($password)) {
                $_SESSION['error'] = 'Username hoặc password không được để trống';
                require_once 'views/admins/update.php';
                return;
            }

            if ($password != $password_confirm) {
                $_SESSION['error'] = 'Password nhập lại chưa đúng';
                require_once 'views/admins/update.php';
                return;
            }
            $admin = [
                'id' => $id,
                'role_id' => $role_id,
                'username' => $username,
                //sử dụng mã hóa md5 cho password
                'password' => md5($password),
            ];

            $isUpdate = $adminModel->update($admin);
            if ($isUpdate) {
                $_SESSION['success'] = 'Update admin thành công';
            } else {
                $_SESSION['error'] = 'Update admin thất bại';
            }
            header("Location: index.php?controller=admin&action=index");
            exit();
        }
        require_once 'views/admins/update.php';
    }

    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header("Location: index.php?controller=admin&action=index");
            exit();
        }

        $id = $_GET['id'];
        $adminModel = new Admin();
        $isDelete = $adminModel->delete($id);
        if ($isDelete) {
            $_SESSION['success'] = "Xóa bản ghi #$id thành công";
        } else {
            $_SESSION['error'] = "Xóa bản ghi #$id thất bại";
        }

        header("Location: index.php?controller=admin&action=index");
        exit();
    }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header("Location: index.php?controller=admin&action=index");
            exit();
        }

        $id = $_GET['id'];
        $adminModel = new Admin();
        $admin = $adminModel->getById($id);
        require_once 'views/admins/detail.php';
    }

    public function login() {
        if (isset($_SESSION['admin'])) {
            header("Location: index.php?controller=news&action=index");
            exit();
        }
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($username) || empty($password)) {
                $_SESSION['error'] = 'Username hoặc password không được để trống';
                require_once 'views/admins/login.php';
                return;
            }

            $admin = [
                'username' => $username,
                'password' => md5($password),
            ];

            $adminModel = new Admin();
            $adminLogin = $adminModel->getAdminLogin($admin);
            if (!empty($adminLogin)) {
                $_SESSION['success'] = 'Đăng nhập thành công';
                $_SESSION['admin'] = $adminLogin;
                header("Location: index.php?controller=news&action=index");
                exit();
            }
            else {
                $_SESSION['error'] = 'Sai tài khoản hoặc mật khẩu';
                require_once 'views/admins/login.php';
            }
        }
        require_once 'views/admins/login.php';
    }

    public function logout() {
        unset($_SESSION['admin']);
        $_SESSION['success'] = "Logout thành công";
        header("Location: index.php?controller=admin&action=login");
        exit();
    }

}
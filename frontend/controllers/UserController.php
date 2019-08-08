<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller {
    public function profile() {
        require_once 'views/users/profile.php';
    }

    public function login() {
        $title = 'Đăng nhập';
//
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($email) || empty($password)) {
                $_SESSION['error'] = 'Username hoặc password không được để trống';
                require_once 'views/users/login.php';
                return;
            }

            $user = [
                'email' => $email,
                'password' => md5($password),
            ];

            $userModel = new User();
            $userLogin = $userModel->getUserLogin($user);
            if (!empty($userLogin)) {
                $_SESSION['success'] = 'Đăng nhập thành công';
                $_SESSION['user'] = $userLogin;
                header("Location: index.php?controller=home&action=index");
                exit();
            }
            else {
                $_SESSION['error'] = 'Sai tài khoản hoặc mật khẩu';
                require_once 'views/users/login.php';
            }
        }
        require_once 'views/users/login.php';
    }

    public function logout() {
        unset($_SESSION['user']);
        $_SESSION['success'] = "Logout thành công";
        header("Location: index.php?controller=home&action=index");
        exit();
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
                require_once 'views/users/contact.php';
                return;
            }

            $contact = [
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'content' => $content
            ];

            $userModel = new User();
            $isInsert = $userModel->insert_contact($contact);
            if ($isInsert) {
                $_SESSION['success'] = 'Gửi ý kiến thành công';
            } else {
                $_SESSION['error'] = 'Gửi ý kiến không thành công';
            }
            header("Location: lien-he");
            exit();
        }
        require_once 'views/users/contact.php';
    }

    public function registration()
    {
        $title = 'Đăng kí';
        if (isset($_POST['submit'])) {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
                $_SESSION['error'] = 'Không được để trống các trường';
                require_once 'views/users/registration.php';
                return;
            }elseif (strlen($password) <8){
                $_SESSION['error'] = 'Mật khẩu ít nhất phải có 8 kí tự';
            }
            elseif ($password != $repassword){
                $_SESSION['error'] = 'Mật khẩu nhập lại chưa đúng';
            }
            else{
                $user = [
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                    'password' => md5($password)
                ];

                $userModel = new User();
                $isInsert = $userModel->create($user);
                if ($isInsert) {
                    $_SESSION['registration'] = 'Đăng kí thành công';
                } else {
                    $_SESSION['error'] = 'Đăng kí không thành công';
                }
                header("Location: dang-ki");
                exit();
            }
            }


        require_once 'views/users/registration.php';
    }



}
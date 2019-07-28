<?php
require_once 'models/Drink.php';
require_once 'controllers/Controller.php';
class DrinkController extends Controller{
    public function index(){
        $drinkModel = new Drink();
        $drink = $drinkModel->getALL();
        require_once 'views/sanpham/thucuong/index.php';
    }
    public function create(){

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $status = $_POST['status'];


                if (empty($name) || empty($price) || empty($description)) {
                    $_SESSION['error'] = 'Không được để trống các trường';
                    require_once 'views/sanpham/thucuong/create.php';
                    return;
                }
                elseif (isset($_FILES['img'])) {
                    $imgArr = $_FILES['img'];
                    if($imgArr['error'] == 4){
                        $_SESSION['error'] = 'Bạn chưa chọn file uplooad';
                        require_once 'views/sanpham/thucuong/create.php';
                        return;
                    }
                    else{
                        $extension = pathinfo($imgArr['name'], PATHINFO_EXTENSION);
                        if (!in_array($extension, ['jpg', 'png', 'jpeg', 'gif'])) {
                            $_SESSION['error'] = 'Cần upload file định dạng ảnh';
                            require_once 'views/sanpham/thucuong/create.php';
                            return;
                        } elseif ($imgArr['size'] > 2 * 1024 * 1024) {
                            $_SESSION['error'] = 'Không được upload ảnh có dung lượng > 2Mb';
                            require_once 'views/sanpham/thucuong/create.php';
                            return;
                        }
                    }
                    $img = '';
                    if ($imgArr['size'] > 0 && $imgArr['error'] == 0) {
                        $dirUpload = 'uploads';
                        $pathUpload = __DIR__ . '/../assets/' . $dirUpload;
                        if (!file_exists($pathUpload)) {
                            mkdir($pathUpload);
                        }
                        $fileName = time() . $imgArr['name'];
                        $isUpload = move_uploaded_file($imgArr['tmp_name'], $pathUpload . '/' . $fileName);
                        if ($isUpload) {
                            $img = $fileName;
                        }
                    }

                    $drink = [
                        'name' => $name,
                        'img' => $img,
                        'price' => $price,
                        'description' => $description,
                        'status' => $status,
                    ];
                    $drinkModel = new Drink();
                    $isInsert = $drinkModel->insert($drink);
                    if ($isInsert) {
                        $_SESSION['success'] = 'Thêm dữ liệu thành công';
                    } else {
                        $_SESSION['error'] = 'Thêm dữ liệu thất bại';
                    }
                    header('Location:index.php?controller=drink&action=index');
                    exit();
                }


            }
            require_once 'views/sanpham/thucuong/create.php';
    }
    public function update(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=drink&action=index');
            exit();
        }
        $id = $_GET['id'];
        $drinkModel = new Drink();
        $drink = $drinkModel->getDrinkByID($id);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $img = $drink['Img'];
            if(empty($name) || empty($price) || empty($description)){
                $_SESSION['error'] = 'Không được để trống các trường';
                require_once 'views/sanpham/thucuong/update.php';
                return;
            }
            elseif(isset($_FILES['img'])){
                $imgArr = $_FILES['img'];
                if($imgArr['size'] > 0 && $imgArr['error'] == 0){
                    $extension = pathinfo($imgArr['name'], PATHINFO_EXTENSION);
                    if(!in_array($extension,['jpg','jpeg','png','gif'])){
                        $_SESSION['error'] = 'File upload không phải dạng ảnh';
                        require_once 'views/sanpham/thucuong/update.php';
                        return;
                    }
                    elseif ($imgArr['size'] > 2*1024*1024){
                        $_SESSION['error'] = 'Dung lượng ảnh upload không được > 2Mb';
                        require_once 'views/sanpham/thucuong/update.php';
                        return;
                    }
                    else{
                        $pathUpload = __DIR__.'/../assets/uploads';
                        if(!empty($img)){
                            @unlink($pathUpload.'/'.$img);
                        }
                        $fileName = time().$imgArr['name'];
                        $isUpload = move_uploaded_file($imgArr['tmp_name'],$pathUpload.'/'.$fileName);
                        if($isUpload){
                            $img = $fileName;
                        }
                    }
                }

            }
            $drink = [
                'id' => $id,
                'name' => $name,
                'img' => $img,
                'price' => $price,
                'description' => $description,
                'status' => $status,
            ];
            $isUpdate = $drinkModel->update($drink);
            if($isUpdate){
                $_SESSION['success'] = 'Update dữ liệu thành công';
            }
            else{
                $_SESSION['error'] = 'Update dữ liệu thất bại';
            }
            header('Location: index.php?controller=drink&action=index');
            exit();
        }
        require_once 'views/sanpham/thucuong/update.php';
    }
    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=drink&action=index');
            exit();
        }
        $drinkModel = new Drink();
        $id = $_GET['id'];
        $drink = $drinkModel->getDrinkByID($id);
        $img = $drink['Img'];
        $pathImg = __DIR__ . '/../assets/uploads/' . $img;
        if (isset($_POST['submit'])) {
            if (!empty($img)) {
                @unlink($pathImg);
            }
            $isDelete = $drinkModel->delete($id);
            if ($isDelete) {
                $_SESSION['success'] = 'Xóa dữ liệu thành công';
            } else {
                $_SESSION['error'] = 'Xóa dữ liệu thất bại';
            }
            header('Location:index.php?controller=drink&action=index');
            exit();
        }
        require_once 'views/sanpham/thucuong/delete.php';
    }
    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=drink&action=index');
            exit();
        }
        $id = $_GET['id'];
        $drinkModel = new Drink();
        $drink = $drinkModel->getDrinkByID($id);
        require_once 'views/sanpham/thucuong/detail.php';
    }


}
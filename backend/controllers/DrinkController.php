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
                $nameEnglish = $_POST['nameEnglish'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $status = $_POST['status'];


                if (empty($name) || empty($nameEnglish) || empty($price) || empty($description)) {
                    $_SESSION['error'] = 'Không được để trống các trường';
                    require_once 'views/sanpham/doanchinh/create.php';
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
                        'nameEnglish' => $nameEnglish,
                        'img' => $img,
                        'price' => $price,
                        'description' => $description,
                        'status' => $status,
                    ];
                    $drinkModel = new Drink();
                    $isInsert = $drinkModel->insert($drink);
                    if (isset($isInsert)) {
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


}
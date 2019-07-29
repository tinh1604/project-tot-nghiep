<?php
require_once 'models/Doanchinh.php';
require_once 'controllers/Controller.php';

class DoanchinhController extends Controller
{
    public function index()
    {
        //xử lý khi submit form search
        $arrSearch = [];
        if (isset($_GET['submit_search'])) {
            $name_doanchinh = $_GET['name_doanchinh'];
            $price_doanchinh = $_GET['price_doanchinh'];
            $arrSearch = [
                'name_doanchinh' => $name_doanchinh,
                'price_doanchinh' => $price_doanchinh,
            ];
        }

        $doanchinhModel = new Doanchinh();
        $doanchinh = $doanchinhModel->getAll($arrSearch);
        $pages = $doanchinhModel->getPagination('doanchinh');
        require_once 'views/sanpham/doanchinh/index.php';
    }

    public function create()
    {
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
                    require_once 'views/sanpham/doanchinh/create.php';
                    return;
                }
                else{
                    $extension = pathinfo($imgArr['name'], PATHINFO_EXTENSION);
                    if (!in_array($extension, ['jpg', 'png', 'jpeg', 'gif'])) {
                        $_SESSION['error'] = 'Cần upload file định dạng ảnh';
                        require_once 'views/sanpham/doanchinh/create.php';
                        return;
                    } elseif ($imgArr['size'] > 2 * 1024 * 1024) {
                        $_SESSION['error'] = 'Không được upload ảnh có dung lượng > 2Mb';
                        require_once 'views/sanpham/doanchinh/create.php';
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


                $doanchinh = [
                    'name' => $name,
                    'nameEnglish' => $nameEnglish,
                    'img' => $img,
                    'price' => $price,
                    'description' => $description,
                    'status' => $status,
                ];
                $doanchinhModel = new Doanchinh();
                $isInsert = $doanchinhModel->insert($doanchinh);
                if (isset($isInsert)) {
                    $_SESSION['success'] = 'Thêm dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Thêm dữ liệu thất bại';
                }
                header('Location:index.php?controller=doanchinh&action=index');
                exit();
            }


        }
        require_once 'views/sanpham/doanchinh/create.php';
    }
    public function update(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=doanchinh&action=index');
            exit();
        }
        $id = $_GET['id'];
        $doanchinhModel = new Doanchinh();
        $doanchinh = $doanchinhModel -> getDoanchinhByID($id);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $nameEnglish = $_POST['nameEnglish'];
            $description= $_POST['description'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $img = $doanchinh['Hinh_anh'];
            if(empty($name) || empty($nameEnglish) || empty($price) || empty($description)){
                $_SESSION['error'] = 'Không được để trống các trường';
                require_once 'views/sanpham/doanchinh/update.php';
                return;
            }
            elseif(isset($_FILES['img'])){
                $imgArr = $_FILES['img'];
                if($imgArr['size'] > 0 && $imgArr['error'] == 0){
                    $extension = pathinfo($imgArr['name'], PATHINFO_EXTENSION);
                    if(!in_array($extension,['jpg', 'png', 'jpeg','gif'])){
                        $_SESSION['error'] = 'File upload không phải dạng ảnh';
                        require_once 'views/sanpham/doanchinh/update.php';
                        return;

                    }
                    elseif ($imgArr['size'] > 2*1024*1024){
                        $_SESSION['error'] = 'File upload dung lượng > 2Mb';
                        require_once 'views/sanpham/doanchinh/update.php';
                        return;
                    }
                   $dirUpload = 'uploads';
                   $pathUpload = __DIR__.'/../assets/'.$dirUpload;
                   if(!empty($img)){
                       @unlink($pathUpload.'/'.$img);
                   }
                   if(!file_exists($pathUpload)){
                       mkdir($pathUpload);
                   }
                   $fileName = time().$imgArr['name'];
                   $isUpload = move_uploaded_file($imgArr['tmp_name'], $pathUpload.'/'.$fileName);
                   if($isUpload){
                       $img = $fileName;
                   }
                }
            }
            $doanchinh = [
                'id' => $id,
                'name' => $name,
                'nameEnglish' => $nameEnglish,
                'img' => $img,
                'price' => $price,
                'description' => $description,
                'name' => $name,
                'status' => $status,
            ];
            $isUpdate = $doanchinhModel -> update_doanchinh($doanchinh);
            if($isUpdate){
                $_SESSION['success']= 'Update dữ liệu thành công';
            }
            else{
                $_SESSION['error'] = 'Update dữ liệu thất bại';
            }
            header('Location: index.php?controller=doanchinh&action=index');
            exit();

        }
        require_once 'views/sanpham/doanchinh/update.php';
    }
    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location:index.php?controller=doanchinh&action=index');
            exit();
        }
        $doanchinhModel = new Doanchinh();
        $doanchinh = $doanchinhModel->getDoanchinhByID($_GET['id']);
        require_once 'views/sanpham/doanchinh/detail.php';
    }
    public function delete(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=doanchinh&action=index');
            exit();
        }

        $doanchinhModel = new Doanchinh();
        $id = $_GET['id'];
        $doanchinh = $doanchinhModel->getDoanchinhByID($id);
        $img = $doanchinh['Hinh_anh'];
        $pathImg = __DIR__ . '/../assets/uploads';
        if(isset($_POST['submit'])){
            if (!empty($img)) {
                @unlink($pathImg . '/' . $img);
            }
            $isDelete = $doanchinhModel->delete_doanchinh($id);
            if($isDelete){
                $_SESSION['success'] = 'Xóa dữ liệu thành công';
            }
            else{
                $_SESSION['error'] = 'Xóa dữ liệu thất bại';
            }
            header('Location:index.php?controller=doanchinh&action=index');
            exit();
        }
        require_once 'views/sanpham/doanchinh/delete.php';
    }


}


?>
<?php
require_once 'controllers/Controller.php';
require_once 'models/Doansang.php';

class DoansangController extends Controller
{
    public function index()
    {
        //xử lý khi submit form search
        $arrSearch = [];
        if (isset($_GET['submit_search'])) {
            $name_doansang= $_GET['name_doansang'];
            $price_doansang = $_GET['price_doansang'];
            $arrSearch = [
                'name_doansang' => $name_doansang,
                'price_doansang' => $price_doansang,
            ];
        }

        $doansangModel = new Doansang;
        $doansang = $doansangModel -> getAll($arrSearch);
        $pages = $doansangModel -> getPagination('doansang');
        require_once 'views/Sanpham/Doansang/index.php';
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $nameEnglish = $_POST['nameEnglish'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            if (empty($name) || empty($nameEnglish) || empty($description) || empty($price)) {
                $_SESSION['error'] = 'Không được để trống các trường';
                require_once 'views/sanpham/doansang/create.php';
                return;

            }
            elseif (isset($_FILES['img'])) {
                $imgArr = $_FILES['img'];
                if($imgArr['error'] == 4){
                    $_SESSION['error'] = 'Bạn chưa chọn file upload';
                    require_once 'views/sanpham/doansang/create.php';
                    return;
                }
                else{
                    $extension = pathinfo($imgArr['name'],PATHINFO_EXTENSION);
                    if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                        $_SESSION['error'] = "Cần upload định dạng ảnh";
                        require_once 'views/sanpham/doansang/create.php';
                        return;
                    } elseif ($imgArr['size'] > 2*1024*1024) {
                        $_SESSION['error'] ='File upload không được > 2Mb';
                        require_once 'views/sanpham/doansang/create.php';
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
                $doansang = [
                    'name' => $name,
                    'nameEnglish' => $nameEnglish,
                    'img' => $img,
                    'price' => $price,
                    'description' => $description,
                    'status' => $status,
                ];

                $doansangModel = new Doansang();
                $isInsert = $doansangModel->insert($doansang);
                if ($isInsert) {
                    $_SESSION['success'] = 'Innsert thành công';
                } else {
                    $_SESSION['error'] = 'Innsert thất bại';
                }
                header("Location: index.php?controller=doansang&action=index");
                exit();
            }


        }
        require_once 'views/sanpham/doansang/create.php';
    }

    public function delete(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=doansang&action=index');
            exit();
        }
        $doansangModel = new Doansang();
        $STT = $_GET['id'];
        $doansang = $doansangModel -> getDoansangBySTT($STT);
        $img = $doansang['Hinh_anh'];
        $pathUpload = __DIR__.'/../assets/uploads';
        if(isset($_POST['submit'])){
            if(!empty($img)){
                @unlink($pathUpload.'/'.$img);
            }
            $isDelete = $doansangModel->delete_doansang($STT);
            if($isDelete){
                $_SESSION['success'] = "Xóa dữ liệu có STT = $STT thành công";
            }
            else{
                $_SESSION['error'] = "Xóa dữ liệu có STT = $STT thất bại";
            }
            header('Location: index.php?controller=doansang&action=index');
            exit();
        }
        require_once 'views/sanpham/doansang/delete.php';
    }


    public function update(){
        if(!isset($_GET['id']) && !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=doansang&action=index');
            exit();
        }
        $STT = $_GET['id'];
        $doansangModel = new Doansang();
        $doansang = $doansangModel->getDoansangBySTT($STT);
        
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $nameEnglish = $_POST['nameEnglish'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            if (empty($name) || empty($nameEnglish) || empty($description) || empty($price)) {
                $_SESSION['error'] = 'Không được để trống các trường';
                require_once 'views/sanpham/doansang/update.php';
                return;

            }
            elseif (isset($_FILES['img'])) {
                $imgArr = $_FILES['img'];

                if ($imgArr['size'] > 0 && $imgArr['error'] == 0)  {
                    $extension = pathinfo($imgArr['name'], PATHINFO_EXTENSION);
                    if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                        $_SESSION['error'] = "Cần upload định dạng ảnh";
                        require_once 'views/sanpham/doansang/update.php';
                        return;
                    } elseif ($imgArr['size'] > 2 * 1024 * 1024) {
                        $_SESSION['error'] = 'File upload không được > 2Mb';
                        require_once 'views/sanpham/doansang/update.php';
                        return;
                    }

                    $img = $doansang['Hinh_anh'];
                    $dirUpload = 'uploads';
                    $pathUpload = __DIR__ . '/../assets/' . $dirUpload;
                    if(!empty($img)){
                        @unlink($pathUpload.'/'.$img);
                    }
                    if (!file_exists($pathUpload)) {
                        mkdir($pathUpload);
                    }
                    $fileName = time().$imgArr['name'];
                    $isUpload = move_uploaded_file($imgArr['tmp_name'], $pathUpload . '/' . $fileName);
                    if ($isUpload) {
                        $img = $fileName;
                    }
                }
            }

            $doansang = [
                'STT' => $STT,
                'name' => $name,
                'nameEnglish' => $nameEnglish,
                'img' => $img,
                'price' => $price,
                'description' => $description,
                'status' => $status,
            ];
            $isUpdate = $doansangModel->update_doansang($doansang);
            if ($isUpdate) {
                $_SESSION['success'] = "Cập nhật bản ghi STT = $STT thành công";
            } else {
                $_SESSION['error'] = "Cập nhật bản ghi STT = $STT thất bại";
            }
            header('Location: index.php?controller=doansang&action=index');
            exit();
        }
        require_once 'views/sanpham/doansang/update.php';

    }

    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
                header('Location: index.php?controller=doansang&action=index');
                exit();
        }
        $doansangModel = new Doansang();
        $doansang = $doansangModel -> getDoansangBySTT($_GET['id']);
        require_once 'views/sanpham/doansang/detail.php';

    }


}
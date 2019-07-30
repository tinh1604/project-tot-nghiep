<?php
require_once 'models/Product.php';
require_once 'controllers/Controller.php';

class ProductController extends Controller
{
    public function index()
    {
        //xử lý khi submit form search
        $arrSearch = [];
        if (isset($_GET['submit_search'])) {
            $name = $_GET['name'];
            $price = $_GET['price'];
            $arrSearch = [
                'name' => $name,
                'price' => $price,
            ];
        }

        $productModel = new Product();
        $product = $productModel->getAll($arrSearch);
        $pages = $productModel->getPagination('product');
        require_once 'views/product/index.php';
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $english_name = $_POST['english_name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $status = $_POST['status'];


            if (empty($name) || empty($english_name) || empty($price) || empty($description)) {
                $_SESSION['error'] = 'Không được để trống các trường';
                require_once 'views/product/create.php';
                return;
            }
            elseif (isset($_FILES['img'])) {
                $imgArr = $_FILES['img'];
                if($imgArr['error'] == 4){
                    $_SESSION['error'] = 'Bạn chưa chọn file uplooad';
                    require_once 'views/product/create.php';
                    return;
                }
                else{
                    $extension = pathinfo($imgArr['name'], PATHINFO_EXTENSION);
                    if (!in_array($extension, ['jpg', 'png', 'jpeg', 'gif'])) {
                        $_SESSION['error'] = 'Cần upload file định dạng ảnh';
                        require_once 'views/product/create.php';
                        return;
                    } elseif ($imgArr['size'] > 2 * 1024 * 1024) {
                        $_SESSION['error'] = 'Không được upload ảnh có dung lượng > 2Mb';
                        require_once 'views/product/create.php';
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


                $product = [
                    'name' => $name,
                    'english_name' => $english_name,
                    'img' => $img,
                    'price' => $price,
                    'description' => $description,
                    'status' => $status,
                ];
                $productModel = new Product();
                $isInsert = $productModel->insert($product);
                if (isset($isInsert)) {
                    $_SESSION['success'] = 'Thêm dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Thêm dữ liệu thất bại';
                }
                header('Location: index.php?controller=product&action=index');
                exit();
            }


        }
        require_once 'views/product/create.php';
    }
    public function update(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=product&action=index');
            exit();
        }
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel -> getByID($id);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $english_name = $_POST['english_name'];
            $description= $_POST['description'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $img = $product['img'];
            if(empty($name) || empty($english_name) || empty($price) || empty($description)){
                $_SESSION['error'] = 'Không được để trống các trường';
                require_once 'views/product/update.php';
                return;
            }
            elseif(isset($_FILES['img'])){
                $imgArr = $_FILES['img'];
                if($imgArr['size'] > 0 && $imgArr['error'] == 0){
                    $extension = pathinfo($imgArr['name'], PATHINFO_EXTENSION);
                    if(!in_array($extension,['jpg', 'png', 'jpeg','gif'])){
                        $_SESSION['error'] = 'File upload không phải dạng ảnh';
                        require_once 'views/product/update.php';
                        return;

                    }
                    elseif ($imgArr['size'] > 2*1024*1024){
                        $_SESSION['error'] = 'File upload dung lượng > 2Mb';
                        require_once 'views/product/update.php';
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
            $product = [
                'id' => $id,
                'name' => $name,
                'english_name' => $english_name,
                'img' => $img,
                'price' => $price,
                'description' => $description,
                'name' => $name,
                'status' => $status,
            ];
            $isUpdate = $productModel -> update($product);
            if($isUpdate){
                $_SESSION['success']= 'Update dữ liệu thành công';
            }
            else{
                $_SESSION['error'] = 'Update dữ liệu thất bại';
            }
            header('Location: index.php?controller=product&action=index');
            exit();

        }
        require_once 'views/product/update.php';
    }
    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=product&action=index');
            exit();
        }
        $productModel = new Product();
        $product = $productModel->getByID($_GET['id']);
        require_once 'views/product/detail.php';
    }
    public function delete(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION = 'Tham số ID không hợp lệ';
            header('Location: index.php?controller=product&action=index');
            exit();
        }

        $productModel = new Product();
        $id = $_GET['id'];
        $product = $productModel->getByID($id);
        $img = $product['img'];
        $pathImg = __DIR__ . '/../assets/uploads';
        if(isset($_POST['submit'])){
            if (!empty($img)) {
                @unlink($pathImg . '/' . $img);
            }
            $isDelete = $productModel->delete($id);
            if($isDelete){
                $_SESSION['success'] = 'Xóa dữ liệu thành công';
            }
            else{
                $_SESSION['error'] = 'Xóa dữ liệu thất bại';
            }
            header('Location:index.php?controller=product&action=index');
            exit();
        }
        require_once 'views/product/delete.php';
    }


}


?>
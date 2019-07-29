<?php include_once 'views/layouts/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding-bottom: 20px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Đồ ăn sáng
            <small>Control panel</small>
        </h1>
    </section>

    <!-- Main content -->
    <div class="search-form content">
        <h4>Tìm kiếm</h4>
        <!-- SEARCH nên để method get để có thể xử lý cho trường hợp phân trang-->
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-5 col-12">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name_doansang" value="<?php echo isset($_GET['name_doansang']) ? $_GET['name_doansang'] : ''?>" class="form-control"/>
                </div>
                <div class="col-md-3 col-12">
                    <label>Giá</label>
                    <input type="number" name="price_doansang" value="<?php echo isset($_GET['price_doansang']) ? $_GET['price_doansang'] : ''?>" class="form-control"/>
                </div>
                <!--cần thêm 2 input hidden tương ứng với 2 param controller và action trên url-->
                <input type="hidden" name="controller" value="<?php echo isset($_GET['controller']) ? $_GET['controller'] : ''?>"/>
                <input type="hidden" name="action" value="<?php echo isset($_GET['action']) ? $_GET['action'] : ''?>"/>
            </div>
            <br />
            <div class="form-group">
                <button type="submit" name="submit_search" class="btn btn-success">
                    <span class="fa fa-search"></span> Tìm kiếm
                </button>
                <a href="index.php?controller=doansang&action=index" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>


    <section style="margin: 10px" >
        <a class="btn btn-primary"
           href="index.php?controller=doansang&action=create">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
    </section>
    <table class="table">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Tên tiếng Anh</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th style="text-align: center">Miêu tả</th>
            <th>Thời gian tạo</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>


        <?php if (!empty($doansang)): ?>
            <?php foreach ($doansang as $value): ?>
                <tr>
                    <td>
                    <?php echo $value['STT']; ?>
                    </td>

                    <td>
                        <?php echo $value['Ten_sp']; ?>
                    </td>
                    <td>
                        <?php echo $value['Ten_tieng_Anh']; ?>
                    </td>
                    <td>
                        <?php echo $value['Hinh_anh']?>
                    </td>
                    <td>
                        <?php echo $value['Gia']; ?>
                    </td>
                    <td >
                        <?php echo $value['Mieu_ta']; ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y H:i:s', Strtotime($value['Thoi_gian_tao'])) ; ?>
                    </td>
                    <td>
                        <?php
                        $status = '';
                        switch ($value['Trang_thai']){
                            case 1 : $status = 'Enabled';
                            break;
                            case 0 : $status = 'Disabled';
                                break;
                        }
                        echo $status;
                        ?>

                    </td>
                    <td>
                        <?php
                        $urlDetail = 'index.php?controller=doansang&action=detail&id='.$value['STT'];
                        $urlUpdate = 'index.php?controller=doansang&action=update&id='.$value['STT'];
                        $urlDelete = "index.php?controller=doansang&action=delete&id={$value['STT']}";
                        ?>
                        <a href="<?php echo $urlDetail?>"><i class="fas fa-eye"></i></a><br/>
                        <a href="<?php echo $urlUpdate?>"><i class="fas fa-edit"></i></a><br/>
                        <a href="<?php echo $urlDelete?>"><i class="fas fa-trash-alt"></i></a>
                    </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="8">Không có dữ liệu.</td>
        </tr>

        <?php endif; ?>

    </table>
    <?php
    //hiển thị phân trang đã có được từ controller
    echo $pages;
    ?>
</div>
<?php include_once 'views/layouts/footer.php' ?>



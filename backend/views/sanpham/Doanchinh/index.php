<?php include_once 'views/layouts/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Đồ ăn chính
            <small>Control panel</small>
        </h1>
    </section>

    <!-- Main content -->
    <section style="margin: 10px" >
        <a class="btn btn-primary"
           href="index.php?controller=doanchinh&action=create">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
    </section>
    <table class="table" >
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

        <?php if (!empty($doanchinh)): ?>
            <?php foreach ($doanchinh as $value): ?>
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
                    <td>
                        <?php echo $value['Mieu_ta']; ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y H:i:s', Strtotime($value['Thoi_gian_tao'])) ; ?>
                    </td>
                    <td>
                        <?php
                        $status = '';
                        switch ($value['Trang_thai']){
                            case Doanchinh::STATUS_ENABLED: $status = 'Enabled';
                            break;
                            case Doanchinh::STATUS_DISABLED: $status = 'Disabled';
                                break;
                        }
                        echo $status;
                        ?>

                    </td>
                    <td>
                        <?php
                        $urlDetail = 'index.php?controller=doanchinh&action=detail&id='.$value['STT'];
                        $urlUpdate = 'index.php?controller=doanchinh&action=update&id='.$value['STT'];
                        $urlDelete = "index.php?controller=doanchinh&action=delete&id={$value['STT']}";
                        ?>
                        <a href="<?php echo $urlDetail?>"><i class="fas fa-eye"></i></a><br/>
                        <a href="<?php echo $urlUpdate?>"><i class="fas fa-pencil-alt"></i></a><br/>
                        <a href="<?php echo $urlDelete?>" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này không?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="8">Không có dữ liệu.</td>
        </tr>

        <?php endif; ?>

    </table>
</div>
<?php include_once 'views/layouts/footer.php' ?>

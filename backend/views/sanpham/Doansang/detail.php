<?php include_once 'views/layouts/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding-left: 10px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Đồ ăn sáng
        </h1>
    </section>

    <!-- Main content -->

    <?php if (!empty($doansang)): ?>
        <h3>Thông tin chi tiết sản phẩm <b>STT = <?php echo $doansang['STT'] ?></b></h3>
        <table class="table table-bordered"  >
            <tr >
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Tên tiếng Anh</th>
                <th>Hình ảnh</th>
                <th>Giá sản phẩm</th>
                <th style="text-align: center">Miêu tả</th>
                <th>Trạng thái</th>
                <th>Thời gian tạo</th>
            </tr>
            <tr>
                <td>
                    <?php echo $doansang['STT'] ?>
                </td>
                <td>
                    <?php echo $doansang['Ten sp'] ?>
                </td>
                <td>
                    <?php echo $doansang['Ten tieng Anh'] ?>
                </td>
                <td>
                    <?php if (!empty($doansang['Hinh anh'])): ?>
                        <img src="assets/uploads/<?php echo $doansang['Hinh anh'] ?>"
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $doansang['Gia'] ?>
                </td>
                <td>
                    <?php echo $doansang['Mieu ta'] ?>
                </td>
                <td>
                    <?php if ($doansang['Trang thai'] == 1) {
                        echo 'Enabled';
                    } elseif ($doansang['Trang thai'] == 0) {
                        echo 'Disabled';
                    }
                    ?>
                </td>
                <td>
                    <?php echo $doansang['Thoi gian tao'] ?>
                </td>
            </tr>
        </table>
    <?php else: ?>
        <h3>Không tìm thấy dữ liệu</h3>
    <?php endif; ?>
    <a href="index.php?controller=doansang&action=index" class="btn btn-primary">Quay lại</a>
</div>
<?php include_once 'views/layouts/footer.php' ?>


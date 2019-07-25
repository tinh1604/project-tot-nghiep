<?php include_once 'views/layouts/header.php' ?>

<div class="content-wrapper" style="padding-left: 10px">
    <section class="content-header">
        <h2>
            Đồ ăn chính
        </h2>
    </section>

    <!-- Main content -->

    <?php if (!empty($doanchinh)): ?>
        <h3>Thông tin chi tiết sản phẩm <b>STT = <?php echo $doanchinh['STT'] ?></b></h3>
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
                    <?php echo $doanchinh['STT'] ?>
                </td>
                <td>
                    <?php echo $doanchinh['Ten_sp'] ?>
                </td>
                <td>
                    <?php echo $doanchinh['Ten_tieng_Anh'] ?>
                </td>
                <td>
                    <?php if (!empty($doanchinh['Hinh_anh'])): ?>
                        <img id="img_description" src="assets/uploads/<?php echo $doanchinh['Hinh_anh'] ?>"
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $doanchinh['Gia'] ?>
                </td>
                <td>
                    <?php echo $doanchinh['Mieu_ta'] ?>
                </td>
                <td>
                    <?php if ($doanchinh['Trang_thai'] == 1) {
                        echo 'Enabled';
                    } elseif ($doanchinh['Trang_thai'] == 0) {
                        echo 'Disabled';
                    }
                    ?>
                </td>
                <td>
                    <?php echo $doanchinh['Thoi_gian_tao'] ?>
                </td>
            </tr>
        </table>
    <?php else: ?>
        <h3>Không tìm thấy dữ liệu</h3>
    <?php endif; ?>
    <a href="index.php?controller=doanchinh&action=index" class="btn btn-primary">Quay lại</a>
</div>
<?php include_once 'views/layouts/footer.php' ?>


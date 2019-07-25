<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
        <section class="content-header">
            <h4>
                Bạn có chắc chắn muốn xóa dữ liệu:
            </h4>
        </section>

        <!-- Main content -->

        <?php if (!empty($doansang)): ?>
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
                        <?php echo $doansang['Ten_sp'] ?>
                    </td>
                    <td>
                        <?php echo $doansang['Ten_tieng_Anh'] ?>
                    </td>
                    <td>
                        <?php if (!empty($doansang['Hinh_anh'])): ?>
                            <img id="img_description" src="assets/uploads/<?php echo $doansang['Hinh_anh'] ?>"
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo $doansang['Gia'] ?>
                    </td>
                    <td>
                        <?php echo $doansang['Mieu_ta'] ?>
                    </td>
                    <td>
                        <?php if ($doansang['Trang_thai'] == 1) {
                            echo 'Enabled';
                        } elseif ($doansang['Trang_thai'] == 0) {
                            echo 'Disabled';
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $doansang['Thoi_gian_tao'] ?>
                    </td>
                </tr>
            </table>
        <?php else: ?>
            <h3>Không tìm thấy dữ liệu</h3>
        <?php endif; ?>


    <!-- Main content -->
    <section class="content">
        <form method="POST" action="index.php?controller=doansang&action=delete&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Xóa"/>
                <a href="index.php?controller=doanchinh&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layouts/footer.php' ?>

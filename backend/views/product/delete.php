<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
        <section class="content-header">
            <h4>
                Bạn có chắc chắn xóa dữ liệu:
            </h4>
        </section>

        <!-- Main content -->

        <?php if (!empty($product)): ?>
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
                        <?php echo $product['id'] ?>
                    </td>
                    <td>
                        <?php echo $product['name'] ?>
                    </td>
                    <td>
                        <?php echo $product['english_name'] ?>
                    </td>
                    <td>
                        <?php if (!empty($product['img'])): ?>
                            <img id="img_description" src="assets/uploads/<?php echo $product['img'] ?>"
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo $product['price'] ?>
                    </td>
                    <td>
                        <?php echo $product['description'] ?>
                    </td>
                    <td>
                        <?php if ($product['highlight'] == 1) {
                            echo 'Enabled';
                        } elseif ($product['highlight'] == 0) {
                            echo 'Disabled';
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $product['created_at'] ?>
                    </td>
                </tr>
            </table>
        <?php else: ?>
            <h3>Không tìm thấy dữ liệu</h3>
        <?php endif; ?>


    <!-- Main content -->
    <section class="content">

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Xóa"/>
                <a href="index.php?controller=product&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layouts/footer.php' ?>

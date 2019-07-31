<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
        <section class="content-header">
            <h4>
                Bạn có chắc chắn xóa dữ liệu:
            </h4>
        </section>

        <!-- Main content -->

        <?php if (!empty($product_category)): ?>
            <table class="table table-bordered"  >
                <tr >
                    <th>ID</th>
                    <th>Loại sản phẩm</th>
                    <th style="text-align: center">Miêu tả</th>
                    <th>Trạng thái</th>
                    <th>Thời gian tạo</th>
                </tr>
                <tr>
                    <td>
                        <?php echo $product_category['id'] ?>
                    </td>
                    <td>
                        <?php echo $product_category['name'] ?>
                    </td>
                    <td>
                        <?php echo $product_category['description'] ?>
                    </td>
                    <td>
                        <?php if ($product_category['description'] == 1) {
                            echo 'Enabled';
                        } elseif ($product_category['description'] == 0) {
                            echo 'Disabled';
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $product_category['created_at'] ?>
                    </td>
                </tr>
            </table>
        <?php else: ?>
            <h3>Không tìm thấy dữ liệu</h3>
        <?php endif; ?>


    <!-- Main content -->
    <section class="content">

        <form method="POST" action="" >
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Xóa"/>
                <a href="index.php?controller=productcategory&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
</div>
<?php include_once 'views/layouts/footer.php' ?>

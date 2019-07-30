<?php include_once 'views/layouts/header.php' ?>

<div class="content-wrapper" style="padding-left: 10px">
    <section class="content-header">
        <h2>
            Đồ ăn chính
        </h2>
    </section> <br/>

    <!-- Main content -->

    <?php if (!empty($product)): ?>
        <h4>Thông tin chi tiết sản phẩm <b>ID = <?php echo $product['id'] ?></b></h4>
        <table class="table table-bordered"  >
            <tr >
                <th>ID</th>
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
                    <?php if ($product['status'] == 1) {
                        echo 'Enabled';
                    } elseif ($product['status'] == 0) {
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
    <a href="index.php?controller=product&action=index" class="btn btn-primary">Quay lại</a>
</div>
<?php include_once 'views/layouts/footer.php' ?>


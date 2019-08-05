<?php include_once 'views/layouts/header.php' ?>

<div class="content-wrapper" style="padding-left: 10px">
    <section class="content-header">
        <h2>
            Đồ ăn chính
        </h2>
    </section> <br/>

    <!-- Main content -->

    <?php if (!empty($product)): ?>
        <h3>Thông tin chi tiết sản phẩm:</h3>
        <table class="table table-bordered">
            <tr>
                <td><b>ID:</b></td>
                <td>
                    <?php echo $product['id'] ?>
                </td>
            </tr>
            <tr>
                <td><b>Tên sản phẩm</b></td>
                <td>
                    <?php echo $product['name'] ?>
                </td>
            </tr>
            <tr>
                <td><b>Tên tiếng Anh</b></td>
                <td>
                    <?php echo $product['english_name'] ?>
                </td>
            </tr>
            <tr>
                <td><b>Hình ảnh</b></td>
                <td>
                    <?php if (!empty($product['img'])): ?>
                        <img id="img_description" src="assets/uploads/<?php echo $product['img'] ?>"
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><b>Giá sản phẩm</b></td>
                <td>
                    <?php echo $product['price'] ?>
                </td>
            </tr>
            <tr>
                <td><b>Miêu tả</b></td>
                <td>
                    <?php echo $product['description'] ?>
                </td>
            </tr>
            <tr>
                <td><b>Trạng thái</b></td>
                <td>
                    <?php if ($product['highlight'] == 1) {
                        echo 'Nổi bật';
                    } elseif ($product['highlight'] == 0) {
                        echo 'bình thường';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><b>Thời gian tạo</b></td>
                <td>
                    <?php echo $product['created_at'] ?>
                </td>
            </tr>

        </table>
    <?php else: ?>
        <h3>Không tìm thấy dữ liệu</h3>
    <?php endif; ?>
    <a href="index.php?controller=product&action=index" class="btn btn-primary">Quay lại</a><br/><br/>
</div>
<?php include_once 'views/layouts/footer.php' ?>


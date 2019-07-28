<?php require_once 'views/layouts/header.php' ?>
    <div class="content-wrapper" style="padding-left: 10px">
        <section class="content-header">
            <h2>Đồ uống</h2>
        </section>
        <?php if (!empty($drink)): ?>
            <h3>Thông tin chi tiết sản phẩm ID = <?php echo $drink['ID'] ?></h3>
            <table class="table table-borderd">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá sản phẩm</th>
                    <th style="text-align: center">Miêu tả</th>
                    <th>Thời gian tạo</th>
                    <th>Trạng thái</th>
                </tr>
                <tr>
                    <td><?php echo $drink['ID'] ?></td>
                    <td><?php echo $drink['Name'] ?></td>
                    <td>
                        <?php if (!empty($drink['Img'])): ?>
                            <img id="img_description" src="assets/uploads/<?php echo $drink['Img'] ?>"
                        <?php endif; ?>
                    </td>
                    <td><?php echo $drink['Price'] ?></td>
                    <td><?php echo $drink['Description'] ?></td>
                    <td><?php echo $drink['Created_at'] ?></td>
                    <td>
                        <?php if ($drink['Status'] == 1) {
                            echo 'Enabled';
                        } else {
                            echo 'Disabled';
                        }
                        ?>
                    </td>
                </tr>
            </table>
        <?php else: ?>
            <h3>Không tìm thấy dữ liệu</h3>
        <?php endif; ?>
        <a href="index.php?controller=drink&action=index" class="btn btn-primary">Quay lại</a>
    </div>
<?php require_once 'views/layouts/footer.php' ?>
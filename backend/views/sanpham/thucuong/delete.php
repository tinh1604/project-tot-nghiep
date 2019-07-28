<?php require_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h4>Bạn có chắc chắn muốn xóa dữ liệu</h4>
    </section>
    <?php if (!empty($drink)): ?>
        <table class="table table-borderde">
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
                <td><?php echo $drink['Img'] ?></td>
                <td><?php echo $drink['Price'] ?></td>
                <td><?php echo $drink['Description'] ?></td>
                <td><?php echo date('d:m:Y H:i:s', strtotime($drink['Created_at'])) ?></td>
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

<section class="content">
    <form method="post" action="index.php?controller=drink&action=delete&id=<?php echo $_GET['id']?>">
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Xóa">
            <a href="index.php?controller=drink&action=index">Hủy</a>
        </div>
    </form>

</section>
</div>

<?php require_once 'views/layouts/footer.php'?>

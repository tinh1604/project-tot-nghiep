<?php require_once 'views/layouts/header.php' ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h3>Cập nhật Đồ uống ID = <?php echo $drink['ID'] ?></h3>
        </section>
        <section class="content">
            <form action="index.php?controller=drink&action=update&id=<?php echo $drink['ID'] ?>" method="post"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $drink['Name'] ?>">
                </div>
                <div class="form-group">
                    <label>
                        Upload ảnh
                        (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                    </label>
                    <input class="form-control" type="file" name="img"><br/>
                    <?php if (!empty($drink['Img'])): ?>
                        <img width="100px" src="assets/uploads/<?php echo $drink['Img'] ?>"
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input class="form-control" type="number" name="price" value="<?php echo $drink['Price'] ?>">
                </div>
                <div class="form-group">
                    <label>Miêu tả</label>
                    <textarea class="form-control" name="description"><?php echo $drink['Description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status">
                        <?php
                        $enable_drink = '';
                        $disable_drink = '';
                        if ($drink['Status'] == 1) {
                            $enable_drink = 'selected=true';
                        } else {
                            $disable_drink = 'selected=true';
                        }
                        ?>
                        <option <?php echo $enable_drink ?> value="1">Enabled</option>
                        <option <?php echo $disable_drink ?> value="0">Disabled</option>
                    </select>
                </div>
                <br/>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" value='Cập nhật'>
                    <a class="btn btn-secondary" href="index.php?controller=drink&action=index">Hủy</a>
                </div>
            </form>
        </section>
    </div>
<?php require_once 'views/layouts/footer.php' ?>
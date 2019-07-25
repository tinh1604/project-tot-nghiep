<?php require_once 'views/layouts/header.php' ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h3>Cập nhật đồ ăn sáng ID = <?php echo $drink['ID'] ?></h3>
        </section>
        <section class="content">
            <form action="index.php?controller=drink&action=update&id=<?php echo $drink['ID'] ?>" method="post"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $drink['Name'] ?>">
                </div>
                <div class="form-group">
                    <label>Tên tiếng Anh</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $drink['NameEnglish'] ?>">
                </div>
                <div class="form-group">
                    <label>
                        Upload ảnh
                        (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                    </label>
                    <input class="form-control" type="file" name="img"><br/>
                    <?php if (!empty($drink['img'])): ?>
                        <img width="100px" src="assets/uploads/<?php echo $drink['img'] ?>"
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input class="form-control" type="number" name="price" value="<?php echo $drink['Price'] ?>">
                </div>
                <div class="form-group">
                    <label>Miêu tả</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $drink['Description'] ?>">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $drink['Name'] ?>">
                </div>
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

                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="btn btn-success" type="submit" name="submit" value="<?php echo $drink['Name'] ?>">
                    <a class="btn btn-secondary" href="index.php?controller=drink&action=index">Hủy</a>
                </div>
            </form>
        </section>
    </div>
<?php require_once 'views/layouts/footer.php' ?>
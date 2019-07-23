<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Thêm đồ ăn sáng
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name'])? $_POST['name']: ''?>"/>
            </div>
            <div class="form-group">
                <label>Tên tiếng Anh</label>
                <input type="text" name="nameEnglish" class="form-control"  value="<?php echo isset($_POST['nameEnglish'])? $_POST['nameEnglish']: ''?>"/>
            </div>
            <div class="form-group">
                <label>
                    Upload ảnh sản phẩm
                    (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                </label>
                <input type="file" name="img" class="form-control">
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>"/>
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='description' name="description" class="form-control"><?php echo isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" selected="selected" class="form-control">
                        <option value="1">
                            Enabled
                        </option>
                        <option value="0">
                            Disabled
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Lưu"/>
                <a href="index.php?controller=doansang&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layouts/footer.php' ?>
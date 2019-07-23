<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Thêm đồ ăn chính
        </h1>

    </section>
     <!-- Main content -->
        <section class="content">
         <form method="POST" action="index.php?controller=doanchinh&action=create" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '';?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Tên tiếng Anh</label>
                <input type="text" name="nameEnglish" value="<?php echo isset($_POST['nameEnglish']) ? $_POST['nameEnglish'] : '';?>" class="form-control"/>
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
                <input type="number" name="price" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''?>"/>
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='doansang-description' name="description" class="form-control"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option selected="selected" value="1">
                            Enabled
                        </option>
                        <option  value="0">
                            Disabled
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Lưu"/>
                <a href="index.php?controller=category&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
</div>

<?php include_once 'views/layouts/footer.php' ?>

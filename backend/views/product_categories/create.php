<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Thêm danh mục sản phẩm
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Loại sản phẩm</label>
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '';?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='description' name="description" class="form-control"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
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
                <a href="index.php?controller=productcategory&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
</div>

<?php include_once 'views/layouts/footer.php' ?>

<?php require_once 'views/layouts/header.php' ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Thêm đồ uống
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" enctype="multipart/form-data" action="index.php?controller=drink&action=create">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control"
                           value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                </div>

                <div class="form-group">
                    <label>
                        Ảnh sản phẩm
                        (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                    </label>
                    <input type="file" name="img" class="form-control">
                </div>
                <div class="form-group">
                    <label>Giá bán</label>
                    <input type="number" name="price" class="form-control"
                           value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>">
                </div>
                <div class="form-group">
                    <label>Miêu tả</label>
                    <textarea type="text" name="description"
                              class="form-control"><?php echo isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option selected="selected" value="1">Enabled</option>
                        <option value="0">Enabled</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Lưu">
                    <a href="index.php?controller=thucuong&action=index">Hủy</a>
                </div>
            </form>
        </section>
    </div>

<?php require_once 'views/layouts/footer.php' ?>
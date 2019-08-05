<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Thêm sản phẩm
        </h1>

    </section>
     <!-- Main content -->
        <section class="content">
         <form method="POST" action="" enctype="multipart/form-data">
             <div class="form-group">
                 <label>Loại sản phẩm</label>
                 <select class="form-control" name="product_category_id">
                     <?php if (!empty($product_category)): ?>
                         <?php foreach ($product_category as $value): ?>
                             <option value="<?php echo $value['id'] ?>" <?php echo isset($_POST['product_category_id']) && $value['id'] == $_POST['product_category_id'] ? "selected=true" : null ?>>
                                 <?php echo $value['name'] ?>
                             </option>
                         <?php endforeach; ?>
                     <?php endif; ?>
                 </select>
             </div>
             <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '';?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Tên tiếng Anh</label>
                <input type="text" name="english_name" value="<?php echo isset($_POST['english_name']) ? $_POST['english_name'] : '';?>" class="form-control"/>
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
                <textarea id='description' name="description" class="form-control"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Ghi chú</label>
                    <select name="highlight" class="form-control">
                        <option selected="selected" value="1">
                            Nổi bật
                        </option>
                        <option  value="0">
                            bình thường
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Lưu"/>
                <a href="index.php?controller=product&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
</div>

<?php include_once 'views/layouts/footer.php' ?>

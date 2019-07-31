<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cập nhật danh mục sản phẩm ID = <?php echo $product_category['id']?>
        </h1>

    </section>

    <section class="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Loại sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?php echo $product_category['name']; ?> "/>
            </div>

            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='description' name="description" class="form-control"><?php echo $product_category['description']; ?></textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <?php
                    $Enabled= '';
                    $Disabled = '';
                    if($product_category['status'] == 1){
                        $Enabled = "selected=true";
                    }
                    else{
                        $Disabled = "selected=true";
                    }
                    ?>

                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option <?php echo $Enabled ?> value="1" >Enabled</option>
                        <option <?php echo $Disabled ?> value="0" >Disabled</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Cập nhật"/>
                <a href="index.php?controller=productcategory&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
</div>
<?php include_once 'views/layouts/footer.php' ?>

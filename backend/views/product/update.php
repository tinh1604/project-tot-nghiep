<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cập nhật sản phẩm ID = <?php echo $product['id']?>
        </h1>

    </section>

    <section class="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?> "/>
            </div>
            <div class="form-group">
                <label>Tên tiếng Anh</label>
                <input type="text" name="english_name" class="form-control"  value="<?php echo $product['english_name']; ?> "/>
            </div>
            <div class="form-group">
                <label>
                    Upload ảnh sản phẩm
                    (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                </label>
                <input type="file" name="img" class="form-control">
            </div>
            <?php if(!empty($product['img'])): ?>
                <img src="assets/uploads/<?php echo $product['img']?>" width="100px"> <br/>
            <?php endif;?>
            <br/>
            <div class="form-group">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>"/>
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='description' name="description" class="form-control"><?php echo $product['description']; ?></textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <?php
                    $Enabled= '';
                    $Disabled = '';
                    if($product['status'] == 1){
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
                <a href="index.php?controller=product&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
</div>
<?php include_once 'views/layouts/footer.php' ?>

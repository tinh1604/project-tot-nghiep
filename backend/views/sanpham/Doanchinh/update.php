<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cập nhật đồ ăn chính có STT = <?php echo $doanchinh['STT']?>
        </h1>

    </section>

    <section class="content">
        <form method="POST" action="index.php?controller=doanchinh&action=update&id=<?php echo $doanchinh['STT'];?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?php echo $doanchinh['Ten_sp']; ?> "/>
            </div>
            <div class="form-group">
                <label>Tên tiếng Anh</label>
                <input type="text" name="nameEnglish" class="form-control"  value="<?php echo $doanchinh['Ten_tieng_Anh']; ?> "/>
            </div>
            <div class="form-group">
                <label>
                    Upload ảnh sản phẩm
                    (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                </label>
                <input type="file" name="img" class="form-control">
            </div>
            <?php if(!empty($doanchinh['Hinh_anh'])): ?>
                <img src="assets/uploads/<?php echo $doanchinh['Hinh_anh']?>" width="100px"> <br/>
            <?php endif;?>
            <br/>
            <div class="form-group">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" value="<?php echo $doanchinh['Gia']; ?>"/>
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='description' name="description" class="form-control"><?php echo $doanchinh['Mieu_ta']; ?></textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <?php
                    $Enabled_doanchinh= '';
                    $Disabled_doanchinh = '';
                    if($doanchinh['Trang_thai'] == 1){
                        $Enabled_doanchinh = "selected=true";
                    }
                    else{
                        $Disabled_doanchinh = "selected=true";
                    }
                    ?>

                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option <?php echo $Enabled_doanchinh?> value="1" >Enabled</option>
                        <option <?php echo $Disabled_doanchinh?> value="0" >Disabled</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Cập nhật"/>
                <a href="index.php?controller=doanchinh&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
</div>
<?php include_once 'views/layouts/footer.php' ?>

<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cập nhật đồ ăn sáng có STT = <?php echo $doansang['STT']?>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <form method="POST" action="index.php?controller=doansang&action=update&id=<?php echo $doansang['STT'];?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value=" <?php echo $doansang['Ten_sp']; ?> "/>
            </div>
            <div class="form-group">
                <label>Tên tiếng Anh</label>
                <input type="text" name="nameEnglish" class="form-control"  value="<?php echo $doansang['Ten_tieng_Anh']; ?> "/>
            </div>
            <div class="form-group">
                <label>
                    Upload ảnh sản phẩm
                    (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                </label>
                <input type="file" name="img" class="form-control">
            </div>
            <?php if(!empty($doansang['Hinh_anh'])): ?>
                <img src="assets/uploads/<?php echo $doansang['Hinh_anh']?>" width="100px"> <br/>
            <?php endif;?>
            <br/>
            <div class="form-group">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" value="<?php echo $doansang['Gia']; ?>"/>
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='description' name="description" class="form-control"><?php echo $doansang['Mieu_ta']; ?></textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <?php
                    $Enabled_doansang = '';
                    $Disabled_doansang = '';
                    if($doansang['Trang_thai'] == 1){
                        $Enabled_doansang = "selected=true";
                    }
                    else{
                        $Disabled_doansang = "selected=true";
                    }
                    ?>

                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option <?php echo $Enabled_doansang?> value="1" >Enabled</option>
                        <option <?php echo $Disabled_doansang?> value="0" >Disabled</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Cập nhật"/>
                <a href="index.php?controller=doansang&action=index"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layouts/footer.php' ?>

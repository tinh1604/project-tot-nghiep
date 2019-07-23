<?php include_once 'views/layouts/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Đồ ăn sáng
        </h1>
    </section>

    <!-- Main content -->
    <section style="margin: 10px" >
        <a class="btn btn-primary"
           href="index.php?controller=doansang&action=create">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
    </section>
    <table class="table" >
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Tên tiếng Anh</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Miêu tả</th>
        <th>Thời gian tạo</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>

        <?php if (!empty($doansang)): ?>
            <?php foreach ($doansang as $value): ?>
                <tr>
                    <td>
                    <?php echo $value['STT']; ?>
                    </td>

                    <td>
                        <?php echo $value['Ten sp']; ?>
                    </td>
                    <td>
                        <?php echo $value['Ten tieng Anh']; ?>
                    </td>
                    <td>
                        <?php echo $value['Hinh anh']?>
                    </td>
                    <td>
                        <?php echo $value['Gia']; ?>
                    </td>
                    <td>
                        <?php echo $value['Mieu ta']; ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y H:i:s', Strtotime($value['Thoi gian tao'])) ; ?>
                    </td>
                    <td>
                        <?php
                        $status = '';
                        switch ($value['Trang thai']){
                            case 1 : $status = 'Enabled';
                            break;
                            case 0 : $status = 'Disabled';
                                break;
                        }
                        echo $status;
                        ?>

                    </td>
                    <td>
                        <?php
                        $urlDetail = 'index.php?controller=doansang&action=detail&id='.$value['STT'];
                        $urlUpdate = 'index.php?controller=doansang&action=update&id='.$value['STT'];
                        $urlDelete = "index.php?controller=doansang&action=delete&id={$value['STT']}";
                        ?>
                        <a href="<?php echo $urlDetail?>"><span class="fa fa-eye"></span></a>
                        <a href="<?php echo $urlUpdate?>"><span class="fa fa-pencil"></span></a>
                        <a href="<?php echo $urlDelete?>" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này không?');"><span class="fa fa-trash"></span></a>
                    </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="8">Không có dữ liệu.</td>
        </tr>

        <?php endif; ?>

    </table>
</div>
<?php include_once 'views/layouts/footer.php' ?>


<?php //include_once 'views/layouts/header.php' ?>
<!--<!-- Content Wrapper. Contains page content -->-->
<!--<div class="content-wrapper">-->
<!--    <!-- Content Header (Page header) -->-->
<!--    <section class="content-header">-->
<!--        <h1>-->
<!--            Đồ ăn sáng-->
<!--        </h1>-->
<!--    </section>-->
<!---->
<!--    <!-- Main content -->-->
<!--    <section style="margin: 10px" >-->
<!--        <a class="btn btn-primary"-->
<!--           href="index.php?controller=doansang&action=create">-->
<!--            <span class="glyphicon glyphicon-plus"></span>-->
<!--            Thêm mới-->
<!--        </a>-->
<!--    </section>-->
<!--    <table class="table" >-->
<!--        <th>STT</th>-->
<!--        <th>Tên sản phẩm</th>-->
<!--        <th>Tên tiếng Anh</th>-->
<!--        <th>Hình ảnh</th>-->
<!--        <th>Giá</th>-->
<!--        <th>Miêu tả</th>-->
<!--        <th>Thời gian tạo</th>-->
<!--        <th>Trạng thái</th>-->
<!--        <th>Thao tác</th>-->
<!---->
<!--        --><?php //if (!empty($doansang)): ?>
<!--            --><?php //foreach ($doansang as $value): ?>
<!--                <tr>-->
<!--                    <td>-->
<!--                        --><?php //echo $value['STT']; ?>
<!--                    </td>-->
<!---->
<!--                    <td>-->
<!--                        --><?php //echo $value['Ten sp']; ?>
<!--                    </td>-->
<!--                    <td>-->
<!--                        --><?php //echo $value['Ten tieng Anh']; ?>
<!--                    </td>-->
<!--                    <td>-->
<!--                        --><?php //echo $value['Hinh anh']?>
<!--                    </td>-->
<!--                    <td>-->
<!--                        --><?php //echo $value['Gia']; ?>
<!--                    </td>-->
<!--                    <td>-->
<!--                        --><?php //echo $value['Mieu ta']; ?>
<!--                    </td>-->
<!--                    <td>-->
<!--                        --><?php //echo date('d-m-Y H:i:s', Strtotime($value['Thoi gian tao'])) ; ?>
<!--                    </td>-->
<!--                    <td>-->
<!--                        --><?php
//                        $status = '';
//                        switch ($value['Trang thai']){
//                            case 1 : $status = 'Enabled';
//                                break;
//                            case 0 : $status = 'Disabled';
//                                break;
//                        }
//                        echo $status;
//                        ?>
<!---->
<!--                    </td>-->
<!--                    <td>-->
<!--                        --><?php
//                        $urlDetail = 'index.php?controller=doansang&action=detail&id='.$value['STT'];
//                        $urlUpdate = 'index.php?controller=doansang&action=upload&id='.$value['STT'];
//                        $urlDelete = "index.php?controller=doansang&action=delete&id={$value['STT']}";
//                        ?>
<!--                        <a href="--><?php //echo $urlDetail?><!--"><span class="fa fa-eye"></span></a>-->
<!--                        <a href="--><?php //echo $urlUpdate?><!--"><span class="fa fa-pencil"></span></a>-->
<!--                        <a href="--><?php //echo $urlDelete?><!--" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này không?');"><span class="fa fa-trash"></span></a>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            --><?php //endforeach; ?>
<!--        --><?php //else: ?>
<!--            <tr>-->
<!--                <td colspan="8">Không có dữ liệu.</td>-->
<!--            </tr>-->
<!---->
<!--        --><?php //endif; ?>
<!---->
<!--    </table>-->
<!--</div>-->
<?php //include_once 'views/layouts/footer.php' ?>

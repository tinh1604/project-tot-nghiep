<?php include_once 'views/layouts/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh mục sản phẩm
            <small>Control panel</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary"
           href="index.php?controller=productcategory&action=create">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Loại sản phẩm</th>
                <th>Miêu tả</th>
                <th>Trang thái</th>
                <th>Thời gian tạo</th>
                <th>Chi tiết / sửa / xóa</th>
            </tr>
            <?php if (!empty($product_category)): ?>
                <?php foreach ($product_category as $value): ?>
                    <tr>
                        <td>
                            <?php echo $value['id']; ?>
                        </td>
                        <td>
                            <?php echo $value['name']; ?>
                        </td>
                        <td>
                            <?php echo $value['description']; ?>
                        </td>
                        <td>
                            <?php
                            $statusText = '';
                            switch ($value['status']) {
                                case Product_category::STATUS_ENABLED: $statusText = 'Active';
                                break;
                                case Product_category::STATUS_DISABLED: $statusText = 'Disabled';
                                    break;
                            }
                            echo $statusText;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo date('d-m-Y H:i:s',
                                strtotime($value['created_at']));
                            ?>
                        </td>
                        <td>
                            <?php
                            $urlDetail = 'index.php?controller=productcategory&action=detail&id=' . $value['id'];
                            $urlUpdate = 'index.php?controller=productcategory&action=update&id=' . $value['id'];
                            $urlDelete = 'index.php?controller=productcategory&action=delete&id=' . $value['id'];
                            ?>                          &nbsp;
                            <a href="<?php echo $urlDetail?>"><i class="fas fa-eye"></i></a>
                            <a href="<?php echo $urlUpdate?>"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo $urlDelete?>" ><i class="fas fa-trash-alt"></i></a>&nbsp;
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">
                        Không có bản ghi nào
                    </td>
                </tr>
            <?php endif; ?>
        </table>
        <?php
        ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layouts/footer.php' ?>

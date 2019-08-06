<?php include_once 'views/layouts/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh mục tin tức
            <small>Control panel</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary"
           href="index.php?controller=category&action=create">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Miêu tả</th>
                <th>Trạng thái</th>
                <th>Thời gian tạo</th>
                <th>Xem / sửa / xóa</th>
            </tr>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td>
                            <?php echo $category['id']; ?>
                        </td>
                        <td>
                            <?= $category['name']; ?>
                        </td>
                        <td>
                            <?= $category['description']; ?>
                        </td>
                        <td>
                            <?php
                            $statusText = '';
                            switch ($category['status']) {
                                case Category::STATUS_ENABLED: $statusText = 'Active';
                                break;
                                case Category::STATUS_DISABLED: $statusText = 'Disabled';
                                    break;
                            }
                            echo $statusText;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo date('d-m-Y H:i:s',
                                strtotime($category['created_at']));
                            ?>
                        </td>
                        <td>
                            <?php
                            $urlDetail = 'index.php?controller=category&action=detail&id=' . $category['id'];
                            $urlUpdate = 'index.php?controller=category&action=update&id=' . $category['id'];
                            $urlDelete = 'index.php?controller=category&action=delete&id=' . $category['id'];
                            ?>                          &nbsp;
                            <a href="<?php echo $urlDetail?>"><i class="fas fa-eye"></i></a> &nbsp; &nbsp;
                            <a href="<?php echo $urlUpdate?>"><i class="fas fa-edit"></i></a>&nbsp; &nbsp;
                            <a href="<?php echo $urlDelete?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này không?')"><i class="fas fa-trash-alt"></i></a>&nbsp;
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
        //hiển thị phân trang
        echo $pages;
        ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layouts/footer.php' ?>

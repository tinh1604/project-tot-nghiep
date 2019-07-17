<?php include_once 'views/layouts/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if (!empty($categories)): ?>
        <h3>Danh sách category trên hệ thống</h3>
            <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm category mới</a>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created_at</th>
                    <th></th>
                </tr>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $category['id']?></td>
                    <td><?php echo $category['name']?></td>
                    <td><?php echo date('d-m-Y H:i:s', strtotime($category['created_at']))?></td>
                    <td>
                        <a href="#"><i class="fa fa-eye"></i></a>&nbsp;
                        <a href="#"><i class="fa fa-pencil"></i></a>&nbsp;
                        <a href="#"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <h4>Không có bản ghi nào</h4>
        <?php endif; ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layouts/footer.php' ?>

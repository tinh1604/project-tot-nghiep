<?php include_once 'views/layouts/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2>
            Danh mục tin tức
            <small>Control panel</small>
        </h2>
    </section>

    <!-- Main content -->
    <section class="content">
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>
                    <?php echo $category['id']; ?>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>
                    <?php echo $category['name']; ?>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <?php echo $category['description']; ?>
                </td>
            </tr>
            <tr>
                <td>Status</td>
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
            </tr>
            <tr>
                <td>Created at</td>
                <td>
                    <?php
                    echo date('d-m-Y H:i:s',
                        strtotime($category['created_at']));
                    ?>
                </td>
            </tr>
        </table>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layouts/footer.php' ?>

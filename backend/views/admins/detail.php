<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quản lý Admin
            <small>Control panel</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <h3>Chi tiết admin #<?php echo $admin['id']?></h3>
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>
                    <?php echo $admin['id']; ?>
                </td>
            </tr>
            <tr>
                <td>Role name</td>
                <td>
                    <?php echo $admin['role_name']; ?>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td>
                    <?php echo $admin['username']; ?>
                </td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>
                    <?php
                    echo date('d-m-Y H:i:s',
                        strtotime($admin['created_at']));
                    ?>
                </td>
            </tr>
        </table>
        <a href="index.php?controller=admin&action=index" class="btn btn-primary">Back</a>
    </section>
</div>
<?php include_once 'views/layouts/footer.php' ?>

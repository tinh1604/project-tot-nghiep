<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quản lý tin tức
            <small>Control panel</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <h2>Chi tiết tin tức #<?php echo $news['id']?></h2>
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>
                    <?php echo $news['id']; ?>
                </td>
            </tr>
            <tr>
                <td>Title</td>
                <td>
                    <?php echo $news['title']; ?>
                </td>
            </tr>
            <tr>
                <td>Categoy name</td>
                <td>
                    <?php echo $news['category_name']; ?>
                </td>
            </tr>
            <tr>
                <td>Admin name</td>
                <td>
                  <?php echo $news['admin_username']; ?>
                </td>
            </tr>
            <tr>
                <td>Avatar</td>
                <td>
                    <?php if(!empty($news['avatar'])): ?>
                    <img src="assets/uploads/<?php echo $news['avatar']?>"
                         width="80px" />
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Summary</td>
                <td>
                  <?php echo $news['summary']; ?>
                </td>
            </tr>
            <tr>
                <td>Content</td>
                <td>
                  <?php echo $news['content']; ?>
                </td>
            </tr>
            <tr>
                <td>Comment total</td>
                <td>
                  <?php echo $news['comment_total']; ?>
                </td>
            </tr>
            <tr>
                <td>Author</td>
                <td>
                  <?php echo $news['author']; ?>
                </td>
            </tr>
            <tr>
                <td>View</td>
                <td>
                  <?php echo $news['view']; ?>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <?php
                    $statusText = '';
                    switch ($news['status']) {
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
                        strtotime($news['created_at']));
                    ?>
                </td>
            </tr>
        </table>
        <a href="index.php?controller=news&action=index" class="btn btn-primary">Back</a>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layouts/footer.php' ?>

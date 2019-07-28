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
        <a class="btn btn-primary"
           href="index.php?controller=admin&action=create">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
        <h2>Danh sách admin trên hệ thống</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Username</th>
                <th>Created_at</th>
                <th>Ation</th>
            </tr>
          <?php if (!empty($admins)): ?>
            <?php foreach ($admins as $admin): ?>
                  <tr>
                      <td>
                        <?php echo $admin['id']; ?>
                      </td>
                      <td>
                        <?php echo $admin['role_name']; ?>
                      </td>
                      <td>
                        <?php echo $admin['username']; ?>
                      </td>
                      <td>
                        <?php
                        echo date('d-m-Y H:i:s',
                          strtotime($admin['created_at']));
                        ?>
                      </td>
                      <td>
                        <?php
                        $urlDetail = 'index.php?controller=admin&action=detail&id=' . $admin['id'];
                        $urlUpdate = 'index.php?controller=admin&action=update&id=' . $admin['id'];
                        $urlDelete = 'index.php?controller=admin&action=delete&id=' . $admin['id'];
                        ?>
                          <a href="<?php echo $urlDetail ?>"><i class="fas fa-eye"></i></a> &nbsp
                          <a href="<?php echo $urlUpdate?>"><i class="fas fa-edit"></i></a>&nbsp
                          <a href="<?php echo $urlDelete?>" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không')"><i class="fas fa-trash-alt"></i></a> &nbsp;
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
      //hiển thị phân trang đã có được từ controller
      echo $pages;
      ?>
    </section>
</div>
<?php include_once 'views/layouts/footer.php' ?>

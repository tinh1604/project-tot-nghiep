<?php include_once 'views/layouts/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quản lý Admin
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <h3>Thêm tài khoản</h3>
        <form method="POST" action="">
            <div class="form-group">
                <label>Chọn quyền cho admin</label>
                <select class="form-control" name="role_id">
                  <?php if (!empty($roles)): ?>
                    <?php foreach ($roles as $role): ?>
                          <option value="<?php echo $role['id'] ?>" <?php echo isset($_POST['role_id']) && $role['id'] == $_POST['role_id'] ? "selected=true" : null ?>>
                            <?php echo $role['name'] ?>
                          </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username"
                       value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                       value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Nhập lại Password</label>
                <input type="password" name="password_confirm" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Save"/>
                <a href="index.php?controller=admin&action=index"
                   class="btn btn-secondary">Back</a>
            </div>
        </form>
</div>
</section>
</div>
<?php include_once 'views/layouts/footer.php' ?>

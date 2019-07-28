<?php include_once 'views/layouts/header.php' ?>
<div class="form-login container">
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>
    <form action="" method="post" style="width: 30%; margin: 20px auto">
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" class="form-control" name="password"/>
        </div>
        <div class="form-group center-align" >
            <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary" style="display:block; margin: 0 auto"/>
        </div>
    </form>
</div>
<?php include_once 'views/layouts/footer.php' ?>

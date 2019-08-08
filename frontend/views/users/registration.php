<?php include_once 'views/layouts/header.php' ?>
<!--Main container start -->
<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="row">

            <div class="col-md-10 col-12">
                <p class="cont12">Tạo một tài khoản</p>
                <div style=" width: 50%; margin: 5px auto">
                    <?php  if(isset($_SESSION['error'])):?>
                        <div class="alert alert-danger" style="background: red; color: white; text-align: center">
                            <?php
                            echo $_SESSION['error'] ;
                            unset($_SESSION['error'])
                            ?>

                        </div>
                    <?php  endif; ?>
                    <?php  if(isset($_SESSION['registration'])):?>
                        <div class="alert alert-success" style="background: green; color: white; text-align: center">
                            <?php
                            echo $_SESSION['registration'] ;
                            unset($_SESSION['registration'])
                            ?>

                        </div>
                    <?php  endif; ?>
                </div>
                <form action="" method="post" id="dangki">
                    <input class="dangki1" type="text" name="first_name" placeholder="Họ" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''?>">
                    <input class="dangki1" type="text" name="last_name" placeholder="Tên" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''?>">
                    <input class="dangki2" type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>">
                    <input class="dangki2" type="password" name="password" placeholder="Mật khẩu ít nhất 8 kí tự">
                    <input class="dangki2" type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                    <input class="submit1" type="submit" name="submit" value="Đăng ký"> <br/>
                </form>


                <br/>
            </div>


            <?php include_once 'views/layouts/sidebar-right.php' ?>

        </div>
    </div><br/>
</div>


<?php include_once 'views/layouts/footer.php' ?>


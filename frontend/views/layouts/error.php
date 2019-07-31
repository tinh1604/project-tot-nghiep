<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php
        //nơi hiển thị thông báo lỗi nếu có
        //sau khi thông báo lỗi xong cần xóa session này đi, để tránh việc hiển thị lại sau mỗi lần
        //            refresh trang
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success" role="alert">
        <?php
        //nơi hiển thị thông báo thành công nếu có
        //sau khi thông báo lỗi xong cần xóa session này đi, để tránh việc hiển thị lại sau mỗi lần
        //            refresh trang
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </div>
<?php endif; ?>
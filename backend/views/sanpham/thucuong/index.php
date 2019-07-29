<?php require_once 'views/layouts/header.php' ?>
<div class="content-wrapper" style="padding-bottom: 20px">
    <div class="content-header">
        <h1>
            Thức uống
            <small>Control panel</small>
        </h1>
    </div>

    <div class="search-form content">
        <h4>Tìm kiếm</h4>
        <!-- SEARCH nên để method get để có thể xử lý cho trường hợp phân trang-->
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-5 col-12">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name_drink" value="<?php echo isset($_GET['name_drink']) ? $_GET['name_drink'] : ''?>" class="form-control"/>
                </div>
                <div class="col-md-3 col-12">
                    <label>Giá</label>
                    <input type="number" name="price_drink" value="<?php echo isset($_GET['price_drink']) ? $_GET['price_drink'] : ''?>" class="form-control"/>
                </div>
                <!--cần thêm 2 input hidden tương ứng với 2 param controller và action trên url-->
                <input type="hidden" name="controller" value="<?php echo isset($_GET['controller']) ? $_GET['controller'] : ''?>"/>
                <input type="hidden" name="action" value="<?php echo isset($_GET['action']) ? $_GET['action'] : ''?>"/>
            </div>
            <br />
            <div class="form-group">
                <button type="submit" name="submit_search" class="btn btn-success">
                    <span class="fa fa-search"></span> Tìm kiếm
                </button>
                <a href="index.php?controller=drink&action=index" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <div style="margin: 10px">
        <a class="btn btn-primary"
           href="index.php?controller=drink&action=create"><span>Thêm mới</span></a>
    </div>
    <table class="table">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Miêu tả</th>
        <th>Thời gian tạo</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>
    <?php if (!empty($drink)): ?>
        <?php foreach ($drink as $value): ?>
            <tr>
                <td><?php echo $value['ID'] ?></td>
                <td><?php echo $value['Name'] ?></td>
                <td><?php echo $value['Img'] ?></td>
                <td><?php echo $value['Price'] ?></td>
                <td><?php echo $value['Description'] ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($value['Created_at'])) ?></td>
                <td><?php
                    $status = '';
                    if ($value['Status'] == 1) {
                        $status = 'Enabled';
                    } else {
                        $status = 'Disable';
                    }
                    echo $status;
                    ?>
                </td>
                <td>
                    <?php $UrlDetail = 'index.php?controller=drink&action=detail&id='.$value['ID']?>
                    <?php $UrlUpdate = 'index.php?controller=drink&action=update&id='.$value['ID']?>
                    <?php $UrlDelete = 'index.php?controller=drink&action=delete&id='.$value['ID']?>
                    <a href="<?php echo $UrlDetail ?>"><i class="fas fa-eye"></i></a><br/>
                    <a href="<?php echo $UrlUpdate?>"><i class="fas fa-edit"></i></a><br/>
                    <a href="<?php echo $UrlDelete?>"><i class="fas fa-trash-alt"></i></a>
                </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td>Không có dữ liệu đồ uống nào</td>
        </tr>
    <?php endif; ?>

    </table>
    <?php
    //hiển thị phân trang đã có được từ controller
    echo $pages;
    ?>
</div>

<?php require_once 'views/layouts/footer.php' ?>

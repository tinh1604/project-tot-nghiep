<?php include_once 'views/layouts/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding-bottom: 20px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản phẩm
            <small>Control panel</small>
        </h1>
    </section>

    <!-- Main content -->
    <div class="search-form content">
        <h4>Tìm kiếm</h4>
        <!-- SEARCH nên để method get để có thể xử lý cho trường hợp phân trang-->
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-4 col-12">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''?>" class="form-control"/>
                </div>
                <div class="col-md-4 col-12">
                    <label>Loại sản phẩm</label>
                    <select class="form-control" name="product_category_id">
                        <option value="0">Chọn</option>
                        <?php if (!empty($product_category)): ?>
                            <?php foreach ($product_category as $value): ?>
                                <option value="<?php echo $value['id'] ?>" <?php echo isset($_GET['product_category_id']) && $value['id'] == $_GET['product_category_id'] ? "selected=true" : null ?>>
                                    <?php echo $value['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-3 col-12">
                    <label>Giá</label>
                    <input type="number" name="price" value="<?php echo isset($_GET['price']) ? $_GET['price'] : ''?>" class="form-control"/>
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
                <a href="index.php?controller=product&action=index" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>


    <section style="margin: 10px" >
        <a class="btn btn-primary"
           href="index.php?controller=product&action=create">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
    </section>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Tên tiếng Anh</th>
            <th>Loại sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th style="text-align: center">Miêu tả</th>
            <th>Thời gian tạo</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>

        <?php if (!empty($product)): ?>
            <?php foreach ($product as $value): ?>
                <tr>
                    <td>
                    <?php echo $value['id']; ?>
                    </td>

                    <td>
                        <?php echo $value['name']; ?>
                    </td>
                    <td>
                        <?php echo $value['english_name']; ?>
                    </td>
                    <td>
                        <?php echo $value['product_category_name']; ?>
                    </td>
                    <td>
                        <?php if (!empty($value['img'])): ?>
                            <img width="100px" src="assets/uploads/<?php echo $value['img'] ?>"
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo $value['price']; ?>
                    </td>
                    <td>
                        <?php echo $value['description']; ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y H:i:s', Strtotime($value['created_at'])) ; ?>
                    </td>
                    <td>
                        <?php
                        $highlight = '';
                        switch ($value['highlight']){
                            case 1: $highlight = 'Nổi bật';
                            break;
                            case 0: $highlight = 'bình thường';
                                break;
                        }
                        echo $highlight;
                        ?>

                    </td>
                    <td>
                        <?php
                        $urlDetail = 'index.php?controller=product&action=detail&id='.$value['id'];
                        $urlUpdate = 'index.php?controller=product&action=update&id='.$value['id'];
                        $urlDelete = "index.php?controller=product&action=delete&id={$value['id']}";
                        ?>
                        <a href="<?php echo $urlDetail?>"><i class="fas fa-eye"></i></a><br/>
                        <a href="<?php echo $urlUpdate?>"><i class="fas fa-edit"></i></a><br/>
                        <a href="<?php echo $urlDelete?>"><i class="fas fa-trash-alt"></i></a>
                    </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="8">Không có dữ liệu.</td>
        </tr>

        <?php endif; ?>

    </table>
    <?php
    //hiển thị phân trang đã có được từ controller
    echo $pages;
    ?>
</div>
<?php include_once 'views/layouts/footer.php' ?>

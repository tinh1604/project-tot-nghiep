<?php include_once 'views/layouts/header.php' ?>
<!--Main container start -->

<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="search-form content" style="padding-top: 20px">
            <h5>Tìm kiếm</h5>
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
                    <div class="col-md-4 col-12">
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
                    <a href="thuc-don" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
        <div class="row">

            <div class="col-md-10 col-12">

                <div id="main2">
                    <p style="display: block; margin:  20px auto" class="content10"><?php echo $product_category_name ?></p>

                    <div class="container">

                        <div class="row">
                            <?php if (!empty($product)): ?>
                                <?php foreach ($product as $value):
                                    $alias = Helper::alias($value['name']);
                                    $id = $value['id'];
                                    $urlProduct = "san-pham/$alias/$id";
                                    ?>
                                    <div class="col-md-3 col-12">
                                        <div class="block9" class="row">
                                            <a href="<?php echo $urlProduct ?>" class="hvr-grow"> <img class="img6" src="../backend/assets/uploads/<?php echo $value['img'] ?>"/>
                                            </a>
                                            <a class="content12"
                                               href="<?php echo $urlProduct ?>"><?php echo $value['name'] ?></a>
                                            <p class="content14"><?php echo number_format($value['price'],0,',','.').' VNĐ' ?></p>
                                            <a href="<?php echo $urlProduct ?>">
                                                <button class="content15"><i class="fas fa-utensils"></i>Chọn món</button>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>


                    </div>
                    <?php
                    //hiển thị phân trang đã có được từ controller
                    echo $pages;
                    ?>
                </div> <br/>
            </div>

            <?php include_once 'views/layouts/sidebar-right.php' ?>

        </div>
    </div>
</div>
<?php include_once 'views/layouts/footer.php' ?>

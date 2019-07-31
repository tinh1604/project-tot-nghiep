<?php include_once 'views/layouts/header.php' ?>
<!--Main container start -->
<!--Main container start -->
<main class="main-container">

    <section class="main-content">
        <div class="main-content-wrapper">
            <div class="content-body">
                <?php require_once 'views/layouts/error.php' ?>
                <div class="content-timeline">
                    <!--Timeline header area start -->
                    <div class="post-list-header">
                        <span class="post-list-title">Giỏ hàng của bạn</span>
                    </div>
                    <!--Timeline header area end -->
                    <!--Timeline items start -->
                    <?php
                    if (isset($_SESSION['cart'])):
                        ?>
                        <div class="timeline-items">
                            <form action="" method="post">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="40%">Tên sản phẩm</th>
                                        <th width="12%">Số lượng</th>
                                        <th>Giá</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                    <?php foreach ($_SESSION['cart'] as $id => $product):
                                        if (!is_numeric($id)) continue;
                                        $productAlias = Helper::alias($product['name']);
                                        $productUrl = "san-pham/$productAlias/$id";
                                        ?>
                                        <tr>
                                            <td>
                                                <img class="product-avatar img-responsive"
                                                     src="../backend/assets/uploads/<?php echo $product['avatar'] ?>"
                                                     width="80"/>
                                                <div class="content-product">
                                                    <a href="<?php echo $productUrl ?>" class="content-product-a">
                                                        <?php echo $product['name'] ?>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" min="0" name="<?php echo $id ?>"
                                                       class="product-amount form-control"
                                                       value="<?php echo $product['quantity'] ?>"/>
                                            </td>
                                            <td>
                                            <span class="product-price">
                                                <?php echo number_format($product['price']) ?>
                                                vnđ
                                            </span>
                                            </td>
                                            <td>
                                                <span class="product-price-total">
                                                    <?php
                                                    echo number_format
                                                    ($product['price'] * $product['quantity']) ?>
                                                    vnđ
                                                </span>
                                            </td>
                                            <td>
                                                <a class="content-product-a"
                                                   href="xoa-san-pham/<?php echo $id ?>">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="5" style="text-align: right">
                                            Tổng giá trị đơn hàng:
                                            <span class="product-price">
                                            <?php echo number_format($_SESSION['cart']['total']) ?> vnđ
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="product-payment">
                                            <input type="submit" name="submit" value="Cập nhật lại giá"
                                                   class="btn btn-primary"/>
                                            <a href="thanh-toan" class="btn btn-success">Đến trang thanh toán</a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    <?php else: ?>
                        <h5>Giỏ hàng trống</h5>
                    <a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
                    <?php endif; ?>
                    <!--Timeline items end -->
                </div>

            </div>
            <?php
            //sidebar-right
            require_once 'views/layouts/sidebar-right.php';
            ?>
        </div>
    </section>

</main>
<?php include_once 'views/layouts/footer.php' ?>

<?php include_once 'views/layouts/header2.php' ?>
<!--Main container start -->
<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="row">

            <main class="main-container">
                <section class="main-content">
                    <div class="main-content-wrapper">
                        <div class="content-timeline">
                            <!--Timeline header area start -->
                            <div class="post-list-header">
                                <span class="post-list-title">Giỏ hàng của bạn</span>
                            </div>
                            <form action="" method="post">
                                <div class="timeline-items">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <h5 class="center-align">Thông tin khách hàng</h5>
                                            <div class="form-group">
                                                <label>Họ tên khách hàng</label>
                                                <input type="text" name="fullname" value="" required class="form-control"
                                                       placeholder=""/>
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" name="address" value="" required class="form-control"
                                                       placeholder=""/>
                                            </div>
                                            <div class="form-group">
                                                <label>SĐT</label>
                                                <input type="number" min="0" name="mobile" value="" required class="form-control"
                                                       placeholder=""/>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" min="0" name="email" value="" required class="form-control"
                                                       placeholder=""/>
                                            </div>
                                            <div class="form-group">
                                                <label>Ghi chú thêm</label>
                                                <textarea name="note" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <h5 class="center-align">Thông tin đơn hàng của bạn</h5>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="40%">Tên sản phẩm</th>
                                                    <th width="12%">Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                                <?php
                                                foreach ($_SESSION['cart'] as $id => $product) :
                                                    //bỏ qua trường hợp key = total
                                                    if (!is_numeric($id)) continue;
                                                    $productUrl = "san-pham/" . Helper::alias($product['name']) . "/$id";
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <img class="product-avatar img-responsive"
                                                                 src="../backend/assets/uploads/<?php echo $product['avatar'] ?>"
                                                                 width="60"/>
                                                            <div class="content-product">
                                                                <a href="<?php echo $productUrl ?>" class="content-product-a">
                                                                    <?php echo $product['name']; ?>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                              <span class="product-amount">
                                                  <?php echo $product['quantity']; ?>
                                              </span>
                                                        </td>
                                                        <td>
                                              <span class="product-price-payment">
                                                 <?php echo number_format($product['price'], 0, '.', '.')?> vnđ
                                              </span>
                                                        </td>
                                                        <td>
                                              <span class="product-price-payment">
                                                 <?php echo number_format($product['price'] * $product['quantity'], 0, '.', '.')?>  vnđ
                                              </span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td colspan="5" class="product-total">
                                                        Tổng giá trị đơn hàng:
                                                        <span class="product-price">
                                                <?php echo number_format($_SESSION['cart']['total'], 0, '.', '.')?> vnđ
                                            </span>
                                                    </td>
                                                </tr>

                                            </table>

                                            <input type="submit" name="submit" value="Thanh toán" class="btn btn-primary"/>
                                            <a href="gio-hang-cua-ban" class="btn btn-secondary">Về trang giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

            </

            <?php include_once 'views/layouts/sidebar-right.php' ?>

        </div>
    </div>
</div>
<?php include_once 'views/layouts/footer.php' ?>

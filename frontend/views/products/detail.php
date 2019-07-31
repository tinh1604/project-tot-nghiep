<?php include_once 'views/layouts/header.php' ?>
<!--Main container start -->
<!--Main container start -->
<main class="main-container">
    <section class="main-content">
        <div class="main-content-wrapper">
            <div class="content-body">
                <div class="content-timeline">
                    <!--Timeline header area start -->
                    <div class="post-list-header">
                        <span class="post-list-title">Chi tiết sản phẩm</span>
                        <!--
                        -->
                    </div>
                    <!--Timeline header area end -->
                    <!--Timeline items start -->
                    <div class="timeline-items">
                        <?php
                        $alias = Helper::alias($product['name']);
                        $id = $product['id'];
                        $urlProduct = "san-pham/$alias/$id";
                        $productCartUrl = "them-gio-hang/$id";
                        ?>
                        <div class="timeline-item">
                            <div class="timeline-left">
                                <div class="timeline-left-wrapper">
                                    <a href="<?php $urlProduct ?>" class="timeline-category" data-zebra-tooltip
                                       title="<?php echo $product['name']; ?>"><i
                                                class="material-icons">&#xE894;</i></a>
                                    <span class="timeline-date">
                                        <?php
                                        echo date('d-m-Y', strtotime($product['created_at']));
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="timeline-right">
                                <div class="timeline-post-image">
                                    <a href="<?php echo $urlProduct; ?>">
                                        <img src="../backend/assets/uploads/<?php echo $product['avatar'] ?>"
                                             width="260">
                                    </a>
                                </div>
                                <div class="timeline-post-content">
                                    <a href="<?php echo $urlProduct ?>" class="timeline-category-name">
                                        <?php echo $product['category_name']; ?>
                                    </a>
                                    <h3 class="timeline-post-title">
                                        <?php echo $product['name'] ?>
                                    </h3>
                                    <div class="timeline-post-info">
                                        <a href="<?php echo $urlProduct ?>" class="author">
                                            <?php echo $product['admin_username'] ?>
                                        </a>
                                        <span class="dot"></span>
                                        <span class="comment">
                                            <?php echo number_format($product['price'], 0, '.', '.'); ?> VNĐ
                                        </span>
                                    </div>
                                    <a href="<?php echo $productCartUrl ?>" class="add-to-cart">Add to cart</a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--Timeline items end -->
                    <div class="detail timeline-items">
                        <b class="detail-summary">
                            <?php echo $product['summary'] ?>
                        </b>
                        <div class="detail-description">
                            <?php echo $product['content'] ?>
                        </div>
                    </div>
                    <div class="detail-comment">
                        <div class="fb-comments" data-href="https://sukien.net" data-width="" data-numposts="5"></div>
                    </div>
                </div>

            </div>
            <?php require_once 'views/layouts/sidebar-right.php' ?>
        </div>
    </section>

</main>
<?php include_once 'views/layouts/footer.php' ?>

<?php include_once 'views/layouts/header2.php' ?>
<!--Main container start -->
<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="row">

            <div class="col-md-10 col-12">

                <div id="main2">
                    <p style="display: block; margin:  20px auto" class="content10">MÓN CHÍNH</p>

                    <div class="container">

                        <div class="row">
                            <?php if (!empty($product)): ?>
                                <?php foreach ($product as $value):
                                    $alias = Helper::alias($value['name']);
                                    $id = $value['id'];
                                    $urlProduct = "san-pham/$alias/$id";
                                    ?>
                                    <div class="col-md-3 col-12">
                                        <div class="block8" class="row">
                                            <a href="<?php echo $urlProduct ?>" class="hvr-grow"> <img class="img6" src="../backend/assets/uploads/<?php echo $value['img'] ?>"/>
                                            </a>
                                            <a class="content12"
                                               href="<?php echo $urlProduct ?>"><?php echo $value['name'] ?></a>
                                            <p class="content14"><?php echo $value['price'] ?></p>
                                            <a href="<?php echo $urlProduct ?>">
                                                <button class="content15"><i class="fas fa-utensils"></i>Chọn món
                                                </button>
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
                </div>
                <br/>
            </div>

            <?php include_once 'views/layouts/sidebar-right.php' ?>

        </div>
    </div>
</div>
<?php include_once 'views/layouts/footer.php' ?>

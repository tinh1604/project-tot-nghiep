<?php include_once 'views/layouts/header2.php' ?>
<!--Main container start -->
<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="row">
            <div class="col-md-10 col-12">
                <div style="padding-top: 20px" id="main2">
                    <a href="DoAnChinh.html" class="content19">MÓN CHÍNH</a> <br/> <br/>
                    <div class="container">
                        <div class="row">
                            <?php
                            $alias = Helper::alias($product['name']);
                            $id = $product['id'];
                            $urlProduct = "san-pham/$alias/$id";
                            $productCartUrl = "them-gio-hang/$id";
                            ?>
                            <div class="col-md-6 col-12">
                                <img class="img10  hvr-grow" src="imgs/monchinh/1.bit tet.jpg" />
                            </div>
                            <div class="col-md-6 col-12">
                                <h3 style="font-family: 'Times New Roman'; font-weight: bold">Bít tết bò Mỹ</h3>
                                <p class="content20">American beef steak</p>
                                <p class="content21">Giá : <span class="content22">350.000 VNĐ</span></p>
                                <input type="number" name="dathang" value="1" style="width: 80px; text-align: center">
                                <a href="" ><button class="cont9"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button></a> <br/><br/>
                                <p style="font-family: 'Times New Roman'; font-size: 16px; text-decoration: underline; font-weight: bold">Miêu tả:</p>
                                <p style="font-family: 'Times New Roman'; font-size: 16px">
                                    Bò bít tết là món ăn sang trọng, đặc trưng của món ăn là miếng thịt bò to, mềm, khi thái ra vẫn còn màu hồng chín tái, với hương vị thơm ngon, thịt ngọt chấm với sốt tỏi hoặc nấm... Khi ăn nhâm nhi cùng chút salad hay khoai tây chiên, cảm giác thật là tuyệt!
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <?php include_once 'views/layouts/sidebar-right.php' ?>

        </div>
    </div>
</div>
<?php include_once 'views/layouts/footer.php' ?>

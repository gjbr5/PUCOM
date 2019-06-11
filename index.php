<?php
session_start();
include "func/Database.php";
?>
<!DOCTYPE html>
<html lang="ko">
<?php
include "partial/head.php"
?>
<body>
<!-- HEADER -->
<!-- NAVIGATION -->
<?php
include "partial/header.php"
?>
<!-- /NAVIGATION -->
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/desktop_odissey.jpg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Desktop<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#New_Desktops">Desktops</a></li>
                            <li><a data-toggle="tab" href="#New_Laptops">Laptops</a></li>
                            <li><a data-toggle="tab" href="#New_Mice">Mice</a></li>
                            <li><a data-toggle="tab" href="#New_Keyboards">Keyboards</a></li>
                            <li><a data-toggle="tab" href="#New_Accessories">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <?php
                        $category = [100, 200, 300, 400, 500];
                        for ($i = 0; $i < 5; $i++) {
                            $product = getProduct("SELECT * FROM product WHERE category=$category[$i] ORDER BY upload_date DESC LIMIT 5");
                            ?>
                            <!-- tab -->
                            <div id="<?php echo "New_" . getCategory($category[$i]); ?>" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    <?php
                                    foreach ($product as $item) { ?>

                                        <div class="product">
                                            <div class="product-img">
                                                <a href="product.php?c=<?php echo $item['category'] . "&pid=" . $item['product_id']; ?>">
                                                    <img src="<?php echo $item['img_url']; ?>"
                                                         alt="<?php echo $item['name']; ?>">
                                                </a>
                                                <?php
                                                if ($item['sales'] != 0) {
                                                    echo "
                                            <div class=\"product-label\">
                                                <span class=\"sale\">-" . $item['sales'] . "%</span>
                                                <span class=\"new\">NEW</span>
                                            </div>";
                                                } ?>
                                                <div class="product-btns">
                                                    <button class="quick-view"><i class="fa fa-eye"></i></a>
                                                        <span class="tooltipp">quick view</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo getCategory($category[$i]); ?></p>
                                                <h3 class="product-name"><a><?php echo $item['name']; ?></a>
                                                </h3>
                                                <h4 class="product-price">$<?php
                                                    if ($item['sales'] != 0) {
                                                        echo $item['price'] * (100 - $item['sales']) / 100;
                                                        echo " <del class=\"product-old-price\">$" . $item['price'] . "</del>";
                                                    } else {
                                                        echo $item['price'];
                                                    } ?>
                                                </h4>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
                                                    add to cart
                                                </button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Mins</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="store.php?c=10">Shop now</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top selling</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#Hot_Desktops">Desktops</a></li>
                            <li><a data-toggle="tab" href="#Hot_Laptops">Laptops</a></li>
                            <li><a data-toggle="tab" href="#Hot_Mice">Mice</a></li>
                            <li><a data-toggle="tab" href="#Hot_Keyboards">Keyboards</a></li>
                            <li><a data-toggle="tab" href="#Hot_Accessories">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <?php
                        $category = [100, 200, 300, 400, 500];
                        for ($i = 0; $i < 5; $i++) {
                            $product = getProduct("SELECT product.*, if(upload_date>now()-interval 1 month, 'y', 'n') as new FROM product WHERE category=$category[$i] ORDER BY upload_date DESC LIMIT 5");
                            ?>
                            <!-- tab -->
                            <div id="<?php echo "Hot_" . getCategory($category[$i]); ?>" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    <?php
                                    foreach ($product as $item) { ?>
                                        <div class="product">
                                            <div class="product-img">
                                                <a href="product.php?c=<?php echo $item['category'] . "&pid=" . $item['product_id']; ?>"><img
                                                            src="<?php echo $item['img_url']; ?>" alt=""></a>
                                                <?php
                                                echo "
                                                <div class=\"product-label\">
                                                <span class=\"sale\">-" . $item['sales'] . "%</span>";
                                                if ($item['new'] == 'y') echo "<span class=\"new\">NEW</span>";
                                                echo "</div>";
                                                ?>
                                                <div class="product-btns">
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                                class="tooltipp">quick view</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo getCategory($category[$i]); ?></p>
                                                <h3 class="product-name"><a><?php echo $item['name']; ?></a>
                                                </h3>
                                                <h4 class="product-price">$<?php
                                                    echo $item['price'] * (100 - $item['sales']) / 100;
                                                    echo " <del class=\"product-old-price\">$" . $item['price'] . "</del>";
                                                    ?>
                                                </h4>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add
                                                    to cart
                                                </button>
                                            </div>
                                        </div>
                                        <?php
                                    } ?>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<div id='quick-view-popup' style='display:none; width:200px'>
    <span class='button b-close' style='border-radius:7px 7px 7px 7px; box-shadow:none; font:bold 131% sans-serif; padding:0 6px 2px; position:absolute; right:-7px; top:-7px; background-color:#2b91af; color:#fff; cursor: pointer; display: inline-block; text-align: center;'>
        <span>X</span>
    </span>
    <div class='content'>
        <img id="quick-view-img" src=alt="">
    </div>
</div>

<!-- FOOTER -->
<?php
include "partial/footer.php"
?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<?php
include "partial/js_plugin.php"
?>
<script type="text/javascript">
    var BPOPUP = '';
    (function ($) {
        $(function () {
            $('#quick-view').bind('click', function (e) {
                e.preventDefault();
                var parent = $(this).parentnode;
                var img = parent.siblings("a").childnodes;
                console.log(img.src);
                $('#quick-view-img').src = img.src;
                BPOPUP = $('#quick-view-popup').bPopup({
                    modalClose: true
                });
            });
        });
    })(jQuery);
</script>

</body>
</html>
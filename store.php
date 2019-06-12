<?php
session_start();
include "func/Database.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "partial/head.php";
?>
<body>
<!-- HEADER -->
<!-- NAVIGATION -->
<?php
include "partial/header.php";
?>
<!-- /NAVIGATION -->
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- STORE -->
            <div id="store" class="col-md-12">
                <form method="get">
                    <input type="hidden" name="c" value="<?php echo $_GET['c']; ?>"/>
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select" name="sort">
                                    <option value="new" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'new' ? "selected" : "" ?>>
                                        Newest
                                    </option>
                                    <option value="low" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'low' ? "selected" : "" ?>>
                                        Low-Price
                                    </option>
                                    <option value="high" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'high' ? "selected" : "" ?>>
                                        High-Price
                                    </option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select" name="cnt">
                                    <option value="6"<?php echo isset($_GET['cnt']) && $_GET['cnt'] == 6 ? "selected" : "" ?>>
                                        6
                                    </option>
                                    <option value="12"<?php echo isset($_GET['cnt']) && $_GET['cnt'] == 12 ? "selected" : "" ?>>
                                        12
                                    </option>
                                </select>
                            </label>

                            <label style="margin-right: 0px">
                                Price:
                            </label>
                            <label>
                                <div class="price-filter">
                                    <div class="input-number price-min">
                                        <input id="price-min" type="number" name="price-min">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                    <span>-</span>
                                    <div class="input-number price-max">
                                        <input id="price-max" type="number" name="price-max">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                    <div id="price-slider"></div>
                                </div>
                            </label>
                            <input class="primary-btn" type="submit" value="Find"/>
                        </div>
                    </div>
                    <!-- /store top filter -->
                </form>

                <!-- store products -->
                <div class="row">
                    <?php

                    $url = substr($_SERVER['REQUEST_URI'], 1);
                    if (!isset($_GET['sort']))
                        $_GET['sort'] = 'new';
                    if (!isset($_GET['cnt']))
                        $_GET['cnt'] = 6;
                    if (!isset($_GET['price-min']))
                        $_GET['price-min'] = 1;
                    if (!isset($_GET['price-max']))
                        $_GET['price-max'] = 2000;
                    if (!isset($_GET['p']))
                        $_GET['p'] = 0;
                    else {
                        $url = substr($url, 0, strlen($url) - strlen($_GET['p']) - 3);
                    }

                    $sql = " SELECT * FROM (SELECT product.*, if(upload_date>now()-interval 1 month,'y','n') new FROM product) x WHERE price BETWEEN {$_GET['price-min']} AND {$_GET['price-max']}";
                    if ($_GET['c'] == 0)
                        $sql .= " AND name LIKE \"%" . $_GET['name'] . "%\"";
                    else if ($_GET['c'] == 10)
                        $sql .= " AND sales > 0";
                    else
                        $sql .= " AND category=" . $_GET['c'];

                    switch ($_GET['sort']) {
                        case 'new':
                            $sql .= " AND new='y'";
                            break;
                        case 'low':
                            $sql .= " ORDER BY price";
                            break;
                        case 'high':
                            $sql .= " ORDER BY price DESC";
                            break;
                    }
                    $sql .= ";";


                    $product = getProduct($sql);
                    for ($i = $_GET['p'] * $_GET['cnt'];
                         $i < $_GET['p'] * $_GET['cnt'] + $_GET['cnt'];
                         $i++) {
                        if (!isset($product[$i]))
                            break;
                        $item = $product[$i];
                        ?>
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <a href="<?php echo "product.php?c=" . $item['category'] . "&pid=" . $item['product_id']; ?>">
                                        <img src="<?php echo $item['img_url']; ?>" alt="">
                                    </a>
                                    <?php
                                    echo "<div class=\"product-label\">";
                                    if ($item['sales'] != 0)
                                        echo "<span class=\"sale\">-" . $item['sales'] . "%</span>";
                                    if ($item['new'] == 'y') echo "<span class=\"new\">NEW</span>";
                                    echo "</div>";
                                    ?>

                                    <div class="product-btns">
                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category"><?php echo getCategory($item['category']); ?></p>
                                    <h3 class="product-name"><a><?php echo $item['name'] ?></a></h3>
                                    <h4 class="product-price">$<?php
                                        if ($item['sales'] > 0) {
                                            echo $item['price'] * (100 - $item['sales']) / 100;
                                            echo " <del class=\"product-old-price\">$" . $item['price'] . "</del>";
                                        } else
                                            echo $item['price'];
                                        ?>
                                    </h4>
                                </div>
                            </div>

                        </div>
                        <!-- /product -->
                    <?php } ?>
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <?php
                $item_per_page = $_GET['cnt'];   //한 페이지에 표시할 아이템 수

                if (isset($_GET['p'])) {
                    $current_page = $_GET['p'];
                } else {
                    $current_page = 0;
                }

                $num_page_button = 5; //한번에 보여줄 페이지 버튼 갯수

                $total_item = count($product); //총 아이템의 수

                //전체 페이지 수
                $total_page = ceil($total_item / $item_per_page);
                ?>
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 6-12 products</span>
                    <ul class="store-pagination">
                        <?php
                        if ($current_page > 0) {
                            $pre = $current_page - 1;
                            if ($current_page > 1)
                                echo "<a href='" . $url . "&p=0'><<</a>";
                            echo "<a href='" . $url . "&p=" . $pre . "'><</a>";
                        }

                        if ($total_page > $num_page_button) {
                            if ($current_page == 0 || $current_page == 1) {
                                for ($i = 0; $i < $num_page_button; $i++) {
                                    $num = $i + 1;
                                    if ($i == $current_page) {
                                        echo "<a class='active' href='" . $url . "&p=" . $i . "'> " . $num . " </a>";
                                    } else {
                                        echo "<a href='" . $url . "&p=" . $i . "'> " . $num . " </a>";
                                    }
                                }
                            } else if ($current_page == $total_page - 2 || $current_page == $total_page - 1) {
                                for ($i = $total_page - 5; $i < $total_page; $i++) {
                                    $num = $i + 1;
                                    if ($i == $current_page) {
                                        echo "<a class='active' href='" . $url . "&p=" . $i . "'> " . $num . " </a>";
                                    } else {
                                        echo "<a href='" . $url . "&p=" . $i . "'> " . $num . " </a>";
                                    }
                                }
                            } else {
                                for ($i = $current_page - 2; $i < $current_page + $num_page_button / 2; $i++) {
                                    $num = $i + 1;
                                    if ($i == $current_page) {
                                        echo "<a class='active' href='" . $url . "&p=" . $i . "'> " . $num . " </a>";
                                    } else {
                                        echo "<a href='" . $url . "&p=" . $i . "'> " . $num . " </a>";
                                    }
                                }
                            }
                        } else {
                            for ($i = 0; $i < $total_page; $i++) {
                                $num = $i + 1;
                                if ($i == $current_page) {
                                    echo "<a class='active' href='" . $url . "&p=" . $i . "'> " . $num . " </a>";
                                } else {
                                    echo "<a href='" . $url . "&p=" . $i . "'> " . $num . " </a>";
                                }
                            }
                        }

                        if ($current_page < $total_page - 1) {
                            $next = $current_page + 1;
                            $final = $total_page - 1;
                            echo "<a href='" . $url . "&p=" . $next . "'>></a>";
                            if ($current_page < $total_page - 2)
                                echo "<a href='" . $url . "&p=" . $final . "'>>></a>";
                        }
                        ?>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<div id='quick-view-popup'>
    <span class='button-close'>
        <span>X</span>
    </span>
    <img id="quick-view-img"/>
</div>
<!-- FOOTER -->
<?php
include "partial/footer.php"
?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/jquery.bpopup.min.js"></script>
<script type="text/javascript">
    var BPOPUP = '';
    (function ($) {
        $(function () {
            $('.quick-view').bind('click', function (e) {
                e.preventDefault();
                var img = $(this).parent().parent().children("a").children("img");
                $('#quick-view-img').attr('src', img.attr('src'));
                BPOPUP = $('#quick-view-popup').bPopup({
                    modalClose: true
                });
            });
        });
    })(jQuery);
</script>
<script>
    (function ($, min, max) {
        "use strict";

        // Mobile Nav toggle
        $('.menu-toggle > a').on('click', function (e) {
            e.preventDefault();
            $('#responsive-nav').toggleClass('active');
        });

        // Fix cart dropdown from closing
        $('.cart-dropdown').on('click', function (e) {
            e.stopPropagation();
        });

        /////////////////////////////////////////


        // Product img zoom
        var zoomMainProduct = document.getElementById('product-main-img');
        if (zoomMainProduct) {
            $('#product-main-img .product-preview').zoom();
        }

        /////////////////////////////////////////

        // Input number
        $('.input-number').each(function () {
            var $this = $(this),
                $input = $this.find('input[type="number"]'),
                up = $this.find('.qty-up'),
                down = $this.find('.qty-down');

            down.on('click', function () {
                var value = parseInt($input.val()) - 1;
                value = value < 1 ? 1 : value;
                $input.val(value);
                $input.change();
                updatePriceSlider($this, value)
            });

            up.on('click', function () {
                var value = parseInt($input.val()) + 1;
                $input.val(value);
                $input.change();
                updatePriceSlider($this, value)
            })
        });

        var priceInputMax = document.getElementById('price-max'),
            priceInputMin = document.getElementById('price-min');

        priceInputMax.addEventListener('change', function () {
            updatePriceSlider($(this).parent(), this.value);
        });

        priceInputMin.addEventListener('change', function () {
            updatePriceSlider($(this).parent(), this.value);
        });

        function updatePriceSlider(elem, value) {
            if (elem.hasClass('price-min')) {
                priceSlider.noUiSlider.set([value, null]);
            } else if (elem.hasClass('price-max')) {
                priceSlider.noUiSlider.set([null, value]);
            }

        }

        // Price Slider
        var priceSlider = document.getElementById('price-slider');
        if (priceSlider) {
            noUiSlider.create(priceSlider, {
                start: [min, max],
                connect: true,
                step: 1,
                range: {
                    'min': 1,
                    'max': 10000
                }
            });
            priceSlider.noUiSlider.on('update', function (values, handle) {
                var value = values[handle];
                handle ? priceInputMax.value = value : priceInputMin.value = value;
            });

        }

    })(jQuery, <?php echo $_GET['price-min'];?>, <?php echo $_GET['price-max'];?>);
</script>
</body>
</html>

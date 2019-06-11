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
include "partial/header.php";
$product = getProduct("SELECT * FROM product WHERE category={$_GET['c']} AND left(product_id,4)=left('{$_GET['pid']}', 4);");
?>
<!-- /NAVIGATION -->
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <?php foreach ($product as $item) { ?>
                        <div class="product-preview">
                            <img src="<?php echo $item['img_url']; ?>" alt="">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <?php foreach ($product as $item) { ?>
                        <div class="product-preview">
                            <img src="<?php echo $item['img_url']; ?>" alt="">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $product[0]['name']; ?></h2>
                    <div>
                        <h3 class="product-price">$<?php
                            if ($product[0]['sales'] > 0) {
                                echo $product[0]['price'] * (100 - $product[0]['sales']) / 100;
                                echo "<del class=\"product-old-price\">$" . $product[0]['price'] . "</del>";
                            } else
                                echo $product[0]['price'];
                            ?>
                        </h3>
                    </div>
                    <div class="product-options">
                        <label>
                            Color
                            <select class="input-select" id="color">
                                <?php foreach ($product as $item) {
                                    $color = getColor($item['product_id']);
                                    echo "<option value=\"$color\">" . $color . "</option>";
                                } ?>
                            </select>
                        </label>
                    </div>

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Qty
                            <div class="input-number">
                                <input type="number" id="qty" value="1"/>
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <div>
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li>
                            <a href="store.php?c=<?php echo $product[0]['category']; ?>"><?php echo getCategory($product[0]['category']); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <label class="tab-nav">Description</label>
                    <!-- /product tab nav -->
                    <!-- product tab content -->
                    <div>
                        <p><?php echo $product[0]['description']; ?></p>
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- FOOTER -->
<?php
include "partial/footer.php"
?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<?php
include "partial/js_plugin.php"
?>

</body>
<script>
    function getCookie(sName) {
        sName = sName.toLowerCase();
        var oCrumbles = document.cookie.split(';');
        for (var i = 0; i < oCrumbles.length; i++) {
            var oPair = oCrumbles[i].split('=');
            var sKey = decodeURIComponent(oPair[0].trim().toLowerCase());
            var sValue = oPair.length > 1 ? oPair[1] : '';
            if (sKey === sName)
                return decodeURIComponent(sValue);
        }
        return undefined;
    }

    function setCookie(sName, sValue) {
        var oDate = new Date();
        oDate.setYear(oDate.getFullYear() + 1);
        var sCookie = encodeURIComponent(sName) + '=' + encodeURIComponent(sValue) + ';expires=' + oDate.toGMTString() + ';path=/';
        document.cookie = sCookie;
    }

    $('.add-to-cart-btn').bind('click', function () {
        var cookie = getCookie('cart');
        var list = [];
        if (cookie) {
            list = JSON.parse(getCookie('cart'));
            console.log(list);
        }
        var order = {
            c:<?php echo $_GET['c'];?>,
            pid:<?php echo substr($_GET['pid'], 0, 4);?>,
            color: $('#color').val(),
            qty: Number($('#qty').val()),
            number:<?php echo $_GET['c'].substr($_GET['pid'], 0, 4);?>+getColorNum($('#color').val())
        };
        var find = false;
        for (var i = 0; i < list.length; i++) {
            if (order.c === list[i].c && order.pid === list[i].pid && order.color === list[i].color) {
                list[i].qty += order.qty;
                find = true;
                break;
            }
        }
        if (!find)
            list.push(order);
        setCookie('cart', JSON.stringify(list));
        window.location.reload();
    });


    function getColorNum(color)
    {
        switch (color) {
            case 'Black':
                return '00';
            case 'White':
                return '11';
            case 'Red':
                return '22';
            case 'Blue':
                return '33';
            case 'Green':
                return '44';
            case 'Gray':
                return '55';
        }
    }

</script>
</html>
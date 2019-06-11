<?php
$depth = 0;
$url = $_SERVER['PHP_SELF'];
while (strrpos($url, '/') > 0) {
    $url = substr($url, 0, strrpos($url, '/'));
    $depth++;
}
$root = str_repeat("../", $depth);
$product = false;
if (isset($_COOKIE['cart']) && $_COOKIE['cart']!="[]") {
    $cart = json_decode($_COOKIE['cart'], true);
    $sql = "SELECT * FROM product WHERE ";
    for ($i = 0; $i < count($cart); $i++) {
        $item = $cart[$i];
        if ($i != 0)
            $sql .= " OR ";
        $sql .= "(category=" . $item['c'] . " AND product_id=" . $item['pid'] . getColorNum($item['color']) . ")";
    }
    $sql .= ";";
    $product = getProduct($sql);
    for ($i = 0; $i < count($cart); $i++) {
        for ($j = 0; $j < count($product); $j++) {
            if ($product[$j]['category'] == $cart[$i]['c'] && $product[$j]['product_id'] == $cart[$i]['pid'] . getColorNum($cart[$i]['color'])) {
                $product[$j]['qty'] = $cart[$i]['qty'];
                break;
            }
        }
    }
}

?>
<!-- HEADER -->
<header>
    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="<?php echo $root; ?>index.php" class="logo">
                            <img src="<?php echo $root; ?>img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form method="get" action="<?php echo $root; ?>store.php">
                            <select class="input-select" name="c">
                                <option value="0">All</option>
                                <option value="100">Desktops</option>
                                <option value="200">Laptops</option>
                                <option value="300">Mice</option>
                                <option value="400">Keyboards</option>
                                <option value="500">Accessories</option>
                            </select>
                            <input class="input" name="name" placeholder="Input Keyword">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Login -->
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "<div>";
                            echo "<a href=\"" . $root . "auth/login.php\"><i class=\"fa fa-user-o\"></i>";
                            echo "<span>Login</span>";
                            echo "</a>";
                            echo "</div>";
                        } else {
                            echo "<div>";
                            echo "<a href=\"" . $root . "func/auth.php\"><i class=\"fa fa-user\"></i>";
                            echo "<span>LogOut</span>";
                            echo "</a>";
                            echo "</div>";
                            echo "<div>";
                            echo "<a href=\"" . $root . "account.php\"><i class=\"fa fa-user-circle\"></i>";
                            echo "<span>Account</span>";
                            echo "</a>";
                            echo "</div>";
                        }
                        ?>
                        <!-- Login -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Cart</span>
                                <?php if ($product) echo "<div class=\"qty\">" . count($cart) . "</div>"; ?>
                            </a>
                            <?php
                            if ($product) { ?>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <?php
                                        $sum = 0;
                                        foreach ($product as $item) {
                                            ?>
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="<?php echo $root . $item['img_url']; ?>" alt="">
                                                </div>

                                                <div class="product-body">
                                                    <h3 class="product-name">
                                                        <a href="<?php echo "product.php?c=" . $item['category'] . "&pid=" . $item['product_id']; ?>">
                                                            <?php echo $item['name']; ?>
                                                        </a></h3>
                                                    <h4 class="product-price">
                                                        <span class="qty"><?php echo $item['qty']; ?>x</span>
                                                        $<?php echo $item['price'] * (100 - $item['sales']) / 100;
                                                        $sum += $item['price'] * (100 - $item['sales']) / 100 * $item['qty']; ?>
                                                    </h4>
                                                </div>
                                                <button class="delete"
                                                        value="<?php echo $item['category'] . $item['product_id']; ?>">
                                                    <i class="fa fa-close"></i></button>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="cart-summary">
                                        <small><?php echo count($cart); ?> Item(s) selected</small>
                                        <h5>SUBTOTAL: $<?php echo $sum; ?>
                                        </h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="<?php echo $root; ?>checkout.php">Checkout <i
                                                    class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li <?php if (!isset($_GET['c'])) echo "class=active"; ?>><a
                            href="<?php echo $root; ?>index.php">Home</a></li>
                <li <?php if (isset($_GET['c']) && $_GET['c'] == 10) echo "class=active"; ?>><a
                            href="<?php echo $root; ?>store.php?c=10">Hot
                        deals</a></li>
                <li <?php if (isset($_GET['c']) && $_GET['c'] == 100) echo "class=active"; ?>><a
                            href="<?php echo $root; ?>store.php?c=100">Desktops</a>
                </li>
                <li <?php if (isset($_GET['c']) && $_GET['c'] == 200) echo "class=active"; ?>><a
                            href="<?php echo $root; ?>store.php?c=200">Labtops</a>
                </li>
                <li <?php if (isset($_GET['c']) && $_GET['c'] == 300) echo "class=active"; ?>><a
                            href="<?php echo $root; ?>store.php?c=300">Mice</a>
                </li>
                <li <?php if (isset($_GET['c']) && $_GET['c'] == 400) echo "class=active"; ?>><a
                            href="<?php echo $root; ?>store.php?c=400">Keyboards</a>
                </li>
                <li <?php if (isset($_GET['c']) && $_GET['c'] == 500) echo "class=active"; ?>><a
                            href="<?php echo $root; ?>store.php?c=500">Accessories</a>
                </li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
<script src="js/jquery.min.js"></script>
<script>
    function getCookie(sName) {
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

    $(".delete").bind('click', function () {
        var list = JSON.parse(getCookie("cart"));
        var newList = [];
        for (var i = 0; i < list.length; i++) {
            if (list[i].number !== $(this).val())
                newList.push(list[i]);
        }
        setCookie("cart", JSON.stringify(newList));
        window.location.reload();
    })
</script>
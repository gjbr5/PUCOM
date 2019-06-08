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
                        <a href="index.php" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All</option>
                                <option value="1">Desktops</option>
                                <option value="2">Laptops</option>
                                <option value="3">Mice</option>
                                <option value="4">Keyboards</option>
                                <option value="5">Accessories</option>
                            </select>
                            <input class="input" placeholder="here">
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
                        if(!isset($_SESSION['username'])){
                            echo "<div>";
                            echo "<a href=\"auth/login.php\"><i class=\"fa fa-user-o\"></i>";
                            echo "<span>Login</span>";
                            echo "</a>";
                            echo "</div>";
                        }else{
                            echo "<div>";
                            echo "<a href=\"func/auth.php\"><i class=\"fa fa-user\"></i>";
                            echo "<span>LogOut</span>";
                            echo "</a>";
                            echo "</div>";
                            echo "<div>";
                            echo "<a href=\"account.php\"><i class=\"fa fa-user-circle\"></i>";
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
                                <div class="qty">2</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>3 Item(s) selected</small>
                                    <h5>SUBTOTAL: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
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
                <li <?php if(!isset($_GET['c'])) echo "class=active"; ?>><a href="index.php">Home</a></li>
                <li <?php if($_GET['c']=='hotdeals') echo "class=active"; ?>><a href="store.php?c=hotdeals">Hot deals</a></li>
                <li <?php if($_GET['c']=='desktops') echo "class=active"; ?>><a href="store.php?c=desktops">Desktops</a></li>
                <li <?php if($_GET['c']=='labtops') echo "class=active"; ?>><a href="store.php?c=labtops">Labtops</a></li>
                <li <?php if($_GET['c']=='mice') echo "class=active"; ?>><a href="store.php?c=mice">Mice</a></li>
                <li <?php if($_GET['c']=='keyboards') echo "class=active"; ?>><a href="store.php?c=keyboards">Keyboards</a></li>
                <li <?php if($_GET['c']=='accessories') echo "class=active"; ?>><a href="store.php?c=accessories">Accessories</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
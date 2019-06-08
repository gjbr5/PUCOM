<?php
session_start();
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
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="./img/product01.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product03.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product06.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product08.png" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="./img/product01.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product03.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product06.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product08.png" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">product name goes here</h2>
                    <div>
                        <h3 class="product-price">$980.00
                            <del class="product-old-price">$990.00</del>
                        </h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <div class="product-options">
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div>

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Qty
                            <div class="input-number">
                                <input type="number" , value="1">
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
                        <li><a href="#">Headphones</a></li>
                        <li><a href="#">Accessories</a></li>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est l
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

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="./img/product01.png" alt="">
                        <div class="product-label">
                            <span class="sale">-30%</span>
                        </div>
                        <div class="product-btns">
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                            </button>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00
                            <del class="product-old-price">$990.00</del>
                        </h4>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

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
<script src="js/main.js"></script>

</body>
</html>
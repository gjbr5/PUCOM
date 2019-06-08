<?php
session_start();
include "func/Database.php";
$member = getMemberInfo();
?>
<!DOCTYPE html>
<html lang="en">
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

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- Shipping Details Tab -->
            <div class="col-md-7">
                <div class="section-title">
                    <h3 class="title">Billing Address</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#Default_Address">Default</a></li>
                            <li><a data-toggle="tab" href="#New_Address">New</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Shipping Details Tab -->

            <!-- Shipping Details -->
            <div class="col-md-7">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="Default_Address" class="tab-pane active">
                            <div class="form-group">
                                <input class="input" type="text" name="name" placeholder="E" value="" readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="F" readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="A" readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="postcode" placeholder="U" readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="L" readonly>
                            </div>
                        </div>
                        <!-- /tab -->

                        <!-- tab -->
                        <div id="New_Address" class="tab-pane">
                            <div class="form-group">
                                <input class="input" type="text" name="name" placeholder="Name" value="">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Telephone">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="postcode" placeholder="Post Code">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address">
                            </div>
                        </div>
                        <!-- /tab -->

                        <!-- Order notes -->
                        <div class="order-notes">
                            <textarea class="input" placeholder="Order Notes"></textarea>
                        </div>
                        <!-- /Order notes -->

                    </div>
                </div>
            </div>
            <!-- /Shipping Details -->

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        <div class="order-col">
                            <div>1x Product Name Goes Here</div>
                            <div>$980.00</div>
                        </div>
                        <div class="order-col">
                            <div>2x Product Name Goes Here</div>
                            <div>$980.00</div>
                        </div>
                    </div>
                    <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">$2940.00</strong></div>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        I've read and accept the <a href="#">terms & conditions</a>
                    </label>
                </div>
                <a href="#" class="primary-btn order-submit">Place order</a>
            </div>
            <!-- /Order Details -->
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

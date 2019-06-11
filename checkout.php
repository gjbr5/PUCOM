<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "func/Database.php";
$member = getMemberInfo();
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
                                <input class="input" type="text" name="name" value="<?php echo $member['username']; ?>"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" value="<?php echo $member['email']; ?>"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="phone" value="<?php echo $member['phone']; ?>"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="postcode"
                                       value="<?php echo $member['postcode']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address"
                                       value="<?php echo $member['address']; ?>" readonly>
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
                                <input class="input" type="tel" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <input class="input" id="postcode" type="text" name="postcode" placeholder="Post Code"
                                       onclick="execDaumPostcode()" readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" id="address" type="text" name="address" placeholder="Address"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="detailAddress" placeholder="Detail Address">
                            </div>
                        </div>
                        <!-- /tab -->

                        <!-- Order notes -->
                        <div class="order-notes" style="margin-right:15px;">
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
                        <?php
                        if($product) {
                            foreach ($product as $item) {
                                echo "<div class=\"order-col\">";
                                echo "<div>" . $item['qty'] . "x ." . $item['name'] . "</div>";
                                echo "<div>$" . $item['price'] * (100 - $item['sales']) / 100 * $item['qty'] . "</div>";
                                echo "</div>";
                            }
                        }
                        ?>

                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">$<?php if($product)echo $sum;?></strong></div>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        I've read and accept the <a href="#">terms & conditions</a>
                    </label>
                </div>
                <a href="index.php" class="primary-btn order-submit">Place order</a>
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
<?php
include "partial/js_plugin.php"
?>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
    <!-- Daum Address API -->
    function execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function (data) {
                var roadAddr = data.roadAddress;
                var extraRoadAddr = '';
                if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                    extraRoadAddr += data.bname;
                }
                if (data.buildingName !== '') {
                    extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                if (extraRoadAddr !== '') {
                    extraRoadAddr = ' (' + extraRoadAddr + ')';
                }
                document.getElementById('postcode').value = data.zonecode;
                document.getElementById("address").value = roadAddr + extraRoadAddr;
            }
        }).open();
    }
</script>
</body>
</html>

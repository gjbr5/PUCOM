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
                <h3 class="breadcrumb-header">My Account</h3>
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

            <!-- Account Details Tab -->
            <div class="col-md-9">
                <div class="section-title">
                    <h3 class="title">Profile</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#Default_Account">Information</a></li>
                            <li><a data-toggle="tab" href="#Update_Account">Update</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Account Details Tab -->

            <!-- Account Details -->
            <div class="col-md-9">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="Default_Account" class="tab-pane active">
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
                        <div id="Update_Account" class="tab-pane">
                            <form method="post">
                                <div class="form-group">
                                    <input class="input" type="text" name="name"
                                           value="<?php echo $member['username']; ?>"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="phone" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <input class="input" id="postcode" type="text" name="postcode"
                                           placeholder="Post Code" onclick="execDaumPostcode()" readonly>
                                </div>
                                <div class="form-group">
                                    <input class="input" id="address" type="text" name="address" placeholder="Address"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="detailAddress" placeholder="Detail Address">
                                </div>
                                <a href="account.php">
                                    <input type="submit" class="primary-btn" style="float: right;" value="Update"></input>
                                </a>
                            </form>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Account Details -->
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

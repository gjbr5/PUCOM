<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut.</p>
                        <ul class="footer-links">
                            <li><a><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                            <li><a><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="<?php echo $root . "store.php?c=hotdeals"; ?>">Hot deals</a></li>
                            <li><a href="<?php echo $root . "store.php?c=desktops"; ?>">Desktops</a></li>
                            <li><a href="<?php echo $root . "store.php?c=labtops"; ?>">Labtops</a></li>
                            <li><a href="<?php echo $root . "store.php?c=mice"; ?>">Mice</a></li>
                            <li><a href="<?php echo $root . "store.php?c=keyboards"; ?>">Keyboards</a></li>
                            <li><a href="<?php echo $root . "store.php?c=Accessories"; ?>">Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="<?php echo $root."info.php"?>">About Us</a></li>
                            <li><a href="<?php echo $root."info.php"?>">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="<?php
                                if (isset($_SESSION['username']))
                                    echo $root."account.php";
                                else {
                                    echo $root."auth/login.php";
                                }?>">My Account</a></li>
                            <li><a href="<?php
                                if (isset($_SESSION['username']))
                                    echo $root."checkout.php";
                                else {
                                    echo $root."auth/login.php";
                                }?>">View Cart</a></li>
                            <li><a href="<?php echo $root; ?>board/qna.php"</a>Help</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                                                                    target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->
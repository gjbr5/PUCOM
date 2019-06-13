<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Access Denied');location.replace('qna.php');</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "../partial/head.php";
?>
<link type="text/css" rel="stylesheet" href="../css/qna.css"/>

<body>
<!-- HEADER -->
<?php
include "../partial/header.php";
?>
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->s
        <div class="row">
            <div class="col-md-10">

                <form method="post" action="write_model.php">
                    <div class="qnatable">
                        <input class="input" type="hidden" id="member" name="member"
                               value="<?php echo $_SESSION['username']; ?>"/>
                        <input class="input" type="text" name="title" placeholder="Title" required/> <br/><br/>
                        <textarea class="input-area" name="content" placeholder="Contents"></textarea>
                        <input class="primary-btn" style="margin-top:20px; float: right;" type="submit"/>
                    </div>
                </form>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- FOOTER -->
<?php
include "../partial/footer.php";
?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/nouislider.min.js"></script>
<script src="../js/jquery.zoom.min.js"></script>
<script src="../js/main.js"></script>

</body>
</html>

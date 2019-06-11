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

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Regular Page</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Blank</li>
                </ul>
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
            <form method="post" action="write_model.php">
                <input type="text" id="member" name="member" value="<?php echo $_SESSION['username'];?>" readonly/> <br/>
                <input type="text" name="title" placeholder="Title" required/> <br/>
                <textarea name="content" placeholder="Contents"></textarea>
                <input type="submit"/>
            </form>
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

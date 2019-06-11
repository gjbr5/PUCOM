<?php
session_start();
include "../func/Database.php";
if (isset($_GET['num']))
    $post = getPost($_GET['num']);
if (!isset($post) || !$post) {
    echo '<script>alert("Wrong Post Number.");location.replace("qna.php");</script>';
    exit;
}
increaseHits($_GET['num']);
$post['hits']++;
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "../partial/head.php"
?>
<body>
<!-- HEADER -->
<!-- NAVIGATION -->
<?php
include "../partial/header.php"
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
                <h3 class="breadcrumb-header">Q & A</h3>
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
            <div class="col-md-10">
                <div class="qnatable">
                    <div class="theader">
                        <span><label>NUM</label><?php echo $post['post_num']; ?></span>
                        <span><label>Member</label> <?php echo $post['member']; ?></span>
                        <span><label>Date</label> <?php echo $post['wrt_date']; ?></span>
                        <span><label>Hits</label> <?php echo $post['hits']; ?></span>
                    </div>
                    <div class="title"><label>Title</label><?php echo $post['title'];?></div>
                    <div><?php echo $post['content'];?></div>
                </div>
                <a href="qna.php">
                    <button class="primary-btn" style="margin-top:10px; float: right;">List</button>
                </a>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<?php
include "../partial/footer.php";
?>
<!-- jQuery Plugins -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/nouislider.min.js"></script>
<script src="../js/jquery.zoom.min.js"></script>
<script src="../js/main.js"></script>

</body>
</html>

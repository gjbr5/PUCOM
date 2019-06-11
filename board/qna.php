<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<?php
include "../func/Database.php";
$member = getMemberInfo();
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
            <div class="col-md-12">
                <div class="table-container">
                    <div class="table">
                        <div class="table-header">
                            <div class="header__item">
                                <a id="num" class="filter__link">NUM</a>
                            </div>
                            <div class="header__item">
                                <a id="title" class="filter__link">TITLE</a>
                            </div>
                            <div class="header__item">
                                <a id="date" class="filter__link">DATE</a>
                            </div>
                            <div class="header__item">
                                <a id="hits" class="filter__link filter__link--number">HITS</a>
                            </div>
                        </div>
                        <div class="table-content">
                            <?php
                            $row = getBoardList();
                            if ($row) {
                                foreach ($row as $item) {
                                    echo "<a href=\"view.php?num={$item['num']}\">";
                                    echo "<div class=\"table-row\">";
                                    echo "<div class=\"table-data\">{$item['num']}</div>";
                                    echo "<div class=\"table-data\">{$item['title']}</div>";
                                    echo "<div class=\"table-data\">{$item['date']}</div>";
                                    echo "<div class=\"table-data\">{$item['hits']}</div>";
                                    echo "</div>";
                                    echo "</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <a href="write.php">
                    <button class="primary-btn" style="float: right;">작성하기</button>
                </a>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- FOOTER -->
<?php
include "../partial/footer.php"
?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<?php
include "../partial/js_plugin.php"
?>

</body>
</html>
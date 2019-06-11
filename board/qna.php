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
                                <a id="num" class="filter__link" href="#">NUM</a>
                            </div>
                            <div class="header__item">
                                <a id="title" class="filter__link" href="#">TITLE</a>
                            </div>
                            <div class="header__item">
                                <a id="date" class="filter__link" href="#">DATE</a>
                            </div>
                            <div class="header__item">
                                <a id="hits" class="filter__link filter__link--number" href="#">HITS</a>
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
<script>
    var properties = [
        'num',
        'title',
        'date',
        'hits'
    ];

    $.each(properties, function (i, val) {

        var orderClass = '';

        $("#" + val).click(function (e) {
            e.preventDefault();
            $('.filter__link.filter__link--active').not(this).removeClass('filter__link--active');
            $(this).toggleClass('filter__link--active');
            $('.filter__link').removeClass('asc desc');

            if (orderClass == 'desc' || orderClass == '') {
                $(this).addClass('asc');
                orderClass = 'asc';
            } else {
                $(this).addClass('desc');
                orderClass = 'desc';
            }

            var parent = $(this).closest('.header__item');
            var index = $(".header__item").index(parent);
            var $table = $('.table-content');
            var rows = $table.find('.table-row').get();
            var isSelected = $(this).hasClass('filter__link--active');
            var isNumber = $(this).hasClass('filter__link--number');

            rows.sort(function (a, b) {

                var x = $(a).find('.table-data').eq(index).text();
                var y = $(b).find('.table-data').eq(index).text();

                if (isNumber == true) {

                    if (isSelected) {
                        return x - y;
                    } else {
                        return y - x;
                    }

                } else {

                    if (isSelected) {
                        if (x < y) return -1;
                        if (x > y) return 1;
                        return 0;
                    } else {
                        if (x > y) return -1;
                        if (x < y) return 1;
                        return 0;
                    }
                }
            });

            $.each(rows, function (index, row) {
                $table.append(row);
            });

            return false;
        });

    });
</script>

</body>
</html>
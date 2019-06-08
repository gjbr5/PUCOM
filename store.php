<?php
session_start();
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
					<!-- STORE -->
					<div id="store" class="col-md-12">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">newest</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">6</option>
										<option value="1">12</option>
									</select>
								</label>

                                <label style="margin-right: 0px">
                                    Price:
                                </label>
                                <label>
                                    <div class="price-filter">
                                        <div class="input-number price-min">
                                            <input id="price-min" type="number">
                                            <span class="qty-up">+</span>
                                            <span class="qty-down">-</span>
                                        </div>
                                        <span>-</span>
                                        <div class="input-number price-max">
                                            <input id="price-max" type="number">
                                            <span class="qty-up">+</span>
                                            <span class="qty-down">-</span>
                                        </div>
                                        <div id="price-slider"></div>
                                    </div>
                                </label>
							</div>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
                                        <a <?php echo "href=\"product.php?c={$_GET['c']}\";" ?>><img src="./img/product01.png" alt="" ></a>
										<div class="product-label">
											<span class="sale">-30%</span>
											<span class="new">NEW</span>
										</div>
                                        <div class="product-btns">
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
									</div>
									<div class="product-body">
										<p class="product-category">why didnt locate at center</p>
										<h3 class="product-name"><a href="#">Name</a></h3>
										<h4 class="product-price">Price <del class="product-old-price">Old_Price</del></h4>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
							</div>
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
                        <?php
                        $item_per_page=9;   //한 페이지에 표시할 아이템 수

                        if(isset($_GET[p])){
                            $current_page=$_GET[p];
                        }
                        else{
                            $current_page=0;
                        }

                        $num_page_button=5; //한번에 보여줄 페이지 버튼 갯수

                        //DB에서 카테고리에 맞는 아이템 수 저장
//                        $sql="select count(*) as cnt from upload where user_id='$_SESSION[id]'";
//                        $result=mysql_query($sql, $connect);
//                        $row=mysql_fetch_array($result);
//                        $total_item=$row[cnt];    //총 아이템의 수

                        //전체 페이지 수
                        $total_item=900;
                        $total_page=ceil($total_item / $item_per_page);

                        //if($total_page > $current_page + $num_page_button)
                        //    $display_page=$num_page_button;
                        //else
                        //    $display_page=$total_page-$current_page;

//                        $start=$current_page*$item_per_page;
//                        $sql="select * from upload where user_id='$_SESSION[id]' limit $start, $item_per_page";
//                        $result=mysql_query($sql, $connect);
                        ?>
						<div class="store-filter clearfix">
                            <span class="store-qty">Showing 6-12 products</span>
                            <ul class="store-pagination">
                            <?php
                            if($current_page > 0) {
                                $pre = $current_page - 1;
                                echo "<a href=\"store.php?p=0\"><i class=\"fa fa-angle-double-left\"></i></a>";
                                echo "<a href=\"store.php?p=$pre\"><i class=\"fa fa-angle-left\"></i></a>";
                            }

                            if($total_page > $num_page_button){
                                if($current_page == 0 || $current_page == 1){
                                    for($i=0;$i<$num_page_button;$i++) {
                                        $num = $i+1;
                                        if($i == $current_page){
                                            echo "<a class='active' href='store.php?p=$i'> $num </a>";
                                        } else{
                                            echo "<a href='store.php?p=$i'> $num </a>";
                                        }
                                    }
                                } else if($current_page == $total_page - 2 || $current_page == $total_page - 1){
                                    for($i=$total_page-5;$i<$total_page;$i++) {
                                        $num = $i+1;
                                        if($i == $current_page){
                                            echo "<a class='active' href='store.php?p=$i'> $num </a>";
                                        } else{
                                            echo "<a href='store.php?p=$i'> $num </a>";
                                        }
                                    }
                                } else {
                                    for($i=$current_page-2;$i<$current_page+$num_page_button/2;$i++) {
                                        $num = $i+1;
                                        if($i == $current_page){
                                            echo "<a class='active' href='store.php?p=$i'> $num </a>";
                                        } else{
                                            echo "<a href='store.php?p=$i'> $num </a>";
                                        }
                                    }
                                }
                            } else{
                                for($i=0;$i<$total_page;$i++) {
                                    $num = $i+1;
                                    if($i == $current_page){
                                        echo "<a href='store.php?p=$i'> $num </a>";
                                    } else{
                                        echo "<a href='store.php?p=$i'> $num </a>";
                                    }
                                }
                            }

                            if($current_page < $total_page-1) {
                                $next = $current_page + 1;
                                $final = $total_page - 1;
                                echo "<a href=\"store.php?p=$next\"><i class=\"fa fa-angle-right\"></i></a>";
                                echo "<a href=\"store.php?p=$final\"><i class=\"fa fa-angle-double-right\"></i></a>";
                            }
                            ?>
                            </ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
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

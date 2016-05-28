<div class="container main_container product_archive">
        <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> WOOMEN </div>
        <div class="row">
                <div class="col-sm-3 sidebar">
                        <h3><i class="fa fa-align-justify "></i>Category</h3>
                        <div class="cat_nav">
                                <ul class="catmenu">
                                        <li class="open"> <a href="#">Women <i class="fa fa-angle-up pull-right"></i></a>
                                                <ul class="subcat">
                                                        <li>Sarees</li>
                                                        <li>Anarkali & Suits</li>
                                                        <li>Kurtas & Suit sets</li>
                                                        <li>Lehengas</li>
                                                        <li>Dresses & Gowns</li>
                                                        <li>Tops</li>
                                                        <li>Bottoms</li>
                                                        <li>Dupatta & Stoles</li>
                                                </ul>
                                        </li>
                                        <li> <a href="#">Celeb Style <i class="fa fa-angle-down pull-right"></i></a>
                                                <ul class="subcat">
                                                        <li>Sarees</li>
                                                        <li>Anarkali & Suits</li>
                                                        <li>Kurtas & Suit sets</li>
                                                        <li>Lehengas</li>
                                                        <li>Dresses & Gowns</li>
                                                        <li>Tops</li>
                                                        <li>Bottoms</li>
                                                        <li>Dupatta & Stoles</li>
                                                </ul>
                                        </li>
                                        <li> <a href="#">New Look <i class="fa fa-angle-down pull-right"></i></a>
                                                <ul class="subcat">
                                                        <li>Sarees</li>
                                                        <li>Anarkali & Suits</li>
                                                        <li>Kurtas & Suit sets</li>
                                                        <li>Lehengas</li>
                                                        <li>Dresses & Gowns</li>
                                                        <li>Tops</li>
                                                        <li>Bottoms</li>
                                                        <li>Dupatta & Stoles</li>
                                                </ul>
                                        </li>
                                        <li> <a href="#">Festive <i class="fa fa-angle-down pull-right"></i></a>
                                                <ul class="subcat">
                                                        <li>Sarees</li>
                                                        <li>Anarkali & Suits</li>
                                                        <li>Kurtas & Suit sets</li>
                                                        <li>Lehengas</li>
                                                        <li>Dresses & Gowns</li>
                                                        <li>Tops</li>
                                                        <li>Bottoms</li>
                                                        <li>Dupatta & Stoles</li>
                                                </ul>
                                        </li>
                                        <li> <a href="#">Daily Wear <i class="fa fa-angle-down pull-right"></i></a>
                                                <ul class="subcat">
                                                        <li>Sarees</li>
                                                        <li>Anarkali & Suits</li>
                                                        <li>Kurtas & Suit sets</li>
                                                        <li>Lehengas</li>
                                                        <li>Dresses & Gowns</li>
                                                        <li>Tops</li>
                                                        <li>Bottoms</li>
                                                        <li>Dupatta & Stoles</li>
                                                </ul>
                                        </li>
                                </ul>
                        </div>
                        <h3><i class="fa fa-align-justify "></i>Filter</h3>
                        <div class="price_filter">
                                <h4>Price</h4>
                                <p>
                                        <input type="hidden" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                </p>
                                <div id="slider-range"></div>
                                <div class="slider_values"> <span class="min_value"></span><span class="max_value"></span>
                                        <div class="clearfix"></div>
                                </div>
                        </div>
                        <div class="size_filter">
                                <h4>Size</h4>
                                <div class="size_selector">
                                        <label for="small" class="active">S
                                                <input type="radio" name="size_selector" value="size_s" id="size_selector_0">
                                        </label>
                                        <label for="medium">M
                                                <input type="radio" name="size_selector" value="size_m" id="size_selector_2">
                                        </label>
                                        <label for="large">L
                                                <input type="radio" name="size_selector" value="size_l" id="size_selector_3">
                                        </label>
                                        <label for="xl">XL
                                                <input type="radio" name="size_selector" value="size_xl" id="size_selector_4">
                                        </label>
                                </div>
                        </div>
                </div>
                <!-- / Sidebar-->
                <div class="col-sm-9">
                        <div class="section_sort">
                                <div class="row">
                                        <div class="col-sm-3 col-xs-6">
                                                <div class="sort">
                                                        Sort by
                                                        <select name="" id="">
                                                                <option value="">Best Sellers</option>
                                                                <option value="">Price</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <!--                                        <div class="col-sm-9 col-xs-6">
                                                                                         Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks
                                                                                        <ul class="pagination">
                                                                                                <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                                                                                <li class="active"><a href="#">1</a></li>
                                                                                                <li><a href="#">2</a></li>
                                                                                                <li><a href="#">3</a></li>
                                                                                                <li><a href="#">4</a></li>
                                                                                                <li><a href="#">5</a></li>
                                                                                                <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                                                                                        </ul>

                                                                                </div>-->
                                </div>
                        </div>
                        <div class="product_list">
                                <div class="row">
                                        <?php foreach ($model as $gift_option) {
                                                ?>
                                                <div class="col-sm-4 col-xs-6">

                                                        <div class="products_item">

                                                                <div class="product_image">
                                                                        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/1000/<?php echo $gift_option->id ?>/medium.<?php echo $gift_option->main_image; ?>" alt=""/></a>
                                                                        <div class="second_image"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/1000/<?php echo $gift_option->id ?>/hover/hover.<?php echo $gift_option->main_image; ?>" alt=""/></a></div>
                                                                </div><!-- /Product Image-->

                                                                <div class="list_title">
                                                                        <h3><?php echo $gift_option->product_name; ?></h3>
                                                                        <h4><?php echo $gift_option->description; ?></h4>
                                                                        <p><i class="fa fa-rupee"></i> <?php echo $gift_option->price; ?></p>
                                                                </div>

                                                        </div>

                                                </div>
                                        <?php } ?>
                                </div>
                        </div>
                </div>
        </div>
</div>
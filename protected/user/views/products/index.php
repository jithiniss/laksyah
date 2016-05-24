<div class="container main_container product_archive">
    <?php
    $category_name = Yii::app()->request->getParam('name');
    if ($category_name != "") {
            $get_cat_name = ProductCategory::model()->findByAttributes(array('canonical_name' => $category_name));
    }
    ?>
    <div class="breadcrumbs">

        <?php echo $this->renderPartial('_bread_crumb', array('category_name' => $category_name)); ?>
    </div>
    <div class="row">
        <div class="col-sm-3 sidebar">
            <form name="slide_rnge" id="slide_rnge" method="post" action="<?= Yii::app()->baseUrl; ?>/index.php/products/Category/name/<?= $category_name ?>">
                <h3><i class="fa fa-align-justify "></i>Category</h3>
                <div class="cat_nav">
                    <?php echo $this->renderPartial('left_menu', array('category' => $category, 'parent' => $parent)); ?>
                </div>
                <h3><i class="fa fa-align-justify "></i>Filter</h3>
                <div class="price_filter">
                    <h4>Price</h4>
                    <p>

                        <input type="hidden" id="amount" name="amount" readonly=""  style="border:0; color:#f6931f; font-weight:bold;" />
                        <input type="hidden" id="amount1" name="amount1"readonly=""  style="border:0; color:#f6931f; font-weight:bold;" />
                        <input type="hidden" id="cat_name" name="cat_name" value="<?= $get_cat_name->id; ?>"/>

                    </p>
                    <div id="slider-range"></div>
                    <div class="slider_values"> <span class="min_value"></span><span class="max_value"></span>
                        <div class="clearfix"></div>
                    </div>

                </div>

                <div class="size_filter">
                    <h4>Size</h4>
                    <div class="size_selector">
                        <?php
                        //$sizes = OptionCategory::model()->findAllByAttributes(array('option_type_id' => 2));
//                        foreach ($sizes as $size) {
//
                        ?>

                        <?php //}  ?>
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
            </form>
        </div>
        <!-- / Sidebar-->
        <div class="col-sm-9">
            <div class="section_sort">
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="form-group">

                        </div>
                        <div class="sort">

                            <form  id="form_id" name="submit"  method="get">
                                Sort by
                                <select name="category" onchange="products();">
                                    <option value="">Type</option>
                                    <option value="1">Best Seller</option>
                                    <option value="2">Price Low To High</option>
                                    <option value="3">Price High To Low</option>
                                    <option value="4">Name A-Z</option>
                                    <option value="5">Name Z-A</option>
                                </select>
                            </form>


                        </div>
                    </div>


                    <div class="col-sm-9 col-xs-6">
                        <!-- Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks-->
                        <!--                                                <ul class="pagination">
                                                                                <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                                                                <li class="active"><a href="#">1</a></li>
                                                                                <li><a href="#">2</a></li>
                                                                                <li><a href="#">3</a></li>
                                                                                <li><a href="#">4</a></li>
                                                                                <li><a href="#">5</a></li>
                                                                                <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                                                                        </ul>-->

                    </div>
                </div>
            </div>

            <div class="product_list">
                <div class="row">

                    <?php
                    if (!empty($dataprovider) || $dataProvider != '') {
                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider' => $dataProvider,
                                'itemView' => '_view',
                                'template' => "{pager}\n{items}\n{pager}",
                            ));
                    } else {

                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->

<script>
        function products() {
            document.getElementById("form_id").submit();
        }
</script>

<script>



        $(document).ready(function () {
            $("#slider-range").slider({range: true,
                min: 100,
                max: 50000,
                values: [100, 50000],
                slide: function (event, ui) {
                    var min_amount = $("#amount").val(ui.values[ 0 ]);
                    var max_amount = $("#amount1").val(ui.values[ 1 ]);
                    var categ_id = $("#cat_name").val();
//                    if ($(".min_value").html("<i class='fa fa-rupee'></i> " + ui.values[ 0 ]) && $(".max_value").html("<i class='fa fa-rupee'></i> " + ui.values[ 1 ]))
//                    {
//                        pricerange();
//                    }
<?php unset(Yii::app()->session['temp_product_filter']); ?>
                    $(".min_value").html("<i class='fa fa-rupee'></i> " + ui.values[ 0 ]);
                    $(".max_value").html("<i class='fa fa-rupee'></i> " + ui.values[ 1 ]);
                },
                stop: function (event, ui) {
                    showLoader();
                    //debugger;
                    var form = $("#slide_rnge");
                    var min_amount = $("#amount").val();
                    var max_amount = $("#amount1").val();
                    var categ_id = $("#cat_name").val();
//                    var size = $('input[name=size_selector]:checked', '#slide_rnge').val();
                    var value = <?php echo Yii::app()->session['temp_product_filter']; ?>
                    $.ajax({
                        url: baseurl + 'Products/PriceRange',
                        type: "POST",
                        //data: form.serialize()
                        data: {min: min_amount, max: max_amount, cat: categ_id}
                    }).done(function (data) {
                        if (value == 1) {
                            $("#content").html(data);
                        } else {
                            $(".product_list").html(data);
                        }

                        hideLoader();
                    });

                }
                //alert();
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0));
            $("#amount1").val("$" + $("#slider-range").slider("values", 1));
            $(".min_value").html("<i class='fa fa-rupee'></i> " + $("#slider-range").slider("values", 0));
            $(".max_value").html("<i class='fa fa-rupee'></i> " + $("#slider-range").slider("values", 1));

            $(".add_to_cart").click(function () {
                var id = $(this).attr('id');
                var canname = $("#cano_name_" + id).val();
                var qty = $(".qty_" + id).val();
                addtocart(canname, qty);
            });
        });
        function addtocart(canname, qty) {

            $.ajax({
                type: "POST",
                url: baseurl + 'cart/Buynow',
                data: {cano_name: canname, qty: qty}
            }).done(function (data) {
                getcartcount();
                getcarttotal();
                $(".cart_box").html(data);
                $(".cart_box").show();
                $("html, body").animate({scrollTop: 0}, "slow");
                hideLoader();
            });
        }

        function showLoader() {
            $('.over-lay').show();
        }
        function hideLoader() {
            $('.over-lay').hide();
        }

</script>
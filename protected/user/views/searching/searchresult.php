<script>
        $(document).ready(function (e) {
            $('.search-panel .dropdown-menu').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#search_concept').text(concept);
                $('.input-group #search_param').val(param);
            });
        });</script>
<section class="searching">
    <div class="container main_container product_archive">
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
                            $sizes = OptionCategory::model()->findAllByAttributes(array('option_type_id' => 2));
                            foreach ($sizes as $size) {
                                    ?>
                                    <label for="small" class="" id="<?= $size->id ?>"><?= $size->size; ?>
                                        <input type="radio" name="size_selector" value="<?= $size->id ?>" >
                                    </label>
                            <?php } ?>
                            <input type="hidden" value="" id="selected_size" name="selected_size"/>

                        </div>
                    </div>
                </form>
            </div>
            <!-- / Sidebar-->
            <!--/* some session checking data deleted */-->






            <div class = "about_us searching_cnt resultss">
                <h2>Search Result</h2>

            </div>



            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => $file_name,
            ));
            ?>



        </div>
    </div>
</div>
</div>
</section>

<style>
    .highlight{
        color: red;
        background-color: yellow;
    }
</style>


<script>
        jQuery.fn.highlight = function (str, className) {
            var regex = new RegExp(str, "gi");
            return this.each(function () {
                $(this).contents().filter(function () {
                    return this.nodeType == 3 && regex.test(this.nodeValue);
                }).replaceWith(function () {
                    return (this.nodeValue || "").replace(regex, function (match) {
                        return "<span class=\"" + className + "\">" + match + "</span>";
                    });
                });
            });
        };
        $(".resultss *").highlight("<?php echo $parameter ?>", "highlight");
</script>
<script>
        // Size Selector
        $(".size_selector label").click(function () {

            $('.size_selector label').removeClass('active');
            $("input[name=size_selector]").removeAttr('checked');
            if ($(this).addClass('active')) {
                $("input[name=size_selector][value='" + this.id + "']").attr("checked", true);
                $('#selected_size').val(this.id);
                productFilter();
            }
        });
        ///

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
                    $(".min_value").html("<i class='fa fa-rupee'></i> " + ui.values[ 0 ]);
                    $(".max_value").html("<i class='fa fa-rupee'></i> " + ui.values[ 1 ]);
                },
                stop: function (event, ui) {
                    showLoader();
                    //debugger;
                    productFilter();
                }
                //alert();
            });
//            $("#amount").val("$" +$("#slider-range").slider("values", 0));
//            $("#amount1").val("$" + $("#slider-range").slider("values", 1));
            $("#amount").val($("#slider-range").slider("values", 0));
            $("#amount1").val($("#slider-range").slider("values", 1));
            $(".min_value").html("<i class='fa fa-rupee'></i> " + $("#slider-range").slider("values", 0));
            $(".max_value").html("<i class='fa fa-rupee'></i> " + $("#slider-range").slider("values", 1));
            $(".add_to_cart").click(function () {
                var id = $(this).attr('id');
                var canname = $("#cano_name_" + id).val();
                var qty = $(".qty_" + id).val();
                addtocart(canname, qty);
            });
        });
        function productFilter() {
            var size;
            var form = $("#slide_rnge");
            var min_amount = $("#amount").val();
            var max_amount = $("#amount1").val();
            var categ_id = $("#cat_name").val();
            size = $('#selected_size').val();

            var value = <?php echo Yii::app()->session['temp_product_filter']; ?>
            $.ajax({
                url: baseurl + 'Products/PriceRange',
                type: "POST",
                //data: form.serialize()
                data: {min: min_amount, max: max_amount, cat: categ_id, size: size}
            }).done(function (data) {
                if (value == 1) {
                    $("#content").html(data);
                } else {
                    $(".product_list").html(data);
                }

                hideLoader();
            });
        }
</script>
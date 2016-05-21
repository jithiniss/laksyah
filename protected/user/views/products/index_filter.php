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
        <h3><i class="fa fa-align-justify "></i>Category</h3>
        <div class="cat_nav">
            <?php echo $this->renderPartial('left_menu', array('category' => $category, 'parent' => $parent)); ?>
        </div>
        <h3><i class="fa fa-align-justify "></i>Filter</h3>
        <div class="price_filter">
            <h4>Price</h4>
            <p>
            <form name="slide_rnge" id="slide_rnge" method="post" action="<?= Yii::app()->baseUrl; ?>/index.php/products/Category/name/<?= $category_name ?>">
                <input type="hidden" id="amount" name="amount" readonly=""  style="border:0; color:#f6931f; font-weight:bold;" />
                <input type="hidden" id="amount1" name="amount1"readonly=""  style="border:0; color:#f6931f; font-weight:bold;" />
                <input type="hidden" id="cat_name" name="cat_name" value="<?= $get_cat_name->id; ?>"/>

                </p>
                <div id="slider-range"></div>
                <div class="slider_values"> <span class="min_value"></span><span class="max_value"></span>
                    <div class="clearfix"></div>
                </div>
            </form>
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
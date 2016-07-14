<ul class="catmenu">
        <?php
        $category_name = Yii::app()->request->getParam('name');
        $parent = ProductCategory::model()->findByAttributes(array('canonical_name' => $category_name));

//        $get_parant = ProductCategory::model()->
        if ($parent->parent == 4) {
                $main_cats = ProductCategory::model()->findAllByAttributes(array(), array('condition' => 'id = 4'));
        } else {
                $main_cats = ProductCategory::model()->findAllByAttributes(array(), array('condition' => 'id = parent and id!=4'));
        }
        // $main_cats = ProductCategory::model()->findAllByAttributes(array(), array('condition' => 'id = parent'));
        foreach ($main_cats as $main_cat) {
                $subcats = ProductCategory::model()->findAllByAttributes(array('parent' => $main_cat->id), array('condition' => 'id !=' . $main_cat->id));
                if (!empty($subcats)) {
                        $main_menus = '#';
                } else {
                        $main_menus = Yii::app()->request->baseUrl . "/index.php/products/category/name/" . $main_cat->canonical_name;
                }
                ?>
                <li class="<?= $main_cat->canonical_name == $category_name ? 'open catselected' : '' ?>maincat_<?= $main_cat->canonical_name; ?>">
                        <a href="<?php echo $main_menus; ?>"><?= $main_cat->category_name; ?><i class="fa <?= $main_cat->canonical_name == $category_name ? 'fa-angle-down' : 'fa-angle-up idown_' . $main_cat->canonical_name; ?> pull-right"></i></a>
                        <ul class="subcat">
                                <?php
                                foreach ($subcats as $subcat) {

                                        if ($subcat->canonical_name == $category_name) {
                                                $selected = 'catselected';
                                                $open = $main_cat->canonical_name;
                                        } else {
                                                $selected = '';
                                        }
                                        echo "<li class ='" . $selected . "'> <a href = '" . Yii::app()->request->baseUrl . "/index.php/products/category/name/" . $subcat->canonical_name . "'>" . $subcat->category_name . "</a></li>";
                                }
                                ?>
                        </ul>
                </li>

        <?php }
        ?>


</ul>

<?php
if (isset($open)) {
        ?>
        <script>

                $(document).ready(function() {
                        $('.maincat_<?= $open ?>').addClass('open');
                        $('.idown_<?= $open ?>').removeClass('fa-angle-up').addClass('fa-angle-down');
                });
        </script>
<?php } ?>

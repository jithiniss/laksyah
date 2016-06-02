<a href="<?php echo Yii::app()->request->baseUrl; ?>">HOME</a>
<?php
$action = Yii::app()->controller->action->id;
if ($action == 'category') {
        if ($category_name != "") {
                $get_cat_name = ProductCategory::model()->findByAttributes(array('canonical_name' => $category_name));
                if ($get_cat_name->id == $get_cat_name->parent) {
                        ?>
                        <span>/</span> <?php echo $get_cat_name->category_name; ?>
                        <?php
                } else {
                        $get_parent = ProductCategory::model()->findByPk($get_cat_name->parent);
                        ?>
                        <span>/</span><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/products/category/name/<?= $get_parent->canonical_name; ?>"><?php echo $get_parent->category_name; ?></a><span>/</span> <?php echo $get_cat_name->category_name; ?>
                        <?php
                }
        }
} else if ($action == 'Detail') {
        if ($category_name != "") {
                $get_cat_name = ProductCategory::model()->findByAttributes(array('canonical_name' => $category_name));
                if ($get_cat_name->id == $get_cat_name->parent) {
                        ?>
                        <?php echo $get_cat_name->category_name; ?>
                        <?php
                } else {
                        $get_parent = ProductCategory::model()->findByPk($get_cat_name->parent);
                        ?>
                        <span>/</span><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/products/category/name/<?= $get_parent->canonical_name; ?>"><?php echo $get_parent->category_name; ?></a><span>/</span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/products/category/name/<?= $get_cat_name->canonical_name; ?>"><?php echo $get_cat_name->category_name; ?></a>
                        <?php
                }
        }
}
?>
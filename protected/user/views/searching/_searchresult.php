
<div class="col-md-4 col-sm-6 col-xs-6 sd choice">
    <div class="effects">
        <div class="zoom-img">
            <a href="<?= Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $data->canonical_name; ?>">
                <?php if ($data->main_image == NULL) { ?>
                        <img width="280" height="300" class="safe" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/no-productimage.jpg" />
                        <?php
                } else {
                        ?>
                        <img width="280" height="300" class="safe img-responsive" src="<?= Yii::app()->request->baseUrl; ?>/uploads/products/category/<?= $data->id; ?>.<?= $data->image; ?>"/>
                <?php } ?></a>
        </div>
    </div>

    <h2 class="cat_font"><?= $data->category_name; ?></h2>
    <a class="reads" href="<?= Yii::app()->request->baseUrl; ?>/index.php/products/Category/name/<?php echo $data->canonical_name; ?>">Read More</a>
</div>
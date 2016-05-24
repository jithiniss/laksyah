<div class="my_cart_item cart_product_detail cart_item">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" />
        <h3><?php echo $prod_details->product_name; ?></h3>
        <?php $options = OptionDetails::model()->findByPk($cart_content->options); ?>
        <?php if ($options->color_id != 0) { ?><p><span>Color:</span>	<?php echo OptionCategory::model()->findByPk($options->color_id)->color_name; ?></p> <?php } ?>
        <?php if ($options->size_id != 0) { ?><p><span>Size:</span>	<?php echo OptionCategory::model()->findByPk($options->size_id)->size; ?> </p><?php } ?>
        <p><span>Qty:</span>	<?php echo $cart_content->quantity; ?></p>
        <p><span>Price:</span>	<?php echo Yii::app()->Currency->convert($total); ?></p>
        <div class="clearfix"></div>
        <div class="remove_item" canname="<?php echo $prod_details->canonical_name; ?>" cartid="<?php echo $cart_content->id; ?>"><a  class="cart_close1" >x</a></div>
</div>


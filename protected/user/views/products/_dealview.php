<div class="col-sm-3 col-xs-6">
        <div class="products_item">
                <div class="product_image">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $data->canonical_name; ?>">
                                <?php if ($data->main_image == NULL) { ?>
                                        <img width="280" height="300" class="safe" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/no-productimage.jpg" />
                                        <?php
                                } else {
                                        ?><div class="img_div_view">
                                                <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                                echo Yii::app()->Upload->folderName(0, 1000, $data->id)
                                                ?>/<?php echo $data->id; ?>/medium.<?php echo $data->main_image; ?>" alt="<?php echo $data->product_name; ?>"/></div>
                                <?php } ?></a>
                        <div class="second_image"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $data->canonical_name; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                        echo Yii::app()->Upload->folderName(0, 1000, $data->id)
                                        ?>/<?php echo $data->id; ?>/hover/hover.<?php echo $data->hover_image; ?>" alt="<?php echo $data->product_name; ?>"/></a></div>
                </div>
                <div class="list_title">
                        <h3><?php echo $data->product_name; ?></h3>
                        <!--<h4>Saree</h4>-->

                        <?php
                        if ($data->stock_availability == 1) {
                                if ($data->discount_rate != 0) {
                                        if ($data->discount_type == 1) {
                                                $discountRate = $data->price - $data->discount_rate;
                                        } else {
                                                $discountRate = $data->price - ( $data->price * ($data->discount_rate / 100));
                                        }
                                        ?>
                                        <p><span class="old_price"><?php echo Yii::app()->Currency->convert($data->price); ?></span>  <span class="discounted"><?php echo Yii::app()->Discount->Discount($data); ?></span></p>
                                        <?php
                                } else {
                                        ?>
                                        <p><span class="discounted"><?php echo Yii::app()->Currency->convert($data->price); ?></span> </p>
                                        <?php
                                }
                        } else {
                                ?>
                                <p><span class="discounted"><?php echo Yii::app()->Currency->convert($data->price); ?></span> </p>
                        <?php } ?>
                </div>
        </div>
</div>


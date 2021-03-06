<div class="col-sm-4 col-xs-6" >
        <div class="products_item">
                <div class="product_image">
                        <?php if ($data->main_image == NULL) { ?>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $data->canonical_name; ?>">
                                        <img width="280" height="300" class="safe" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/no-productimage.jpg" /></a>
                                <?php
                        } else {
                                ?><div class="img_div_view">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $data->canonical_name; ?>">
                                                <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                                echo Yii::app()->Upload->folderName(0, 1000, $data->id)
                                                ?>/<?php echo $data->id; ?>/medium.<?php echo $data->main_image; ?>"/></a></div>
                                        <?php if ($data->hover_image != '') { ?>
                                        <div class="second_image">
                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $data->canonical_name; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                                        echo Yii::app()->Upload->folderName(0, 1000, $data->id)
                                                        ?>/<?php echo $data->id; ?>/hover/hover.<?php echo $data->hover_image; ?>" alt=""/></a>

                                        </div>
                                <?php } ?>
                        <?php } ?>
                        <?php
                        if ($data->enquiry_sale == 1) {
                                $option_exists = OptionDetails::model()->findAllByAttributes(array('product_id' => $data->id));


                                if (empty($option_exists)) {

                                        if ($data->stock_availability == 0 || $data->quantity <= 0) {
                                                ?>
                                                <form action="<?= Yii::app()->baseUrl; ?>/index.php/products/ProductNotify/id/<?= $data->id; ?>" method="post" name="notify">

                                                        <div class="stock_notify">      <?php
                                                                if (isset(Yii::app()->session['user'])) {
                                                                        ?>
                                                                        <input class="form-control" type="text" placeholder="Email Address" id="email"  name="email" value="<?= Yii::app()->session['user']['email'] ?>">
                                                                        <?php
                                                                } else {
                                                                        ?>
                                                                        <input type="text"  class="form-control" placeholder="Email Address" id="email"  name="email" autocomplete="off">
                                                                        <?php
                                                                }
                                                                ?>
                                                                <input type="submit" class="btn btn-primary" href="#" value="Notify Me" style="margin-top: 8px;">
                                                        </div>
                                                </form>

                                                <div class="out_of_stock">OUT OF STOCK</div>
                                        <?php } ?>

                                        <?php
                                } else {

                                        foreach ($option_exists as $option_exist) {
                                                $total_stock += $option_exist->stock;
                                                $out_stock +=$option_exist->status;
                                        }
                                        if ($total_stock == 0 || $out_stock == 0) {
                                                ?>
                                                <form action="<?= Yii::app()->baseUrl; ?>/index.php/products/ProductNotify/id/<?= $data->id; ?>" method="post" name="notify">
                                                        <div class="stock_notify">      <?php
                                                                if (isset(Yii::app()->session['user'])) {
                                                                        ?>
                                                                        <input class="form-control" type="text" placeholder="Email Address" id="email"  name="email" value="<?= Yii::app()->session['user']['email'] ?>">
                                                                        <?php
                                                                } else {
                                                                        ?>
                                                                        <input type="text"  class="form-control" placeholder="Email Address" id="email"  name="email" autocomplete="off">
                                                                        <?php
                                                                }
                                                                ?>
                                                                <input type="submit" class="btn btn-primary" href="#" value="Notify Me" style="margin-top: 8px;">
                                                        </div>
                                                </form>
                                                <div class="out_of_stock">OUT OF STOCK</div>
                                                <?php
                                        }
                                }
                        }
                        ?>
                        <!-- /Notifyme-->

                </div><!-- /Product Image-->

                <div class="list_title">

                        <h3><?php echo $data->product_name; ?></h3>
                        <h4><?php echo CHtml::encode($data->display_category_name) ?></h4>
            <!--                        <p><i class="fa fa-rupee"></i> <?php echo $data->price; ?></p>-->
                        <?php
                        $category_check = Products::model()->findByAttributes(array('canonical_name' => $data->canonical_name));
                        $cat_ids = explode(',', $category_check->category_id);
                        if (!in_array("4", $cat_ids)) {
                                ?>
                                <p><?php echo Yii::app()->Discount->Discount($data); ?></p>
                        <?php } ?>
                </div>
        </div>
</div>

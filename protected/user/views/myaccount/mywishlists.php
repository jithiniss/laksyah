<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?><span>/</span><?php echo CHtml::link('My Account', array('Myaccount/index')); ?>  <span>/</span>My Wishlists </div>
        <div class="row">
                <?php echo $this->renderPartial('_menu'); ?>
                <div class="col-sm-9 user_content">
                        <h1>My Wishlists</h1>
                        <div class="cart_table">
                                <div class="header_row cart_row">
                                        <div class="col-11">PRODUCT</div>
                                        <div class="col-33">PRICE</div>
                                        <div class="col-44">ACTION</div>
                                </div>
                                <?php
                                foreach ($wishlists as $wishlist) {
                                        $prod_name = Products::model()->findByPk($wishlist->prod_id);
                                        ?>
                                        <div class="cart_row">
                                                <div class="col-11">
                                                        <div class="cart_product_detail">
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo Yii::app()->Upload->folderName(0, 1000, $prod_name->id) ?>/<?php echo $prod_name->id; ?>/small.<?php echo $prod_name->main_image; ?>" alt=""/>
                                                                <h3><?= $prod_name->product_name; ?></h3>
                                                                <p><?= $prod_name->description; ?></p>
                                                                      <!--  <p><span>Color:</span>	Doeskin</p>
                                                                <p><span>Size:</span>	S</p>
                                                                <p><span>Qty:</span>	1</p>-->
                                                                <div class="clearfix"></div>
                                                        </div>
                                                </div>
                                                <div class="col-33"><strong><?php echo Yii::app()->Discount->Discount($prod_name); ?></strong></div>
                                                <div class="col-44">
                                                        <div class="cart_action">
                                                                <?php echo CHtml::link('Remove', array('Myaccount/RemoveMywishlists', 'pid' => CHtml::encode($wishlist->prod_id))); ?>
                                                                <?php echo CHtml::link('View Product', array('Products/Detail', 'name' => CHtml::encode($prod_name->canonical_name)), array('class' => 'add_to_cart', 'id' => CHtml::encode($prod_name->id))); ?>
                                                                <input type="hidden" name="qty" class="qty" value="1" />
                                                                <input type = "hidden" value = "<?= $prod_name->canonical_name; ?>" id="cano_name_<?= $prod_name->id; ?>" name="cano_name">
                                                        </div>
                                                </div>
                                        </div>
                                <?php } ?>
                                <!-- / Cart Item-->

                        </div>
                        <?php if (!empty($wishlists)) { ?>
                                <!--                    <div class="form_button">
                                                        <button class="btn btn-primary">ADD ALL TO CART</button>
                                                    </div>-->
                        <?php } ?>
                </div>
        </div>
</div>
<div class="container main_container product_archive">
        <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> WOOMEN </div>
        <div class="gift_header">
                <h2>Laksyah Gift Cards</h2>
                <h4>Rush to grab sensational deals on exquisite outfits   </h4>
                <div class="clearfix"></div>

        </div>
        <div class="product_list">
                <div class="row">
                        <?php
                        foreach ($model as $gift) {
                                ?>
                                <div class="col-sm-4 col-xs-6">
                                        <div class="products_item gift_item">


                                                <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>../uploads/gift/<?php echo $gift->id ?>.<?php echo $gift->image ?>"  ></a>
                                                <div class="list_title">
                                                        <h3><?php echo $gift->name; ?></h3>
                                                        <p><i class="fa fa-rupee"></i><?php echo $gift->amount; ?></p>
                                                        <p> <form method="post" action="<?= Yii::app()->baseUrl; ?>/index.php/Giftcard/index">
                                                                <input type="hidden" id="card_id" name="card_id" value="<?= $gift->id ?>">
                                                                <input type="submit" name="submit" class="btn-primary btn-small" value="BUY NOW">
                                                        </form></p>
                                                </div>

                                        </div>
                                </div>
                        <?php } ?>

                </div>
        </div>
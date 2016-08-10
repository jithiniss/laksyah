<div class="container main_container product_archive">
        <div class="breadcrumbs"><a href="<?php echo Yii::app()->baseUrl ?>/index.php">HOME</a> <span>/</span> GIFT CARD </div>
        <div class="gift_header">
                <h2>Laksyah Gift Cards</h2>
                <!--<h4>Rush to grab sensational deals on exquisite outfits   </h4>-->

                <div class="clearfix"></div>
                <h4 style="">For use Laksyah Design House and www.laksyah.com only</h4>
                <h3 style=""><a href="#" data-toggle="modal" data-target="#redeemModal">How Do I Redeem My Card</a> </h3>

        </div>


 <div class="modal fade" id="redeemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                                </div>
                                                                <div class="modal-body">
                                                                        1.Enter Your Giftcard Code.<br/>
2.Click Submit to get the money credited to your wallet.

                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>

                                                                </div>
                                                        </div>
                                                </div>
                                      
</div>

        <div class="product_list">
                <div class="row">
                        <?php
                        foreach ($model as $gift) {
                                ?>
                                <div class="col-sm-4 col-xs-6">
                                        <div class="products_item gift_item">


                                                <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/uploads/gift/<?php echo $gift->id ?>.<?php echo $gift->image ?>"  ></a>
                                                <div class="list_title">
                                                        <h3><?php echo $gift->name; ?></h3>
                                                        <!--<p><?php echo Yii::app()->Currency->convert($gift->amount); ?></p>-->
                                                        <p>
                                                                <?php if (isset(Yii::app()->session['user'])) { ?>
                                                                        <a href = "<?= Yii::app()->baseUrl; ?>/index.php/Giftcard/index?card_id=<?= $gift->id ?>" > <button  class="btn-primary btn-small">BUY NOW</button></a>
                                                                <?php } else { ?>
                                                                        <button data-toggle="modal" onclick="giftcard(id =<?= $gift->id ?>)"  data-target="#login" class="btn-primary btn-small">BUY NOW</button>
                                                                <?php } ?>
                                                                </a>
                                                        </p>
                                                </div>

                                        </div>
                                </div>
                        <?php } ?>
                        <div class="col-xs-12">
                                <p><strong>Please Note:</strong> It is a requirement of the checkout process that a "shipping address" is provided when placing an order. If you have selected a digital gift card. It will be sent to the email address you specify with in 24 hours of placing your orders and will not be delivered physically to the specified "Shipping Address"</p>
                        </div>

                </div>
        </div>
</div>
<script>
        function giftcard(id) {

//                document.getElementById('gift_card').value = id;
                $('#login_form').append('<input type="hidden" name="gift_id" id="gift_card" value="' + id + '" />');
        }
</script>
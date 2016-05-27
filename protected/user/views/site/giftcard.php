<div class="container main_container product_archive">
        <div class="breadcrumbs"> <a href="<?php echo Yii::app()->baseUrl ?>">HOME</a> <span>/</span> GIFT CARD </div>
        <div class="gift_header">
                <h2>Laksyah Gift Cards</h2>
                <h4>Rush to grab sensational deals on exquisite outfits   </h4>
                <div class="clearfix"></div>

        </div>
        <div class="modal" id="giftlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"></h4>
                                </div>
                                <div class="modal-body">
                                        <!-- Nav tabs -->


                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active login_popup " id="home">
                                                        <h2>SIGN IN</h2>
                                                        <h4>Sign in to proceed to Checkout</h4>
                                                        <?php if (Yii::app()->user->hasFlash('login_list')): ?>
                                                                <div class="alert alert-danger mesage">
                                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                        <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('login_list'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <form  name="login" action="<?= Yii::app()->baseUrl; ?>/index.php/Giftcard/login" method="POST">
                                                                <?php Yii::app()->session['gift_card_detail'] = $gift->id; ?>
                                                                <label>Email Address</label>
                                                                <input class="form-control" type="text" name="UserDetails[email]" />
                                                                <label>Password</label>
                                                                <input class="form-control" type="password" name="UserDetails[password]" />

                                                                <p><a href="#" class="forgot">Forgot Password?</a></p>

                                                                <input type="submit"  class ="btn-primary btn-full" value="SIGN IN" />
                                                        </form>
                                                </div>
                                        </div>

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


                                                <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>../uploads/gift/<?php echo $gift->id ?>.<?php echo $gift->image ?>"  ></a>
                                                <div class="list_title">
                                                        <h3><?php echo $gift->name; ?></h3>
                                                        <p><i class="fa fa-rupee"></i><?php echo Yii::app()->Currency->convert($gift->amount); ?></p>
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

                </div>
        </div>
</div>
<script>
        function giftcard(id) {
                document.getElementById('gift_card').value = id;
//                $('form#login_form').append('<input type="hidden" name="gift_id" value=" id" />');
        }
</script>
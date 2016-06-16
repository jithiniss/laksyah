<div class="container main_container product_archive">
    <div class="breadcrumbs"><a href="<?php echo Yii::app()->baseUrl ?>/index.php">HOME</a> <span>/</span> GIFT CARD </div>
    <div class="gift_header">
        <h2>Laksyah Gift Cards</h2>
        <h4>Rush to grab sensational deals on exquisite outfits   </h4>
        <div class="clearfix"></div>

    </div>



    <div class="product_list">
        <div class="row">
            <?php
            foreach($model as $gift) {
                    ?>
                    <div class="col-sm-4 col-xs-6">
                        <div class="products_item gift_item">


                            <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/uploads/gift/<?php echo $gift->id ?>.<?php echo $gift->image ?>"  ></a>
                            <div class="list_title">
                                <h3><?php echo $gift->name; ?></h3>
                                <p><?php echo Yii::app()->Currency->convert($gift->amount); ?></p>
                                <p>
                                    <?php if(isset(Yii::app()->session['user'])) { ?>
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

//                document.getElementById('gift_card').value = id;
            $('#login_form').append('<input type="hidden" name="gift_id" id="gift_card" value="' + id + '" />');
        }
</script>
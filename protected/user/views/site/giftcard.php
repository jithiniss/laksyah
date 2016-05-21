<div class="row">
    <?php
    foreach ($model as $gift) {
            ?>

            <div class="col-md-4">
                <img src="<?php echo Yii::app()->baseUrl ?>../uploads/gift/<?php echo $gift->id ?>.<?php echo $gift->image ?>" style="width: 498px;" >
                <p style="margin-left: 241px;font-weight: 600;"><?php echo $gift->name; ?></p>
                <p style="margin-left: 241px;font-weight: 600;">Rs.<?php echo $gift->amount; ?></p>
                <form method="post" action="<?= Yii::app()->baseUrl; ?>/index.php/Giftcard/index">
                    <input type="hidden" id="card_id" name="card_id" value="<?= $gift->id ?>">
                    <input type="submit" name="submit" class="btn-primary" value="proceed">
                </form>

            </div>




    <?php } ?>
</div>
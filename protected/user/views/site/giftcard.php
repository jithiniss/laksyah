<div class="row">
        <?php
        foreach ($model as $gift) {
                ?>

                <div class="col-md-4">
                        <img src="<?php echo Yii::app()->baseUrl ?>../uploads/gift/<?php echo $gift->id ?>.<?php echo $gift->image ?>" style="width: 498px;" >
                        <p style="margin-left: 241px;font-weight: 600;"><?php echo $gift->name; ?></p>
                        <p style="margin-left: 241px;font-weight: 600;">Rs.<?php echo $gift->amount; ?></p>
                        <button style="margin-left: 241px;">BUY NOW</button>

                </div>




        <?php } ?>
</div>

<div class="col-sm-6">
        <div class="blog_item">
                <h2><?php echo $data->heading; ?></h2>
                <p class="meta"><?php echo date("l, F j, Y", strtotime($data->DOC)); ?></p>
                <img src="<?php echo yii::app()->request->baseUrl; ?>/uploads/blog/<?= $data->id; ?>/small.<?= $data->big_image ?>" style="width: 254px;height: 206px;" alt=""/>
                <p><?= substr($data->small_content, 0, 820); ?><?php echo CHtml::link('read more', array('site/BlogDetails', 'blog' => CHtml::encode($data->id))); ?> </p>

                <div class="clearfix"></div>
        </div>
</div>
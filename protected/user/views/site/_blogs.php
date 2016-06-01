
<div class="col-sm-6">
        <div class="blog_item">
                <?php
                $timestamp = strtotime($data->DOC);
                $day = date('D', $timestamp);
                $mnth = date('M', $timestamp);
                $year = date("Y", $timestamp);
                ?>
                <h2><?php echo $data->heading; ?></h2>
                <p class="meta"><?php
                        echo $day;
                        echo ',', $mnth;
                        echo ',', $year;
                        ?></p>
                <img src="<?php echo yii::app()->request->baseUrl; ?>/uploads/blog/<?= $data->id; ?>/small.<?= $data->big_image ?>" style="width: 254px;height: 206px;" alt=""/>
                <p><?= substr($data->small_content, 0, 820); ?><?php echo CHtml::link('read more', array('site/BlogDetails', 'blog' => CHtml::encode($data->id))); ?> </p>
                <div class="clearfix"></div>
        </div>
</div>

<div class="col-sm-6">
        <div class="blog_item">
                <?php
                $weekday = date('l', strtotime($data->DOC));
                $month = date('F', strtotime($data->DOC));
                $year = date('Y', strtotime($data->DOC));
                $day = date('d', strtotime($data->DOC));
                ?>
                <h2><?php echo $data->heading; ?></h2>
                <p class="meta"><?php
                        echo $weekday;
                        echo '  ,  ', $month;
                        echo '  ';
                        echo $day;
                        echo '  ', $year;
                        ?></p>
                <img src="<?php echo yii::app()->request->baseUrl; ?>/uploads/blog/<?= $data->id; ?>/small.<?= $data->big_image ?>" style="width: 254px;height: 206px;" alt=""/>
                <p><?= substr($data->small_content, 0, 820); ?><?php echo CHtml::link('read more', array('site/BlogDetails', 'blog' => CHtml::encode($data->id))); ?> </p>

                <div class="clearfix"></div>
        </div>
</div>
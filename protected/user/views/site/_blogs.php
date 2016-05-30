
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
                <img src="<?php echo yii::app()->request->baseUrl; ?>/uploads/blog/<?= $data->id; ?>/small.<?= $data->big_image ?>" alt=""/>
                <p><?= substr($data->small_content, 0, 820); ?><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/site/BlogDetails?blog=<?= $data->id ?>">read more</a></p>
                <div class="clearfix"></div>
        </div>
</div>
<div class="container main_container inner_pages blog_single ">
        <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span>Kavya's BLOG </div>
        <div class="user_content">

                <!--<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Success </div>-->

                <article>
                        <div class="blog_titles">
                                <h1><?= $model->heading; ?></h1>
                                <?php
                                $timestamp = strtotime($model->DOC);
                                $day = date('D', $timestamp);
                                $mnth = date('M', $timestamp);
                                $year = date("Y", $timestamp);
                                ?>
                                <p class="meta"><?php
                                        echo $day;
                                        echo ',', $mnth;
                                        echo ',', $year;
                                        ?></p>
                                <p class="author"></p>
                        </div>
                        <img src="<?php echo yii::app()->request->baseUrl; ?>/uploads/blog/<?= $model->id; ?>/big.<?= $model->big_image ?>" alt=""/>
                        <p><strong><em><?= $model->heading ?></em></strong></p>
                        <p> <?= substr($model->small_content, 0, 913); ?></p>
                        <h3><?= $model->meta_title; ?></h3>
                        <p> <em><strong><?= $model->meta_keywords; ?></strong></em><strong></strong></p>
                        <p><?= substr($model->meta_keywords, 0, 1213); ?></p>
                        <p> <?= substr($model->meta_description, 0, 1213); ?></p>
                        <div class="article_footer">
                                <?php
                                if ($model->id == $first_id->id) {

                                } else {
                                        ?>
                                        <a class="btn btn-skel pull-left" href="<?php echo yii::app()->request->baseUrl; ?>/index.php/site/BlogDetailsPrevious?currentId=<?= $model->id ?>"><i class="fa fa-angle-left"></i> PREVIOUS</a>
                                <?php } ?>
                                <?php
                                if ($model->id == $last_id->id) {

                                } else {
                                        ?>
                                        <a class="btn btn-skel pull-right" href="<?php echo yii::app()->request->baseUrl; ?>/index.php/site/BlogDetailsNext?currentId=<?= $model->id ?>"><i class="fa fa-angle-right"></i> NEXT</a>
                                <?php } ?>
                        </div>
                </article>
        </div>
</div>
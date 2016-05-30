<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <a href="<?php echo yii::app()->request->baseUrl; ?>/index.php">HOME</a> <span>/</span> KAVYA'S BLOG </div>
        <div class="blog_lists">
                <div class="row ">
                        <?php
                        if (!empty($dataprovider) || $dataProvider != '') {
                                $this->widget('zii.widgets.CListView', array(
                                    'dataProvider' => $dataProvider,
                                    'itemView' => '_blogs',
                                ));
                        }
                        ?>


                </div>
        </div>
</div>
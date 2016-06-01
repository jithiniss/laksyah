<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?>  <span>/</span> KAVYA'S BLOG </div>
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
<section class="content-header">
    <h1>
        Admin Post
<!--        <small>Optional description</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Admin Post</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/settings/AdminPost/create'; ?>" class='btn  btn-laksyah'>Add Post</a>
    <div class="col-xs-12 form-page">
        <div class="box">
            <?php 
              $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'admin-post-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'post_name',
                    array(
                        'name' => 'static_pages',
                        'value' => function($data) {



                                if($data->static_pages == 1) {
                                        return "Enabled";
                                } elseif($data->static_pages == 0) {
                                        return "Disabled";
                                } else {
                                        return "Invalid";
                                }
                        },
                        'filter' => array('1' => "Enabled", '0' => "Disabled")
                    ),
                    array(
                        'name' => 'products',
                        'value' => function($data) {



                                if($data->products == 1) {
                                        return "Enabled";
                                } elseif($data->products == 0) {
                                        return "Disabled";
                                } else {
                                        return "Invalid";
                                }
                        },
                        'filter' => array('1' => "Enabled", '0' => "Disabled")
                    ),
                    array(
                        'name' => 'enquiry',
                        'value' => function($data) {



                                if($data->enquiry == 1) {
                                        return "Enabled";
                                } elseif($data->enquiry == 0) {
                                        return "Disabled";
                                } else {
                                        return "Invalid";
                                }
                        },
                        'filter' => array('1' => "Enabled", '0' => "Disabled")
                    ),
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}{delete}',
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>
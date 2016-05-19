<section class="content-header">
    <h1>
        Admin User

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Admin Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/settings/AdminUser/create'; ?>" class='btn  btn-laksyah'>Add User</a>

    <div class="col-xs-12 form-page">
        <div class="box">

            <div class="box-body table-responsive no-padding">
                <?php
                $this->widget('booster.widgets.TbGridView', array(
                    'type' => ' bordered condensed hover',
                    'id' => 'admin-user-grid',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'columns' => array(
                        array(
                            'name' => 'admin_post_id',
                            'header' => 'Post Name',
                            'value' => '$data->adminPost->post_name',
//                                            'value' => function($data) {
//
//                                                    return $data->adminPost->post_name;
//                                            },
                            'filter' => CHtml::listData(AdminPost::model()->findAll(), 'id', 'post_name')
                        ),
                        'username',
                        'password',
                        'name',
                        'email',
                        'phone',
                        array(
                            'htmlOptions' => array('nowrap' => 'nowrap'),
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{update}{delete}',
                        ),
                    ),
                ));
                ?>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

</section>
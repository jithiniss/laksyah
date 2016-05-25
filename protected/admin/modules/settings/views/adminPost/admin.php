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
                                    'name' => 'admin',
                                    'value' => function($data) {
                                            if ($data->admin == 1) {
                                                    return "Enabled";
                                            } elseif ($data->admin == 0) {
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
                                            if ($data->products == 1) {
                                                    return "Enabled";
                                            } elseif ($data->products == 0) {
                                                    return "Disabled";
                                            } else {
                                                    return "Invalid";
                                            }
                                    },
                                    'filter' => array('1' => "Enabled", '0' => "Disabled")
                                ),
                                array(
                                    'name' => 'orders',
                                    'value' => function($data) {
                                            if ($data->orders == 1) {
                                                    return "Enabled";
                                            } elseif ($data->orders == 0) {
                                                    return "Disabled";
                                            } else {
                                                    return "Invalid";
                                            }
                                    },
                                    'filter' => array('1' => "Enabled", '0' => "Disabled")
                                ),
                                array(
                                    'name' => 'coupons',
                                    'value' => function($data) {
                                            if ($data->coupons == 1) {
                                                    return "Enabled";
                                            } elseif ($data->coupons == 0) {
                                                    return "Disabled";
                                            } else {
                                                    return "Invalid";
                                            }
                                    },
                                    'filter' => array('1' => "Enabled", '0' => "Disabled")
                                ),
                                array(
                                    'name' => 'cms',
                                    'value' => function($data) {
                                            if ($data->cms == 1) {
                                                    return "Enabled";
                                            } elseif ($data->cms == 0) {
                                                    return "Disabled";
                                            } else {
                                                    return "Invalid";
                                            }
                                    },
                                    'filter' => array('1' => "Enabled", '0' => "Disabled")
                                ),
                                array(
                                    'name' => 'masters',
                                    'value' => function($data) {
                                            if ($data->masters == 1) {
                                                    return "Enabled";
                                            } elseif ($data->masters == 0) {
                                                    return "Disabled";
                                            } else {
                                                    return "Invalid";
                                            }
                                    },
                                    'filter' => array('1' => "Enabled", '0' => "Disabled")
                                ),
                                array(
                                    'name' => 'user_details',
                                    'value' => function($data) {
                                            if ($data->user_details == 1) {
                                                    return "Enabled";
                                            } elseif ($data->user_details == 0) {
                                                    return "Disabled";
                                            } else {
                                                    return "Invalid";
                                            }
                                    },
                                    'filter' => array('1' => "Enabled", '0' => "Disabled")
                                ),
                                array(
                                    'name' => 'reports',
                                    'value' => function($data) {
                                            if ($data->reports == 1) {
                                                    return "Enabled";
                                            } elseif ($data->reports == 0) {
                                                    return "Disabled";
                                            } else {
                                                    return "Invalid";
                                            }
                                    },
                                    'filter' => array('1' => "Enabled", '0' => "Disabled")
                                ),
                                array(
                                    'name' => 'status',
                                    'value' => function($data) {
                                            if ($data->status == 1) {
                                                    return "Enabled";
                                            } elseif ($data->status == 0) {
                                                    return "Disabled";
                                            } else {
                                                    return "Invalid";
                                            }
                                    },
                                    'filter' => array('1' => "Enabled", '0' => "Disabled")
                                ),
                                /* 'CB',
                                  'UB',
                                  'DOC',
                                  'DOU',
                                 */
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


</div>


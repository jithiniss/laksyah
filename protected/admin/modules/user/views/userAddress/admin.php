<section class="content-header">
        <h1>
                User Address        <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Manage Dimension Class   </li>
        </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/user/userAddress/create'; ?>" class='btn  btn-laksyah manage'>Add User Address</a>
<div class="col-xs-12 form-page">
        <div class="box">
                <div class="box-body table-responsive no-padding">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'user-address-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'first_name',
                                'last_name',
                                'company',
                                'address_1',
                                'address_2',
                                'city',
                                'postcode',
                                array(
                                    'name' => 'country',
                                    'value' => '$data->country0->country_name',
                                ),
                                array(
                                    'name' => 'state',
                                    'value' => '$data->state0->state_name',
                                ),
                                array(
                                    'name' => 'district',
                                    'value' => '$data->district0->district_name',
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
</div>

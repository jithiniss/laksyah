<section class="content-header">
    <h1>
        User Details                <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage User Details</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/user/userDetails/create'; ?>" class='btn  btn-laksyah manage'>Add User Details</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'user-details-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'first_name',
                    'last_name',
                    'dob',
                    'gender',
                    'email',
//                    'password',
//                    'confirm',
                    'phone_no_1',
                    'phone_no_2',
//                    'fax',
                    'newsletter',
//                    'status',
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}{delete} {wallet}',
                        'buttons' => array(
                            'wallet' => array(
                                'url' => 'Yii::app()->request->baseUrl."/admin.php/user/WalletHistory/view/id/".$data->id',
                                'label' => '<i class="fa fa-money" style="font-size: 20px;"> </i>',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Wallet',
                                    'target' => '_blank',
                                ),
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>

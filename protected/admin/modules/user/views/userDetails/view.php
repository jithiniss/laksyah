<section class="content-header">
    <h1>View UserDetails #<?php echo $model->id; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/order/admin'; ?>"><i class="fa fa-dashboard"></i>  Order</a></li>
        <li class="active">Manage</li>
    </ol>
</section>

<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">

            <?php
            $this->widget('booster.widgets.TbDetailView', array(
                'data' => $model,
                'attributes' => array(
//                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'phone_no_1',
                    'phone_no_2',
                    'fax',
                    'password',
                    'confirm',
                    'newsletter',
//                    'status',
//                    'CB',
//                    'UB',
//                    'DOC',
//                    'DOU',
                ),
            ));
            ?>
        </div>
    </div>
</div>
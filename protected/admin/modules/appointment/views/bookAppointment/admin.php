<?php
/* @var $this BookAppointmentController */
/* @var $model BookAppointment */
?>
<section class="content-header">
    <h1>
        Appointment              <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage User Details</li>
    </ol>
</section>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'book-appointment-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'name',
                    'email',
                    'phone',
                    array(
                        'name' => 'country',
                        'value' => '$data->country0->country_name',
                    ),
                    'city',
                    /*
                      'address',
                      'notes',
                      'date',
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{delete}',
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>


<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */
?>
<section class="content-header">
    <h1>
        Testimonial               <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage User Details</li>
    </ol>
</section>

<a  href="<?php echo Yii::app()->request->baseurl . '/admin.php/testimonials/Testimonial/create'; ?>"  class='btn  btn-laksyah manage'> Add Testimonial</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'testimonial-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'name',
                    'position',
                    'content',
                    /*
                      'doc',
                      'dob',
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


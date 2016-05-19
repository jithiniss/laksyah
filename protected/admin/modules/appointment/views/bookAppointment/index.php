<?php
/* @var $this BookAppointmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Book Appointments',
);

$this->menu=array(
	array('label'=>'Create BookAppointment', 'url'=>array('create')),
	array('label'=>'Manage BookAppointment', 'url'=>array('admin')),
);
?>

<h1>Book Appointments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this MeasurementPdfsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Measurement Pdfs',
);

$this->menu=array(
	array('label'=>'Create MeasurementPdfs', 'url'=>array('create')),
	array('label'=>'Manage MeasurementPdfs', 'url'=>array('admin')),
);
?>

<h1>Measurement Pdfs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

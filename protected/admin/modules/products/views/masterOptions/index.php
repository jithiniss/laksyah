<?php
/* @var $this MasterOptionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Options',
);

$this->menu=array(
	array('label'=>'Create MasterOptions', 'url'=>array('create')),
	array('label'=>'Manage MasterOptions', 'url'=>array('admin')),
);
?>

<h1>Master Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this ProductMailTemplateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Mail Templates',
);

$this->menu=array(
	array('label'=>'Create ProductMailTemplate', 'url'=>array('create')),
	array('label'=>'Manage ProductMailTemplate', 'url'=>array('admin')),
);
?>

<h1>Product Mail Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this DealProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Deal Products',
);

$this->menu=array(
	array('label'=>'Create DealProducts', 'url'=>array('create')),
	array('label'=>'Manage DealProducts', 'url'=>array('admin')),
);
?>

<h1>Deal Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

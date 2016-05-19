<?php
/* @var $this AdminPostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Admin Posts',
);

$this->menu=array(
	array('label'=>'Create AdminPost', 'url'=>array('create')),
	array('label'=>'Manage AdminPost', 'url'=>array('admin')),
);
?>

<h1>Admin Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

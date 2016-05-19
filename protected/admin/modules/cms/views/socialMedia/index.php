<?php
/* @var $this SocialMediaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Social Medias',
);

$this->menu=array(
	array('label'=>'Create SocialMedia', 'url'=>array('create')),
	array('label'=>'Manage SocialMedia', 'url'=>array('admin')),
);
?>

<h1>Social Medias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

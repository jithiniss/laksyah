<?php
/* @var $this NewsletterContentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Newsletter Contents',
);

$this->menu=array(
	array('label'=>'Create NewsletterContent', 'url'=>array('create')),
	array('label'=>'Manage NewsletterContent', 'url'=>array('admin')),
);
?>

<h1>Newsletter Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

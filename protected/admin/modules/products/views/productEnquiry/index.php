<?php
/* @var $this ProductEnquiryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Enquiries',
);

$this->menu=array(
	array('label'=>'Create ProductEnquiry', 'url'=>array('create')),
	array('label'=>'Manage ProductEnquiry', 'url'=>array('admin')),
);
?>

<h1>Product Enquiries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

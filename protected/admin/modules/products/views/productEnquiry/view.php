<?php
/* @var $this ProductEnquiryController */
/* @var $model ProductEnquiry */

$this->breadcrumbs = array(
    'Product Enquiries' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List ProductEnquiry', 'url' => array('index')),
    array('label' => 'Create ProductEnquiry', 'url' => array('create')),
    array('label' => 'Update ProductEnquiry', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete ProductEnquiry', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage ProductEnquiry', 'url' => array('admin')),
);
?>

<h1>View ProductEnquiry #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'email',
        'phone',
        'country',
        'size',
        'requirement',
        'product_id',
        'doc',
        'dou',
        'user_id',
    ),
));
?>

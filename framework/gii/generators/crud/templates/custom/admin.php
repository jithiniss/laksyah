<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php echo "?>\n"; ?>
<style>
    .table th, td{
        text-align: center;
    }
    .table td{
        text-align: center;
    }
</style>


<div class="page-title">

    <div class="title-env">
        <h1 style="float: left;" class="title"><?php echo $this->modelClass; ?></h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage <?php echo $this->modelClass; ?></p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo "<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage <?php echo $this->modelClass; ?></strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo "<?php echo Yii::app()->request->baseurl.'/" . $_REQUEST['CrudCode']['controller'] . "/create'; ?>"; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add <?php echo $this->modelClass; ?></span>
        </a>
        <div class="panel panel-default">
            <?php echo "<?php"; ?> $this->widget('booster.widgets.TbGridView', array(
            'type' => ' bordered condensed hover',
            'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
            <?php
            $count = 0;
            foreach($this->tableSchema->columns as $column) {
                    if(++$count == 7)
                            echo "\t\t/*\n";
                    echo "\t\t'" . $column->name . "',\n";
            }
            if($count >= 7)
                    echo "\t\t*/\n";
            ?>

            array(
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
            ),
            ),
            )); ?>
        </div>

    </div>


</div>


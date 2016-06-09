<section class="content-header">
    <h1>
        Products

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Products</li>
    </ol>
</section>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/DealProducts/create'; ?>" class='btn  btn-laksyah manage'>Add Deals</a>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'deal-products-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    // 'id',
                    'date',
                    array(
                        'name' => 'deal_products',
                        'value' => function($data) {
                                $pdts = explode(',', $data->deal_products);
                                $b = 1;
                                foreach ($pdts as $pdt) {
                                        $result = Products::model()->findByPk($pdt);
                                        if ($b == 1) {
                                                $prod_ids .= $result->product_name;
                                        } else {
                                                $prod_ids .= ',' . $result->product_name;
                                        }
                                        $b++;
                                }

                                return $prod_ids;
                        },
                    ),
                    array(
                        'name' => 'status',
                        'value' => function($data) {
                                if ($data->status == 1) {
                                        return "Enabled";
                                } elseif ($data->status == 0) {
                                        return "Disabled";
                                } else {
                                        return "Invalid";
                                }
                        },
                        'filter' => array('1' => "Enabled", '0' => "disabled")
                    ),
                    //'cb',
                    // 'ub',
                    /*
                      'doc',
                      'dou',
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}{delete}',
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>


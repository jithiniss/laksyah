<section class="content-header">
        <h1>
                Product Enquiry                <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/productEnquiry/admin'; ?>"><i class="fa fa-dashboard"></i>  Product Enquiry</a></li>
                <li class="active">Manage</li>
        </ol>
</section>
<?php $ctype = $_GET['ctype']; ?>
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/productEnquiry/create'; ?>" class='btn  btn-laksyah manage'>Add Product Enquiry</a>
<div class="col-xs-12 form-page">
        <div class="box">
                <div class="panel panel-default">
                        <?php
                        if ($ctype == 1) {
                                $model->enquiry_type = $ctype;
                        } else {
                                $model->enquiry_type = $ctype;
                        }
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'product-enquiry-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'name',
                                'email',
                                'phone',
                                array('name' => 'country',
                                    'value' => function($data) {
                                            return $data->country0->country_name;
                                    },
                                    'type' => 'raw',
                                ),
                                array('name' => 'product_id',
                                    'value' => function($data) {
                                            return $data->product->product_name;
                                    },
                                    'type' => 'raw',
                                ),
                                'doc',
                                /*
                                  'requirement',
                                  'product_id',
                                  'doc',
                                  'dou',
                                  'user_id',
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

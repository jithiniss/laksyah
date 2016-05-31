<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?> <span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?> <span>/</span> Measurement</div>
        <div class="row">
                <?php echo $this->renderPartial('_menu'); ?>
                <div class="col-sm-9 user_content">
                        <h1>Measurement</h1>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered measurement_table">
                                <tr>
                                        <th>Date</th>
                                        <th>Product</th>
                                        <th>Product Code </th>
                                        <th>Action</th>
                                </tr>
                                <?php foreach ($chart as $list) { ?>
                                        <?php $product = Products::model()->findByAttributes(array('product_code' => $list->product_code)); ?>
                                        <tr>
                                                <td><?php echo date('d/m/Y', strtotime($list->date)); ?></td>
                                                <td><?php echo $list->product_name; ?></td>
                                                <td><?php echo $list->product_code; ?></td>
                                                <td>
                                                        <?php echo CHtml::link('View', array('Myaccount/ViewChart', 'id' => CHtml::encode($list->id))); ?> | <?php echo CHtml::link('Copy', array('Myaccount/CopyChart', 'id' => CHtml::encode($list->id))); ?>
                                                </td>
                                        </tr>

                                <?php }
                                ?>
                        </table>
                        <div class="form_button">
                                <?php echo CHtml::link('ADD NEW MEASUREMENT', array('myaccount/SizeChartType'), array('class' => 'btn btn-primary')); ?>
                        </div>


                </div>
        </div>

<div class="container">
        <div class="row">
                <div class="col-xs-12 col-sm-8">
                        <br />
                        <br />
                        <br />

                        <table>
                                <tr>
                                        <th>Date</th>
                                        <th>Measurement Type</th>
                                        <th>Product</th>
                                        <th>Product Code</th>
                                        <th>Actions</th>
                                </tr>
                                <?php foreach ($chart as $list) { ?>
                                        <?php $product = Products::model()->findByAttributes(array('product_code' => $list->product_code)); ?>
                                        <tr>
                                                <td><?php echo date('d/m/Y', strtotime($list->date)); ?></td>
                                                <td><?= $list->type == 1 ? 'Standerd' : 'Custom '; ?></td>
                                                <td><?php echo $list->product_name; ?></td>
                                                <td><?php echo $list->product_code; ?></td>
                                                <td><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/ViewChart/id/<?php echo $list->id; ?>">View</a> &nbsp;&nbsp;&nbsp;<a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/CopyChart/id/<?php echo $list->id; ?>">Copy</a>
                                                </td>
                                        </tr>

                                <?php }
                                ?>
                        </table>
                        <br />
                        <br />
                        <br />
                        <br /> <br />
                        <br />
                        <br />
                        <br /> <br />
                        <br />
                        <br />
                        <br />
                </div>
                <div class="col-xs-12 col-sm-4">
                        <br />
                        <br />
                        <br />
                        <br />
                        <a class="btn btn-danger" href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/SizeChartType">New Measurement</a>
                </div>
        </div>
</div>

<!--<script>
        function ConfirmDelete()
        {
                var x = confirm("Are you sure you want to delete?");
                if (x)
                        return true;
                else
                        return false;
        }
</script>-->